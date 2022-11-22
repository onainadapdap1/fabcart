<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index() {
        $category = Category::where('status','!=','2')->get();
        $subcategory = Subcategory::where('status', '!=', '2')->get();
        return view('admin.collection.subcategory.index')
        ->with('category', $category)
        ->with('subcategory', $subcategory)
        ;
    }
    public function store(Request $request) {
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        // $subcategory->image = $request->input('image');
        if($request->hasFile('subcategory_image')) {
            $image_file = $request->file('subcategory_image');
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/subcategory/', $img_filename);
            $subcategory->image = $img_filename;
        }
        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1' : '0';
        $subcategory->save();

        return redirect()->back()->with('status', 'Sub category ADDED successfully');
    }
}
