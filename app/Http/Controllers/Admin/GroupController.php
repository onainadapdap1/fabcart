<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {
        $group = Groups::all();
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
}
