<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PartnerUserRequest;


class PartnerUserController extends Controller
{

    public function index()
    {
        //
    }


    public function create($partner_id)
    {
        return view('backend.partner.user.create',[
            'partner_id' => $partner_id
        ]);
    }


    public function store(PartnerUserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->role = 4;
        $user->created_by = $request->partner_id;
        $user->password = \Hash::make($request->password);
        if($request->hasFile('image')){
            $user->image = Storage::put('user',$request->file('image'));
        }
        if($user->save()){
            return redirect()->route('partners.show',$request->partner_id)->with('success','Partner\'s User Created Successfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }

    }


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
