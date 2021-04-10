<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Move;
use Illuminate\Support\Facades\App;
use App\Http\Requests\MoviesRequest;
use DB;
use Illuminate\Support\Str;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Move::all();
        return view('admin.movies.index', compact('movies'), ['title'=>'movies']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create', ['title'=> 'create moviesImage']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoviesRequest $request)
    {
        try {
            $file = '';
            if ($request->has('image')){
                $file = uploadImage('moviesImage', $request->image);
            }
            Move::create([
                'name' => $request->name,
                'image' => $file,
                'date_show' => $request-> date_show,
                'statues' => $request->statues
            ]);
            return  redirect()->route('admin.movies')->with(['success'=>'successfull save data ']);
        }catch (\Exception $ex){
            return  redirect()->route('admin.movies')->with(['error'=>'there is error try again ']);
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
        $movie = Move::find($id);
        return view('admin.movies.edit',compact('movie'),['title'=>'edit movies']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MoviesRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            if ($request->has('image') ) {
                 $filePath = uploadImage('moviesImage', $request->image);
                Move::where('id', $id)
                    ->update([
                        'image' => $filePath,
                    ]);
            }
            $data = $request->except('_token', 'id', 'image');
            Move::where('id', $id)
                ->update(
                    $data
               );
            DB::commit();
            return redirect()->route('admin.movies')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){

           return redirect()->route('admin.movies')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا  ']);
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
        try {
            $admin = Move::find($id);
            if (!$admin)
                return redirect()->route('admin.movies')->with(['error' => 'هذا المساول غير موجود او ربما يكون محذوفا ']);
           $image = Str::after($admin->image,'/assets');
            $image = base_path('assets/'.$image);
            unlink($image);
            $admin->delete();
            return redirect()->route('admin.movies')->with(['success' => 'تم حذف المساول بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.movies')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function status ($id){
    $movie = Move::find($id);
    $status = $movie->statues == 0 ? 1 : 0;
        $movie ->update(['statues' => $status]);
        return redirect()->route('admin.movies')->with(['success' => 'تم تعديل الحالة المساول بنجاح']);
    }
}
