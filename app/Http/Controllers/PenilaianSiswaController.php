<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PenilaianSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $array = [1,2,3,4,5,6,7,8];
        $semesterParams = $request->input('semester');
        $classParams = $request->input('class');
        $majorsParams = $request->input('majors');
        $letterParams = $request->input('letter');
        $queryParams = ( $semesterParams == 'Semua Semester') ? '' : ' WHERE semester = '.$semesterParams;
        $role = (session('auth')->role != 0) ? '' : 'WHERE nik'.session('auth')->nik;
        $data = DB::select('SELECT * FROM penilaiansiswa INNER JOIN users ON penilaiansiswa.nik = users.nik'.$role.$queryParams);
        $student = DB::table('users')->where('role', 0)->get();
        $class = DB::table('class')->get();
        $majors = DB::table('majors')->get();
        $letter = DB::table('letter')->get();
        return view('PenilaianSiswa', ['data' => $data, 'student' => $student, 'array' => $array, 'semester' => $semesterParams, 'class' => $class, 'majors' => $majors, 'letter' => $letter]);
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
        $data = DB::table('penilaiansiswa')->insert(
            ['nik' => $request->nik, 'mata_pelajaran' => $request->mapel, 'semester' => $request->semester, 'teacher' => $request->teacher]
        );
        if ($data) {
            return redirect()->back();
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
        $array = [1,2,3,4,5,6,7,8];
        $student = DB::table('users')->where('role', 0)->get();
        $data = DB::table('penilaiansiswa')->where('id', $id)->get();
        return view('PenilaianSiswaShow', ['data' => $data, 'student' => $student, 'array' => $array]);
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
    public function update(Request $request)
    {
        $data = DB::table('penilaiansiswa')
              ->where('id', $request->id)
              ->update(['nik' => $request->nik, 'mata_pelajaran' => $request->mapel, 'semester' => $request->semester, 'teacher' => $request->teacher, 'uh1' => $request->uh1, 'uh2' => $request->uh2, 'uh3' => $request->uh3, 'uh4' => $request->uh4]);

        
            return redirect('/PenilaianSiswa');
        
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
