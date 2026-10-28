<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {

      $productCount =  Product::count();
      $lowStockCount =  Product::where('stock_quantity', '<=', 5)->count();
      $totakStockCount =  Product::sum('stock_quantity');

      return view('dashboard', compact('productCount', 'lowStockCount', 'totakStockCount'));
   }
}
