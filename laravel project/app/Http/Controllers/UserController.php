<?php

namespace App\Http\Controllers;
use Input;
use DB;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {        
        return view('user.index');
    }

    public function getList(){
        $users = DB::table('users')
                        ->where('status','1')
                        ->get();
        return json_encode($users);
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
        if(Auth::check()){
            if($request->ajax()){
                $data = $request->all(); 
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['status'] = 1;
                $data['password'] = Hash::make($data['password']);            
                DB::table('users')->insert($data);
            }else{
                return redirect()->guest('auth/login');
            }
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

    public function update(Request $request, $id)
    {
        if(Auth::check()){
            if($request->ajax()){
                $data = $request->all();
                DB::table('users')
                    ->where('id',$id)
                    ->update([
                        'username' => $data['username'],
                        'email' => $data['email'],
                        'updated_at' => date('Y-m-d H:i:s'),
                        'role' => $data['role']
                    ]);
            }else{
                return redirect()->guest('auth/login');
            }           
        }
    }

    public function destroy($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();
    }
}
