<?php

namespace App\Http\Controllers;

use App\Models\Produse;
use App\Models\Currency;
use Illuminate\Http\Request;

class ProduseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produse = Produse::with('currency')->get();

        return view('produse.index', compact('produse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = Currency::all();
        
        return view('produse.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'currency_id' => 'required|exists:currencies,id',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
    
        Produse::create($request->all());
    
        return redirect()->route('produse.index')->with('success', 'Produs creat cu succes!');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Produse $produse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produse $produse)
    {
        $currencies = Currency::all();
        
        return view('produse.edit', compact('produse', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produse $produse)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'currency_id' => 'required|exists:currencies,id',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
    
        $produse->update($request->all());
    
        return redirect()->route('produse.index')->with('success', 'Produs actualizat cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produse $produse)
    {
        $produse->delete();
        
        return redirect()->route('produse.index')->with('success', 'Produs șters cu succes!');
    }
}
