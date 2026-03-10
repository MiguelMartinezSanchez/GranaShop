<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Referenciar marca y categoria con su ID
        $brandsNombres = Products::brandsNombres();
        $categoriesNombres = Products::categoriesNombres();

        $productos = Products::paginate(20); //Guardar todos los productos para mostrarlos en ADMINISTRACION DE PRODUCTOS
        return view('administration.productos', compact('productos', 'brandsNombres', 'categoriesNombres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brandsNombres = Brands::all();
        $categoriesNombres = Categories::all();
        return view('administration.create', compact('brandsNombres', 'categoriesNombres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //Guardar imagen producto nuevo
            $image = $request->file('foto');
            $image->move('./img/products', $image->getClientOriginalName());

            //Insertar ruta de la imagen subida al campo -imagen-
            $newProduct = $request->all();
            $newProduct['foto'] = '/img/products/' . $image->getClientOriginalName();
            Products::create($newProduct);
        } catch (\Exception $ex) {
            return back();
        }
        $indexAdmin = new ProductsController();
        return $indexAdmin->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $categoria)
    {
        $brandsNombres = Products::brandsNombres();
        $categoriesNombres = Products::categoriesNombres();

        $marcas = Brands::all();
        $productos = Products::where('categoria', '=', $categoria)->brand($request->marca)->paginate(6);
        return view('categories.show', compact('productos', 'marcas', 'brandsNombres', 'categoriesNombres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $brandsNombres = Brands::all();
        $categoriesNombres = Categories::all();

        $producto = Products::find($product);
        return view('administration.edit', compact('producto', 'brandsNombres', 'categoriesNombres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        try {
            //Guardar imagen producto nuevo
            $image = $request->file('foto');
            $image->move('./img/products', $image->getClientOriginalName());

            Products::where('id', $product)
                ->update(
                    [
                        'nombre' => $request->input('nombre'),
                        'precio' => $request->input('precio'),
                        'foto' => '/img/products/'. $image->getClientOriginalName(),
                        'marca' => $request->input('marca'),
                        'categoria' => $request->input('categoria')
                    ]
                );
        } catch (\Exception $ex) {
            //return back();
            return $ex->getMessage();
        }
        $index = new ProductsController();
        return $index->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto)
    {
        //Recibo por parametro ID de producto para borrarlo
        try {
            $p = Products::find($producto);
            $p->delete();
        } catch (Exception $ex) {
            return back();
        }
        return back();
    }

    //---------------------------- MOSTRAR PRODUCTOS ORDENADOS POR PRECIO
    public function filtroPrecio(Request $request)
    {
        $brandsNombres = Products::brandsNombres();
        $categoriesNombres = Products::categoriesNombres();
        $marcas = Brands::all();
        if ($request->precio == "ASC") {
            $productos = Products::where('categoria', '=', $request->categoria)->orderBy('precio', $request->precio ?? 'ASC')->paginate(6);
            return view('categories.show', compact('productos', 'marcas', 'request', 'brandsNombres', 'categoriesNombres'));
        } elseif ($request->precio = "DESC") {
            $productos = Products::where('categoria', '=', $request->categoria)->orderBy('precio', $request->precio ?? 'DESC')->paginate(6);
            return view('categories.show', compact('productos', 'marcas', 'request', 'brandsNombres', 'categoriesNombres'));
        }
    }

    //----------------------------- VISTA DE UN SOLO PRODUCTO
    public function singleProduct(Request $request) //Mostrar el producto para verlo recibiedo la id desde la vista
    {
        $brandsNombres = Products::brandsNombres();
        $categoriesNombres = Products::categoriesNombres();

        $productoSeleccionado = Products::where('id', $request->input('showProduct'))->find($request->input('showProduct'));
        $Productossugeridos = Products::where('marca', $productoSeleccionado->marca)->get()->random(6);

        return view('categories.singleProduct', compact('productoSeleccionado', 'Productossugeridos', 'brandsNombres', 'categoriesNombres'));
    }

    //------------------------------ PANTALLA DE COMPRA 

    public function pantallaCompra()
    {
        return view('categories.pantallaCompra');
    }

    //------------------------------ PANTALLA DE ADMINISTRACION PRODUCTOS ADMIN

    public function productosIndex()
    {
        $allProducts = Products::all()->random(6); //Mostrar 6 productos aleatorios en Inicio
        return view('categories.index', compact('allProducts'));
    }
}
