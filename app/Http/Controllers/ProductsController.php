<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $brandsNombres = Products::brandsNombres();
        $categoriesNombres = Products::categoriesNombres();

        $productos = Products::paginate(20);

        return view('administration.productos', compact('productos', 'brandsNombres', 'categoriesNombres'));
    }

    public function create()
    {
        $brandsNombres = Brands::all();
        $categoriesNombres = Categories::all();

        return view('administration.create', compact('brandsNombres', 'categoriesNombres'));
        
    }

public function store(Request $request)
{
    // ✅ VALIDACIÓN
    $request->validate([
        'nombre' => 'required|string|min:3|max:25',
        'precio' => 'required|numeric|min:0|max:999999',
        'marca' => 'required|exists:brands,id',
        'categoria' => 'required|exists:categories,id',
        'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
    ], [
        'nombre.required' => 'El nombre del producto es obligatorio',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
        'nombre.max' => 'El nombre no puede superar los 255 caracteres',

        'precio.required' => 'El precio es obligatorio',
        'precio.numeric' => 'El precio debe ser un número',
        'precio.min' => 'El precio no puede ser negativo',
        'precio.max' => 'El precio es demasiado alto',

        'marca.required' => 'Debes seleccionar una marca',
        'marca.exists' => 'La marca seleccionada no es válida',

        'categoria.required' => 'Debes seleccionar una categoría',
        'categoria.exists' => 'La categoría seleccionada no es válida',

        'foto.required' => 'Debes subir una imagen',
        'foto.image' => 'El archivo debe ser una imagen',
        'foto.mimes' => 'La imagen debe ser JPG, PNG o WEBP',
        'foto.max' => 'La imagen no puede superar los 2MB'
    ]);

    try {
        // ✅ GUARDAR IMAGEN
        $path = $request->file('foto')->store('products', 'public');

        // ✅ CREAR PRODUCTO
        Products::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'marca' => $request->marca,
            'categoria' => $request->categoria,
            'foto' => $path
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado correctamente');

    } catch (\Exception $ex) {
        return back()
            ->withErrors(['general' => 'Error al crear el producto'])
            ->withInput(); // 🔥 MUY IMPORTANTE
    }
}

    public function show(Request $request, $categoria)
    {
        $brandsNombres = Products::brandsNombres();
        $categoriesNombres = Products::categoriesNombres();

        $marcas = Brands::all();

        $productos = Products::where('categoria', $categoria)
            ->when($request->marca, function ($query) use ($request) {
                $query->where('marca', $request->marca);
            })
            ->paginate(6);

        return view('categories.show', compact('productos', 'marcas', 'brandsNombres', 'categoriesNombres'));
    }

    public function edit($product)
    {
        $brandsNombres = Brands::all();
        $categoriesNombres = Categories::all();

        $producto = Products::findOrFail($product);

        return view('administration.edit', compact('producto', 'brandsNombres', 'categoriesNombres'));
    }

public function update(Request $request, $product)
{
    // VALIDACIÓN
    $request->validate([
        'nombre' => 'required|string|min:3|max:255',
        'precio' => 'required|numeric|min:0|max:999999',
        'marca' => 'required|exists:brands,id',
        'categoria' => 'required|exists:categories,id',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ], [
        'nombre.required' => 'El nombre del producto es obligatorio',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
        'nombre.max' => 'El nombre no puede superar los 255 caracteres',

        'precio.required' => 'El precio es obligatorio',
        'precio.numeric' => 'El precio debe ser un número',
        'precio.min' => 'El precio no puede ser negativo',
        'precio.max' => 'El precio es demasiado alto',

        'marca.required' => 'Debes seleccionar una marca',
        'marca.exists' => 'La marca seleccionada no es válida',

        'categoria.required' => 'Debes seleccionar una categoría',
        'categoria.exists' => 'La categoría seleccionada no es válida',

        'foto.image' => 'El archivo debe ser una imagen',
        'foto.mimes' => 'La imagen debe ser JPG, PNG o WEBP',
        'foto.max' => 'La imagen no puede superar los 2MB'
    ]);

    try {
        $producto = Products::findOrFail($product);

        // SI HAY IMAGEN NUEVA
        if ($request->hasFile('foto')) {

            // borrar antigua
            if ($producto->foto) {
                Storage::disk('public')->delete($producto->foto);
            }

            $path = $request->file('foto')->store('products', 'public');
            $producto->foto = $path;
        }

        $producto->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'marca' => $request->marca,
            'categoria' => $request->categoria,
            'foto' => $producto->foto
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado correctamente');

    } catch (Exception $ex) {
        return back()->withErrors('Error al actualizar el producto');
    }
}

    public function destroy($producto)
    {
        try {
            $p = Products::findOrFail($producto);

            if ($p->foto) {
                Storage::disk('public')->delete($p->foto);
            }

            $p->delete();

            return back()->with('success', 'Producto eliminado');

        } catch (Exception $ex) {
            return back()->withErrors('Error al eliminar');
        }
    }

public function filtroPrecio(Request $request)
{
    $request->validate([
        'precio' => 'required|in:ASC,DESC',
        'categoria' => 'required'
    ], [
        'precio.required' => 'Debes elegir el orden del precio',
        'precio.in' => 'El orden debe ser ASC o DESC',
        'categoria.required' => 'La categoría es obligatoria'
    ]);

    $brandsNombres = Products::brandsNombres();
    $categoriesNombres = Products::categoriesNombres();
    $marcas = Brands::all();

    $productos = Products::where('categoria', $request->categoria)
        ->orderBy('precio', $request->precio)
        ->paginate(6);

    return view('categories.show', compact('productos', 'marcas', 'request', 'brandsNombres', 'categoriesNombres'));
}

public function singleProduct(Request $request)
{
    $request->validate([
        'showProduct' => 'required|exists:products,id'
    ], [
        'showProduct.required' => 'Producto no especificado',
        'showProduct.exists' => 'El producto no existe'
    ]);

    $brandsNombres = Products::brandsNombres();
    $categoriesNombres = Products::categoriesNombres();

    $productoSeleccionado = Products::findOrFail($request->input('showProduct'));

    $Productossugeridos = Products::where('marca', $productoSeleccionado->marca)
        ->inRandomOrder()
        ->limit(6)
        ->get();

    return view('categories.singleProduct', compact('productoSeleccionado', 'Productossugeridos', 'brandsNombres', 'categoriesNombres'));
}

    public function pantallaCompra()
    {
        return view('categories.pantallaCompra');
    }

    public function productosIndex()
    {
        $allProducts = Products::inRandomOrder()->limit(6)->get();

        return view('categories.index', compact('allProducts'));
    }
}