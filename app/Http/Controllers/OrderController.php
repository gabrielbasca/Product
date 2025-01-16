<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderCreated;
use App\Models\Produse;
use App\Models\Order;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->get();
        return view('orders.index', compact('orders'));
    }
    
    public function create()
    {
        $produse = Produse::all();
        return view('orders.create', compact('produse'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'shipping_address' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:produse,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Creare comandă
        $order = Order::create([
            'user_id' => $request->user_id,
            'total' => 0, 
            'shipping_address' => $request->shipping_address,
        ]);
        // Adăugare produse și calcul total
        $total = 0;
        foreach ($request->products as $product) {
            $produs = Produse::find($product['id']);
            $price = $produs->price;
            $quantity = $product['quantity'];
            $total += $price * $quantity;
    
            $order->products()->attach($produs->id, [
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }
        // Actualizare total comandă
        $order->update(['total' => $total]);

        // Declanșează evenimentul
        event(new OrderCreated($order));
    
        // Redirecționare către listă comenzi
        return redirect()->route('orders.index')->with('success', 'Comanda a fost creată cu succes!');
    }

    public function generatePdf($id)
    {
        return response()->json([
            'message' => 'PDF generated for order ID: ' . $id,
        ]);
    }
}
