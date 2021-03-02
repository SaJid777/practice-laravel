<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class TestController extends Controller
{
    public function signup($request){
        $id=hexdec(uniqid());
        
        $data=array();
        $data['u_id']=$id;
        $data['name']=$request->name;
        $data['shortname']=$request->shortname;
        $data['bio']=$request->bio;
        $data['p_pic']=$request->name;
        $data['t_pic']=$request->name;
        $data['reknown']=$request->known;
            
        $insert=DB::table('user')->insert([
            'u_id' => $id,
            'name' => $request["name"],
            'shortname' => $request["shortname"],
            'bio' => $request["bio"],
            'p_pic' => $request["shortname"],
            't_pic' => $request["shortname"],
            'reknown' => $request["known"]
        ]);
        
        if($insert){
            return response()->json(['data'=>$data]);
        }
        else{
            $err="error";
            return response()->json(['err'=>$err]);
        }

    }

    public function view_data(){
        $data=DB::table('user')->get();

        return response()->json(['data'=>$data]);
    }

    public function search_data($id){
        $data=DB::table('user')->where('u_id',$id)->first();

        return response()->json(['data'=>$data]);
    }

}
