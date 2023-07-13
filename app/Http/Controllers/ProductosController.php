<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\productos;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\DB;

class ProductosController extends BaseController
{
    public function index()
    {
        
        $Productos = DB::table('productos')
        ->select('productos.id', 'productos.nombre', 'productos.referencia', 'productos.precio', 'productos.peso','productos.id_categoria','categorias.descripcion', 'productos.stock')
        ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
        ->orderBy('productos.id', 'asc')
        ->get();

        $Categorias = categorias::get();
        return view('dashboard/productos', ['Productos' => $Productos, 'Categorias' => $Categorias]);
    }

    public function store(CreateProductRequest $request)
    {
       
        productos::updateOrCreate(['id' =>  $request->input("id")],
        ['nombre' =>  $request->input("nombre"),
        'referencia' =>  $request->input("referencia"),
        'precio' =>  $request->input("precio"),
        'peso' =>  $request->input("peso"),
        'id_categoria' =>  $request->input("id_categoria"),
        'stock' =>  $request->input("stock")]);

        return redirect('/productos');
    }

    public function show($id)
    {
       
        $Producto = productos::where('id',$id)->first();
        $Productos = DB::table('productos')
        ->select('productos.id', 'productos.nombre', 'productos.referencia', 'productos.precio', 'productos.peso','productos.id_categoria','categorias.descripcion', 'productos.stock')
        ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
        ->orderBy('productos.id', 'asc')
        ->get();
        $Categorias = categorias::get();
        return view('dashboard/productos', ['Productos' => $Productos, 'Producto' => $Producto, 'Categorias' => $Categorias]);

    }

    public function delete($id)
    {
       
        $Producto = productos::where('id',$id)->delete();
        
        return redirect('/productos');

    }
}
