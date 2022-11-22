<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.collection.category.index');
    }
    public function create() {
        $group = Groups::where('status', '!=', 2)->get(); //2 = deleted data
        return view('admin.collection.category.create', compact('group'));
    }
}
