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
        $absence = DB::table('absence')->join('class','class.id_class', '=', 'absence.id_class')->join('majors' ,'majors.id', '=', 'absence.id_majors')->select(DB::raw('count(*) as count, absence.status'))->groupBy('absence.status')->where('absence.date', 'LIKE', '%'.$date.'%')->where('majors.name_majors', '=', $majorsParams)->where('class.name_class', '=', $classParams)->where('absence.letter', '=', $letterParams)->orderBy('absence.status', 'asc')->get();
       
        $tableAbsence = DB::table('absence')->join('class', 'class.id_class', '=', 'absence.id_class')->join('users', 'users.nik', '=', 'absence.nik')->join('majors', 'majors.id', '=', 'absence.id_majors')->select('users.*', 'absence.*', 'majors.*', 'class.*')->where('date', 'LIKE', '%'.$date.'%')->where('users.letter', '=', $letterParams)->get();
        return view('Absence', ['class' => $class, 'majors' => $majors, 'tableAbsence' => $tableAbsence, 'absence' => $absence, 'date' => $date, 'majorsParams' => $majorsParams, 'classParams' => $classParams, 'letter' => $letter, 'letterParams' => $letterParams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nip, $majors, $class, $letter)
    {
        DB::table('absence')->insert(
            ['nik' => $nip, 'date' => Date('Y-m-d'), 'id_majors' => $majors, 'id_class' => $class, 'status' => 'masuk', 'letter' => $letter]
        );
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
        DB::table('absence')
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
