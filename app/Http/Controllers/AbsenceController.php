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
        $letterParams = $request->input('letter');
        $class = DB::table('class')->get();
        $majors = DB::table('majors')->get();
        $letter = DB::table('letter')->get();
        $absence = DB::table('absencestudent')->select(DB::raw('count(*) as count, absencestudent.status'))->groupBy('absencestudent.status')->where('date', 'LIKE', '%'.$date.'%')->where('absencestudent.id_class', '=', $classParams)->where('absencestudent.letter', '=', $letterParams)->where('absencestudent.id_majors', '=', $majorsParams)->orderBy('absencestudent.status', 'asc')->get();
       
        $tableAbsence = DB::table('absencestudent')->join('users', 'users.nik', '=', 'absencestudent.nik')->select('users.*', 'absencestudent.*')->where('date', 'LIKE', '%'.$date.'%')->where('absencestudent.id_class', '=', $classParams)->where('absencestudent.letter', '=', $letterParams)->where('absencestudent.id_majors', '=', $majorsParams)->get();
        return view('Absence', ['class' => $class, 'majors' => $majors, 'tableAbsence' => $tableAbsence, 'absence' => $absence, 'date' => $date, 'majorsParams' => $majorsParams, 'classParams' => $classParams, 'letter' => $letter, 'letterParams' => $letterParams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nip, $majors, $class, $letter)
    {
        DB::table('absencestudent')->insert(
            ['nik' => $nip, 'date' => Date('Y-m-d'), 'id_majors' => $majors, 'id_class' => $class, 'status' => 'masuk', 'letter' => $letter]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request)
    {
        $date = $request->input('date');
        $majorsParams = $request->input('majors');
        $classParams = $request->input('class');
        $letterParams = $request->input('letter');
        $class = DB::table('class')->get();
        $majors = DB::table('majors')->get();
        $letter = DB::table('letter')->get();
        $absence = DB::table('absencestudent')->join('class','class.id_class', '=', 'absencestudent.id_class')->join('majors' ,'majors.id', '=', 'absencestudent.id_majors')->select(DB::raw('count(*) as count, absencestudent.status'))->groupBy('absencestudent.status')->where('absencestudent.date', 'LIKE', '%'.$date.'%')->where('majors.name_majors', '=', $majorsParams)->where('class.name_class', '=', $classParams)->where('absencestudent.letter', '=', $letterParams)->orderBy('absencestudent.status', 'asc')->get();
       
        $tableAbsence = DB::table('absencestudent')->join('class', 'class.id_class', '=', 'absencestudent.id_class')->join('users', 'users.nik', '=', 'absencestudent.nik')->join('majors', 'majors.id', '=', 'absencestudent.id_majors')->select('users.*', 'absencestudent.*', 'majors.*', 'class.*')->where('date', 'LIKE', '%'.$date.'%')->where('users.letter', '=', $letterParams)->get();
        return view('Print', ['class' => $class, 'majors' => $majors, 'tableAbsence' => $tableAbsence, 'absence' => $absence, 'date' => $date, 'majorsParams' => $majorsParams, 'classParams' => $classParams, 'letter' => $letter, 'letterParams' => $letterParams]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        $show = DB::table('absence')->where('nik', '=' ,$nip)->get();
        return response()->json($show, 201);
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
