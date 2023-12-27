<?php

namespace App\Http\Controllers;

use App\Models\Productos;


class AppController extends Controller
{
    public function index()
    {
        // $data['productos'] = Productos::inRandomOrder()->limit(12)->get();
        // $data['productos'] = Productos::where('status',1)->distinct('categoria_producto')->where('precio_actual', '<', 1500)->limit(12)->get(); 
        $data['productos'] = Productos::where('status', 1)
        ->orderBy('categoria_producto')
        ->groupBy('categoria_producto')
        ->limit(12)
        ->get();

        $data['celulares'] = Productos::where('status', 1)->where('categoria_producto',1)->get();    
        $data['televisores'] = Productos::where('status', 1)->where('categoria_producto',2)->get(); 
        $data['refrigeradoras'] = Productos::where('status', 1)->where('categoria_producto',3)->get(); 
        $data['cocinas'] = Productos::where('status', 1)->where('categoria_producto',4)->get(); 

        return view('/home', $data);
    }
}