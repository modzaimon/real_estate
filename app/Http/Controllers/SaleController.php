<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    
    public function index()
    {
        $data = Sale::paginate(20);
        return view('module.sale.index',compact('data',$data));
    }

   
    public function create()
    {
        return view('module.sale.create');
    }

 
    public function store(Request $request)
    {
        //
    }


    public function show(Sale $sale)
    {
        //
    }

    
    public function edit(Sale $sale)
    {
        //
    }

    
    public function update(Request $request, Sale $sale)
    {
        //
    }

    
    public function destroy(Sale $sale)
    {
        //
    }
}
