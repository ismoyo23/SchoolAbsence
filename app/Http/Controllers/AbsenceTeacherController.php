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
        $absence = DB::table('absencetheacher')->join('users', 'users.nik', '=', 'absencetheacher.nik')->select(DB::raw('count(*) as count, absencetheacher.status'))->groupBy('absencetheacher.status')->where('absencetheacher.created_at', 'LIKE', '%'.$date.'%')->get();
        $data = DB::table('absencetheacher')->join('users', 'users.nik', '=', 'absencetheacher.nik')->select('users.*', 'absencetheacher.*')->where('absencetheacher.created_at', 'LIKE', '%'.$date.'%')->get();
        return view('AbsenceTeacher', ['data' => $data, 'absence' => $absence, 'date' => $date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($code, $nik, $class, $jam, $materi, $status)
    {
        $data = DB::table('absencetheacher')->insert(
            ['code_room' => $code, 'status' => $status, 'class' => $class, 'nik' => $nik, 'jam_ke' => $jam, 'materi' => $materi]
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
    public function show(Request $request)
    {
        $date = $request->input('date');
        $data = DB::table('absencetheacher')->join('users', 'users.nik', '=', 'absencetheacher.nik')->select('users.*', 'absencetheacher.*')->where('absencetheacher.created_at', 'LIKE', '%'.$date.'%')->get();
        return view('PrintAbsensiGuru', ['data' => $data]);
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
