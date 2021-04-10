<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lounge;
use App\Http\Requests\LoungeRequest;
class LoungesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lounges = Lounge::all();
        return view('admin.lounges.index', compact('lounges'), ['title' => 'Lounges']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lounges.create', ['title' => 'create lounge']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoungeRequest $request)
    {
        try {
            Lounge::create([
                'name' => $request->name,
                'Number_chairs' => $request->Number_chairs
            ]);
            return redirect() -> route('admin.lounges')->with(['success'=> 'successfull save lounges ']);
        }catch (\Exception $ex){
            return redirect() -> route('admin.lounges')->with(['error'=> 'there is error try again']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lounge = Lounge::find($id);
        return view('admin.lounges.edit', compact('lounge'),['title'=>'Edit lounges']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoungeRequest $request, $id)
    {
        Lounge::where('id', $id)->update([
            'name' => $request->name,
            'Number_chairs' => $request->Number_chairs,
        ]);
        return redirect()->route('admin.lounges')->with(['success'=> 'successfull update lounges ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lounge = Lounge::find($id);
        $lounge-> delete();
        return redirect()->route('admin.lounges')->with(['success'=> 'success Remove Lounges']);
    }
}
