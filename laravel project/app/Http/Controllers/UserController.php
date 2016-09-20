<?php

namespace App\Http\Controllers;
use Input;
use DB;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
                        ->where('status','=','1')
                        ->get();
        return view('user.index',['users' => $users]);
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

    public function store(Request $request)
    {
        if($request->ajax()){
            $data = $request->all(); 
            $data['create_date'] = date('Y-m-d');
            $data['status'] = 1;
            $data['password'] = Hash::make($data['password']);            
            DB::table('users')->insert($data);
        }
    }

    public function show($id)
    {
        $user = DB::table('users')
                    ->where('id', $id)
                    ->get();
        return json_encode($user);
    }

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
