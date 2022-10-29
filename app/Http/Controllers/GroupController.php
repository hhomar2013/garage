<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        $group = group::Latest()->paginate(5);
        return view('cpanel.groups.index',compact('group'));
    }


    public function create()
    {
        return view('cpanel.groups.create');
    }


    public function store(Request $request)
    {
        group::create([
           'g_name'=>$request->input('g_name'),
        ]);

        return redirect()->route('group.create')->with('success','تم الحفظ بنجاح');

    }


    public function show($id)
    {
        $group = group::find($id);
        return view('cpanel.groups.delete',compact('group'));
    }


    public function edit($id)
    {
        $group = group::find($id);
        return view('cpanel.groups.edit',compact('group'));
    }


    public function update(Request $request, $id)
    {
        $group = group::find($id);
        $group->update([
           'g_name'=>$request->input('g_name'),
        ]);
        return redirect()->route('group.index')->with('success','تم الحفظ بنجاح');
    }


    public function destroy($id)
    {
        $group = group::find($id);
        $group->delete();
        return redirect()->route('group.index')->with('success','تم الحذف بنجاح');
    }



}
