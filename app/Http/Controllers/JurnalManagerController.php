<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class JurnalManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('teachingjurnal')->get();
        return view('JurnalManager', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'class' => 'required',
            'mapel' => 'required',
            'codeKD' => 'required',
            'subjeckMatter' => 'required',
            'information' => 'required',
        ]);

        DB::table('teachingjurnal')->insert(
            ['date' => $request->date, 'class' => $request->class, 'nameTeacher' => $request->nameTeacher,'mapel' => $request->mapel, 'codeKD' => $request->codeKD, 'subjeckMatter' => $request->subjeckMatter, 'information' => $request->information]
        );

        return redirect('jurnalManager');
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
