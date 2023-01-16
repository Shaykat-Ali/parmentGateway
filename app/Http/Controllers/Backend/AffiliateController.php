<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Affiliate;
use App\Http\Requests\AffiliateRequest;

class AffiliateController extends Controller
{

    public function index()
    {
        $affiliates = Affiliate::orderBy('id','desc')->paginate(10);
        return view('backend.affiliate.index',[
           'affiliates' => $affiliates
        ]);
    }


    public function create()
    {
        return view('backend.affiliate.create');
    }


    public function store(AffiliateRequest $request)
    {
        $affiliate = new Affiliate();
        $affiliate->fill($request->all());
        if($affiliate->save()){
            return redirect()->route('affiliates.index')->with('success','Affiliates Created Successfully');
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
        $affiliate = Affiliate::findOrFail($id);
        return view('backend.affiliate.edit',[
            'affiliate' => $affiliate
        ]);
    }


    public function update(AffiliateRequest $request, $id)
    {
        $affiliate = Affiliate::findOrFail($id);
        $affiliate->fill($request->all());
        if($affiliate->save()){
            return redirect()->route('affiliates.index')->with('success','Affiliates Updated Successfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }
    }


    public function destroy($id)
    {
        //
    }
}
