<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ItemMovie;
use  App\Models\Move;
use  App\Models\Lounge;
use  App\Models\ItemMovies;
use mysql_xdevapi\CollectionFind;

class ItemMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movs = reservation::all();

        $times = ItemMovies::all();
        return view('admin.times.index', ['title' => 'time movies'], compact('times', 'movs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Move::all();
        $lounges = Lounge::all();
        return view('admin.times.create', ['title' => 'create times'], compact('movies', 'lounges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemMovie $request)
    {
        try {
            ItemMovies::create([
                'from' => $request->from,
                'to' => $request->to,
                'ticket' => $request->ticket,
                'status' => $request->status,
                'id_lounge' => $request->id_lounge,
                'id_movies' => $request->id_movies,
            ]);
            return redirect()->route('admin.times')->with(['success'=>'successfull save times ']);
        }catch (\Exception $ex){
                return redirect()->route('admin.times')->with(['error'=>'there error in date ']);

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
        $movies = Move::all();
        $lounges = Lounge::all();
        $times = ItemMovies::find($id);
        return view('admin.times.edit',compact('times', 'movies', 'lounges'), ['title'=>'edit time']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemMovie $request, $id)
    {
        try {
            ItemMovies::where('id', $id)->update([
                'from' => $request->from,
                'to' => $request->to,
                'ticket' => $request->ticket,
                'status' => $request->status,
                'id_lounge' => $request->id_lounge,
                'id_movies' => $request->id_movies,
            ]);
            return redirect()->route('admin.times')->with(['success'=>'successfull update times ']);
        }catch (\Exception $ex){
            return redirect()->route('admin.times')->with(['error'=>'there error in date ']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = ItemMovies::find($id);
        $time->delete();
        return redirect()->route('admin.times')->with(['success'=>' تم الحدف بنجاح']);
    }
    public function status ($id){
        $movie = ItemMovies::find($id);

       $reservation =   \App\Models\reservation::where('time_id', $id)->sum('number');

        $chair =   $movie->lounge->Number_chairs;

if ($reservation > $chair) {
    $status = $movie->status = 1;
    $movie ->update(['status' => $status]);

} elseif ($reservation < $chair) {
    $status = $movie->status = 0;
    $movie ->update(['status' => $status]);

}
        return redirect()->route('admin.times')->with(['success' => 'تم تعديل الحالة المساول بنجاح']);

    }
}
