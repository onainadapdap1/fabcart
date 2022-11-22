<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::where('status', '!=', '2')->get();
        return view('admin.collection.category.index', compact('category'));
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
            // $img_extention = $image_file->getClientOriginalExtension();
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/categoryimage/', $img_filename);
            $category->image = $img_filename;
        }
        // $category->icon = $request->input('category_icon');
        if($request->hasFile('category_icon')) {
            $icon_file = $request->file('category_icon');
            // $icon_extention = $icon_file->getClientOriginalExtension();
            $icon_filename = time()."_".$icon_file->getClientOriginalName();
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon = $icon_filename;
        }
        $category->status = $request->input('status') == true ? '1' : '0'; //1 = show, 0 = means for hiding data
        $category->save();

        return redirect('/category')->with('status', 'Category ADDED successfully');
    }
    public function edit($id) {
        $group = Groups::where('status', '!=', '2')->get();
        $category = Category::find($id);
        return view('admin.collection.category.edit')
        ->with('group', $group)
        ->with('category', $category)
        ;
    }
    public function update(Request $request, $id) {
        $category = Category::find($id);
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        // $category->image = $request->input('category_img');
        if($request->hasFile('category_img')) {
            $filepath_image = 'uploads/categoryimage/'.$category->image;
            if(File::exists($filepath_image)) {
                File::delete($filepath_image);
            }
            $image_file = $request->file('category_img');
            // $img_extention = $image_file->getClientOriginalExtension();
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/categoryimage/', $img_filename);
            $category->image = $img_filename;
        }
        // $category->icon = $request->input('category_icon');
        if($request->hasFile('category_icon')) {
            $filepath_icon = 'uploads/categoryicon/'.$category->icon;
            if(File::exists($filepath_icon)) {
                File::delete($filepath_icon);
            }
            $icon_file = $request->file('category_icon');
            // $icon_extention = $icon_file->getClientOriginalExtension();
            $icon_filename = time()."_".$icon_file->getClientOriginalName();
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon = $icon_filename;
        }
        $category->status = $request->input('status') == true ? '1' : '0'; //1 = show, 0 = means for hiding data
        $category->update();

        return redirect('/category')->with('status', 'Category UPDATED successfully');
    }
    public function delete($id) {
        $category = Category::find($id);
        $category->status = "2"; //2 = mean deleted, 1 = show to user, 0 = hiding from user
        $category->update();

        return redirect('/category')->with('status', 'Category DELETED successfully');
    }
    public function deleterecords() {
        $category = Category::where('status', '=', '2')->get();
        return view('admin.collection.category.deleted', compact('category'));
    }
    public function deletedrestore($id) {
        $category = Category::find($id);
        $category->status = "0";
        $category->update();

        return redirect('/category')->with('status', 'Category data RE-STORED successfully');
    }
}
