<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $data = DB::table('users')->get()->where('role', 1);
        return view('User', ['data' => $data]);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
          'name' => 'required',
          'nupt' => 'required',
          'nik' => 'required',
          'mapel' => 'required',
          
        ]);
        $data = DB::table('users')->insert(
            ['nik' => $request->nik, 'letter' => $request->nupt, 'name_user' => $request->name, 'class' => $request->mapel, 'role' => '1']
        );

        if ($data) {
            return back();
        }
    }

    public function ImportUser(Request $request)
    {
        $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

         Excel::import(new UsersImport, $request->file('select_file')->store('temp'));
         return back();
    }
    


    public function store(Request $request)
    {
        $auth = DB::table('users')->where('nik', $request->nik)->get();
        if (count($auth) == null) {
            return redirect('/')->with(['error' => 'Belum Terdaftar']);
        }else{
            foreach ($auth as $key) {
                $session = $request->session()->put('auth', $key);

              if ($key->role == 0) {
                return redirect('/PantauSiswa');
              }else{
                return redirect('/Admin?date='.Date("Y-m-d").'&majors=RPL');
                }
              }

            }
        }
        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->forget('auth');
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seeUser($nik)
    {
        $data = DB::table('users')->where('nik','=', $nik)->get();
        return json_encode($data);
    }

    public function showData($id)
    {
        $data = DB::table('users')->where('id_user','=', $id)->get();
        return view('UpdateTeacher', ["data" => $data]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
          'name' => 'required',
          'nupt' => 'required',
          'nik' => 'required',
          'mapel' => 'required',
          
        ]);

        $affected = DB::table('users')
              ->where('id_user', $request->id)
              ->update([
                    'nik' => $request->nik, 'letter' => $request->nupt, 'name_user' => $request->name, 'class' => $request->mapel, 'role' => '1'
                ]);

              return redirect('user');
    }

    public function delete($id)
    {
        DB::table('users')->where('id_user', '=', $id)->delete();
        return back();
    }

    public function destroy($id)
    {
        $data = DB::table('users')->where('id_user', '=', $id)->delete();

        return json_encode($data);
    }
}
