<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AbsenceTeacherController extends Controller
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
        $tableAbsence = DB::table('absencestudent')->join('class', 'class.id_class', '=', 'absencestudent.id_class')->join('users', 'users.nik', '=', 'absencestudent.nik')->join('majors', 'majors.id', '=', 'absencestudent.id_majors')->select(DB::raw('count(*) as count, absencestudent.*'))->groupBy('absencestudent.status')->where('date', 'LIKE', '%'.$date.'%')->where('users.letter', '=', $letterParams)->get();

        return view('AbsenceTeacher', ['class' => $class, 'majors' => $majors, 'tableAbsence' => $tableAbsence, 'date' => $date, 'majorsParams' => $majorsParams, 'classParams' => $classParams, 'letter' => $letter, 'letterParams' => $letterParams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($code, $nik, $class, $jam, $materi)
    {
        $data = DB::table('absencetheacher')->insert(
            ['code_room' => $code, 'status' => 'masuk', 'class' => $class, 'nik' => $nik, 'jam_ke' => $jam, 'materi' => $materi]
        );
        return response()->json($data, 201);
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
}
