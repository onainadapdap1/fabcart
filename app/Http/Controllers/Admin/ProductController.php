<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('admin.collection.product.index');
    }
    public function create() {
        $subcategory = Subcategory::where('status','!=', '2')->get();
        return view('admin.collection.product.create')
        ->with('subcategory', $subcategory);
    }
}
