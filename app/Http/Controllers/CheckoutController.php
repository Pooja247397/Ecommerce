<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function checkout_item()
    {
        // die('pooja');
        return view ('frontend.checkout');
    }
}
