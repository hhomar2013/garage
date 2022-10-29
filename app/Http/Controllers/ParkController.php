<?php

namespace App\Http\Controllers;

use App\Models\park;
use Illuminate\Http\Request;

class ParkController extends Controller
{

    public function show_parking($id)
    {
        $park = park::where('g_id','=',$id)->with('get_group')->get();
        if ($park->Count() != 0){
            return view('cpanel.groups.show',compact('park'));
        }else{
            return redirect()->route('group.index')->with('error','لايوجد  بيانات لعرضها');
        }

    }

    public function index()
    {
       $park = park::Latest()->paginate(5);
    //    $park = park::get()->groupBy('g_id');

        return view('cpanel.park.index',compact('park'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function show(park $park)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function edit(park $park)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, park $park)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\park  $park
     * @return \Illuminate\Http\Response
     */
    public function destroy(park $park)
    {
        //
    }
}
