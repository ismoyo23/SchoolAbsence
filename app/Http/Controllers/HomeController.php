<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if (session('auth') == null) {
            return redirect('/');
        }else{
            if (session('auth')->role == 1 || session('auth')->role == 2 || session('auth')->role == 3) {
                $majors = $request->input('majors');
                $date = $request->input('date');
                $data = DB::table('majors')->get();
                $absenceCount = DB::table('absencestudent')->join('users', 'users.nik', '=', 'absencestudent.nik')->select(DB::raw('count(*) as count, absencestudent.id_class'))->groupBy('absencestudent.id_class')->where('absencestudent.date', 'LIKE', '%'.$date.'%')->where('status', '=', 'masuk')->where('absencestudent.id_majors', $majors)->get();
                return view('Home', ['data' => $data, 'date' => $date, 'majors' => $majors, 'absenceCount' => $absenceCount]);
        }else{
                return redirect('/')->with(['error' => 'Akses di tolak']);;
            }
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
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
    public function edit(Request $request)
    {
        DB::table('absencestudent')
              ->where('id', $request->status)
              ->update(['status' => $request->id]);
        return redirect('/absence?'.$request->date);
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
}
