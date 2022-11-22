<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
    public function store(Request $request) {
        $category = new Category();
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        // $category->image = $request->input('category_img');
        if($request->hasFile('category_img')) {
            $image_file = $request->file('category_img');
            $img_extention = $image_file->getClientOriginalExtension();
            $img_filename = time()."_".$image_file->getClientOriginalName() . '.' . $img_extention;
            $image_file->move('uploads/categoryimage/', $img_filename);
            $category->image = $img_filename;
        }
        // $category->icon = $request->input('category_icon');
        if($request->hasFile('category_icon')) {
            $icon_file = $request->file('category_icon');
            $icon_extention = $icon_file->getClientOriginalExtension();
            $icon_filename = time()."_".$icon_file->getClientOriginalName() . '.' . $icon_extention;
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon = $img_filename;
        }
        $category->status = $request->input('status') == true ? '1' : '0'; //1 = show, 0 = means for hiding data
        $category->save();

        return redirect()->back()->with('status', 'Category ADDED successfully');
    }
}
