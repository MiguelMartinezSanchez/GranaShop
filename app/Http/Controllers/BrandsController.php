<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Brands::paginate(5); //Guardar todos las marcas para mostrarlos en ADMINISTRACION DE MARCAS
        return view('administration.marcas', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.createM');
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
            $newBrand = $request->all();
            $newBrand['foto'] = '/img/products/' . $image->getClientOriginalName();
            Brands::create($newBrand);
        } catch (\Exception $ex) {
            return $ex;
            //return back();
        }
        $indexAdmin = new BrandsController();
        return $indexAdmin->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show($brands)
    {
        $marca = Brands::where('nombre', '=', $brands)->first();
        $productos = Products::where('marca', '=', $marca->id)->get();
        return view("brands.show", compact('marca', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit($brands)
    {
        $marca = Brands::find($brands);
        return view('administration.editM', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brands)
    {
        try {
            //Guardar imagen producto nuevo
            $image = $request->file('foto');
            $image->move('./img/products', $image->getClientOriginalName());

            Brands::where('id', $brands)
                ->update(
                    [
                        'nombre' => $request->input('nombre'),
                        'foto' => '/img/products/' . $image->getClientOriginalName(),
                        'descripcion' => $request->input('descripcion'),
                    ]
                );
        } catch (\Exception $ex) {
            return back();
        }
        $indexAdmin = new BrandsController();
        return $indexAdmin->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy($brands)
    {
        try {
            $m = Brands::find($brands);
            $m->delete();
        } catch (Exception $ex) {
            return back();
        }
        return back();
    }
}
