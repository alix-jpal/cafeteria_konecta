<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\productos;
use App\Models\ventas;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\CreateVentasRequest;
use Illuminate\Support\Facades\DB;

class VentasController extends BaseController
{
    public function index()
    {
        $Productos = productos::get();
        $Ventas = DB::table('ventas')
        ->select('ventas.id', 'productos.nombre', 'ventas.cantidad', 'productos.stock', 'productos.precio', 'ventas.total')
        ->join('productos', 'productos.id', '=', 'ventas.id_producto')
        ->orderBy('ventas.id', 'asc')
        ->get();
        return view('dashboard/ventas', ['Ventas' => $Ventas, 'Productos' => $Productos]);
    }

    public function store(CreateVentasRequest $request)
    {
        

        $producto = productos::where('id',$request->input("producto"))->first();

        if($producto->stock < $request->input("cantidad"))
        {
            $error = 'No hay estoy suficiente para esta venta';

            $Productos = productos::get();
            $Ventas = DB::table('ventas')
            ->select('ventas.id', 'productos.nombre', 'ventas.cantidad', 'productos.stock', 'productos.precio', 'ventas.total')
            ->join('productos', 'productos.id', '=', 'ventas.id_producto')
            ->orderBy('ventas.id', 'asc')
            ->get();
            return view('dashboard/ventas', ['Ventas' => $Ventas, 'Productos' => $Productos, 'error' => $error]);

        }
        else
        {
            $total= $producto->precio * $request->input("cantidad");
        
            ventas::Create(['id_producto' =>  $request->input("producto"),
            'cantidad' =>  $request->input("cantidad"),
            'precio_unidad' =>  $producto->precio,
            'total' =>  $total]);

            $stock = $producto->stock - $request->input("cantidad");

            productos::where('id',$request->input("producto"))->update(['stock' => $stock]);

            return redirect('/ventas');
        }

        

        
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
