<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature = Feature::orderby('id','desc')->paginate(12);
        return view('Admin.feature.index',compact('feature'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Feature($request->all());
        if($data->save())
        {
            Session::flash('success','با موفقیت انجام شد');
            return  redirect()->back();
        }
        else
        {
            session::flash('unsuccess','با موفقیت انجام نشد');
            return redirect()->back();
        }
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
        $update = Feature::find($id);
        if($update->update($request->all()))
        {
            Session::flash('success',' با موفقیت انجام شد');
            return redirect()->back();
        }
        else
        {
            Session::flash('unsuccess',' با موفقیت انجام نشد');
            return redirect()->back();
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
        Feature::where('id',$id)->delete();


        Session::flash('success',' با موفقیت انجام شد');
        return redirect()->back();
    }
}
