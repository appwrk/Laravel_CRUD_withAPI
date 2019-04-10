<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Validator;

class crud extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=user::orderBy("id","desc")->get(); 
        return view("index",compact("users"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("index2");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required|email|unique:users"
        ],[
            "name.required"=>"Please fill your name",
            "email.required"=>"Please fill your email",
            "email.email"=>"email should be valid"
        ])->validate();
        $insert = new user;
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->created_dt = date("d-m-y h:i:s");
        $saved = $insert->save();
        
        if($saved){
            session()->flash("message","data has been filled");
            return redirect("crud/create");
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
        $user = user::find($id);
        return view("edit",compact('user'));
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
        $data = Validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required|email"
        ],[
            "name.required"=>"Please fill your name",
            "email.required"=>"Please fill your email",
            
        ])->validate();
        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $saved = $user->save();
        if($saved){
            session()->flash("message","data has been updated");
            return redirect("crud/".$id."/edit");
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
        $user = user::find($id);
        $deleted = $user->delete();
        if($deleted)
        {
            session()->flash("message","data has been deleted");
            return redirect("crud");
        }
    }
}
