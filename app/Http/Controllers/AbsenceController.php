<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $date = $request->input('date');
        $majorsParams = $request->input('majors');
        $classParams = $request->input('class');
        $class = DB::table('class')->get();
        $majors = DB::table('majors')->get();
        $absence = DB::table('absencestudent')->join('class','class.id_class', '=', 'absencestudent.id_class')->join('majors' ,'majors.id', '=', 'absencestudent.id_majors')->select(DB::raw('count(*) as count, absencestudent.status'))->groupBy('absencestudent.status')->where('absencestudent.date', 'LIKE', '%'.$date.'%')->where('majors.name_majors', '=', $majorsParams)->where('class.name_class', '=', $classParams)->orderBy('absencestudent.status', 'asc')->get();
       
        $tableAbsence = DB::table('absencestudent')->join('class', 'class.id_class', '=', 'absencestudent.id_class')->join('users', 'users.id_user', '=', 'absencestudent.id_user')->join('majors', 'majors.id', '=', 'absencestudent.id_majors')->select('users.*', 'absencestudent.*', 'majors.*', 'class.*')->where('date', 'LIKE', '%'.$date.'%')->get();
        return view('Absence', ['class' => $class, 'majors' => $majors, 'tableAbsence' => $tableAbsence, 'absence' => $absence, 'date' => $date, 'majorsParams' => $majorsParams, 'classParams' => $classParams]);
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
        $date = $request->input('date');
        $majorsParams = $request->input('majors');
        $classParams = $request->input('class');
        DB::table('absencestudent')
              ->where('id_absence', $request->id)
              ->update(['status' => $request->status]);
        return redirect('/absence?date='.$request->date.'&majors='.$majorsParams.'&class='.$classParams);
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
