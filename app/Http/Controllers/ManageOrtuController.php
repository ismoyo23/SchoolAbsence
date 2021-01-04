<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ManageOrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')->where('role', 3)->get();
        return view('ManageOrtu', ['data' => $data]);
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
    public function store(Request $req)
    {
        $req->validate([
            'nik' => 'required',
            'nm_ortu' => 'required',
            'nisn' => 'required',
            'alamat' => 'required'
        ]);
        DB::table('users')->insert(['nik' => $req->nik, 'name_user' => $req->name_user, 'class' => $req->class, 'majors' => $req->majors, 'role' => 3]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('users')->where('id_user', $id)->get();
        return view('ManageOrtuShow', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        DB::table('users')
              ->where('id_user', $id)
              ->update(['nik' => $req->nik, 'name_user' => $req->name_user, 'class' => $req->class, 'majors' => $req->majors, 'role' => 3]);
              return redirect('/ManageOrtu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id_user', '=', $id)->delete();
        return redirect()->back();
    }
}
