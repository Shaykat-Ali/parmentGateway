<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::whereIn('role' , [1,2])->orderBy('id','desc')->paginate(10);
        return view('backend.user.index',[
           'users' => $users
        ]);
    }


    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->role = $request->user_type == 'Admin' ? 1 : 2;
        $user->password = \Hash::make($request->password);
        if($request->hasFile('image')){
            $user->image = Storage::put('user',$request->file('image'));
        }
        if($user->save()){
            return redirect()->route('users.index')->with('success','User Created Successfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit',[
            'user' => $user
        ]);
    }


    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->role = $request->user_type == 'Admin' ? 1 : 2;
        if($request->hasFile('image')){
            $user->image = Storage::put('user',$request->file('image'));
        }
        if($user->save()){
            return redirect()->route('users.index')->with('success','User Updated Successfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }
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
