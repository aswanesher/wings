<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product' => 'required|numeric'
        ]);

        //dd(Cart::session(Auth::user()->id)->getContent());

        $product = Product::find($request->product);
        
        \Cart::session(Auth::user()->id)->add(array(
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect('/products')->with('status', 'Product added to cart');
    }

    public function checkoutPage()
    {
        $cart = Cart::session(Auth::user()->id)->getContent();
        $total = Cart::session(Auth::user()->id)->getTotal();
        return view('checkout', compact('cart','total'));
    }

    public function checkoutProcess(Request $request)
    {
        $cart = Cart::session(Auth::user()->id)->getContent();

        /* Store in trx detail */
        $trxHeaderInput = [
            'document_code' => 'TRX',
            'document_number' => $this::invoiceNumber(),
            'user' => Auth::user()->id,
            'total' => Cart::session(Auth::user()->id)->getTotal(),
            'date' => now()
        ];
        $trxHeader = TransactionHeader::create($trxHeaderInput);

        foreach ($cart as $item) {
            $trxDetailInput = [
                'document_code' => 'TRX',
                'document_number' => $trxHeader->document_number,
                'product_code' => $item->associatedModel->product_code,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'unit' => $item->associatedModel->unit,
                'subtotal' => Cart::get($item->id)->getPriceSum(),
                'currency' => $item->associatedModel->currency,
            ];
            TransactionDetail::insert($trxDetailInput);

            /* Remove cart item */
            Cart::session(Auth::user()->id)->remove($item->id);
        }

        return redirect('/products')->with('status', 'Checkout success');
    }

    function invoiceNumber()
    {
        $latest = TransactionHeader::latest()->first();

        if(empty($latest)) {
            return str_pad(1, 4, '0', STR_PAD_LEFT);
        }

        return str_pad($latest->id + 1, 4, '0', STR_PAD_LEFT);
    }
}
