<?php

namespace App\Http\Controllers;

use App\Models\ItemMovies;
use App\Models\Lounge;
use App\Models\Move;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Move::all();
        return view('front.home', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $movies = Move::find($id);
        $times = ItemMovies::where('id_movies', $id)->get();
        return view('front.create',compact('times', 'movies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $lounge = Lounge::select('name', 'id')->where('id', 'id_lounge')->get();
        $movie = ItemMovies::find($request ->time_id);

        $reservation =   \App\Models\reservation::where('time_id', $request ->time_id)->sum('number');

        $chair =   $movie->lounge->Number_chairs;
if ($reservation > $chair){
    return redirect()->back()->with(['success' => 'completed ticket this time ']);

}elseif ($reservation < $chair){
      reservation::create([
        'time_id' => $request->time_id,
        'user_id' => Auth::user()->id,
        'number' => $request->number,
        'movie_id' => $request->movie_id,
    ]);
      $number = $request->number;
    $users = ItemMovies::where('id', $request ->time_id)->get();
    foreach ($users as $user){
        $user->from;
        $user->to;
        $user->lounge ->name;
        $user->movies ->name;

    }
       Mail::to(Auth::user()->email)->send(new \App\Mail\Reservation(['user' => $user, 'number' => $number]));
    return redirect()->back()->with(['success' => 'تم الحجز سوفا تصلك رسالة علي الميل الخاص بيك ']);

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
        //$show = Move::where('id', $id)->get();
        $show_time = ItemMovies::whereHas('movies')->select(

            'id',
            'from',
            'to',
            'ticket',
            'status',
            'id_movies',
            'id_lounge'
        )->where('status', 0)-> get();
        $lounge_time = Lounge::select(

            'id',
            'name',
            'Number_chairs'
            )-> get();
        $show = Move::find($id);
        $lounges = Lounge::all();
        return view('front.show', compact('show', 'show_time', 'lounge_time', 'lounges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(){
        auth()->guard('web')->logout();
        return redirect() -> route('front.home');
    }


}
