<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\PartnerRequest;
use Illuminate\Support\Facades\Storage;
use File;


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
        return view('backend.partner.create');
    }


    public function store(PartnerRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->role = 3;
        $user->created_by = auth()->user()->id;
        $user->password = \Hash::make($request->password);
        if($request->hasFile('image')){
            $user->image = Storage::put('user',$request->file('image'));
        }
        if($user->save()){
            return redirect()->route('partners.index')->with('success','Partner Created Successfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }
    }


    public function show($id)
    {
        $users = User::whereIn('role' , [4])->where('created_by' , $id)->where('status',1)->orderBy('id','desc')->paginate(10);
        return view('backend.partner.user.index',[
           'users' => $users,
           'partnerId' => $id
        ]);
    }


    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        return view('backend.partner.edit',[
            'user' => $user
        ]);
    }


    public function update(PartnerRequest $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->fill($request->all());
        $user->role = 3;
        $user->created_by = auth()->user()->id;
        $old_file = $user->image;
        if($request->hasFile('image')){
            if ($user->image != null){
                $this->deleteFile($old_file);
            }
            $user->image = Storage::put('user',$request->file('image'));
        }
        if($user->save()){
            return redirect()->route('partners.index')->with('success','Partner Updated Successfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }
    }


    public function destroy($id)
    {
        //
    }

    public function changeStatus($id){

        $user = User::findOrFail($id);
        $user->status =  $user->status == 0 || $user->status == 2 ? 1 : 0;
        if($user->save()){
            return redirect()->route('partners.index')->with('success','Status Change Successfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }

    }

    private function deleteFile($path)
    {
        if(Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
