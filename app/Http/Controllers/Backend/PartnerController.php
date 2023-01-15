<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PartnerController extends Controller
{

    public function index()
    {
        $users = User::whereIn('role' , [3])->orderBy('id','desc')->paginate(10);
        return view('backend.partner.index',[
           'users' => $users
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $users = User::whereIn('role' , [4])->where('created_by' , $id)->where('status',1)->orderBy('id','desc')->paginate(10);
        return view('backend.partner.user.index',[
           'users' => $users,
           'partnerId' => $id
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
