<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {
        // $group = Groups::all();
        $group = Groups::where('status', '!=', '2')->get();
        return view('admin.collection.group.index', compact('group'));
    }
    public function create() {
        return view('admin.collection.group.create');
    }
    public function store(Request $request) {
        $group = new Groups();
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        if($request->input('status') == true) {
            $group->status = "1";
        } else {
            $group->status = "0";
        }

        $group->save();
        return redirect()->back()->with('status', 'Group data added successfully');
    }
    public function edit($id) {
        $group = Groups::find($id);
        return view('admin.collection.group.edit', compact('group'));
    }
    public function update(Request $request, $id) {
        $group = Groups::find($id);
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->status = $request->input('status') == true ? '1' : '0';
        $group->update();

        return redirect()->back()->with('status', 'Group data UPDATED successfully');
    }
    public function delete($id) {
        $group = Groups::find($id);
        $group->status = "2"; //1 => show to front-end web, 0 = means for hiding, 2 = means for deleted
        $group->update();

        return redirect()->back()->with('status', 'Group data DELETED successfully');
    }
    public function deletedrecords() {
        $group = Groups::where('status', '2')->get();
        return view('admin.collection.group.deleted', compact('group'));
    }
    public function deletedrestore($id) {
        $group = Groups::find($id);
        $group->status = "0";
        $group->update();

        return redirect('/group')->with('status', 'Group data RE-STORED successfully');
    }
}
