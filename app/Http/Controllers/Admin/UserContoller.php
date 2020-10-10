<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Datatables;
use App\Models\User;
use Illuminate\Support\Facades\Input;

class UserContoller extends Controller
{
    

        
    public function dashboard()
    {
        $users = User::count();
         return view('users/dashboard', ['users' => $users]);
    }
    public function index(Request $request)
    {
        
        $users = User::all();
        if (empty($request->get("isjson")) === false) {
            return new JsonResponse($users);
            //return response()->json(json_encode($users), 200);
        }
        return view('users.list', ['users' => $users]);
    }

    public function create()
    {
        return view('users.new');
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);
  
        User::create($request->all());
   
        return redirect('user')
                        ->with('success','User created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $User
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $users = User::where('id',$user)->first();
        return view('users.show',['users' => $users]);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $User
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
        $users = User::where('id',$user)->first();
        return view('users.edit',['users' => $users]);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        $users = User::find($user);
            $users->name       = $request->name;
            $users->email      = $request->email;
            
            $users->save();

  
        return redirect('user')
                        ->with('success','User updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
          $User->delete();
  
        return redirect('user')
                        ->with('success','User deleted successfully');
    }
}