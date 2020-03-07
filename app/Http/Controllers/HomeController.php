<?php

namespace App\Http\Controllers;

use App\Product;
use App\Warehouse;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $product = Product::count();
        $warehouse = Warehouse::count();
        $stock = Product::sum('stock');

        return view('home', compact('user', 'product', 'warehouse', 'stock'));
    }
}
