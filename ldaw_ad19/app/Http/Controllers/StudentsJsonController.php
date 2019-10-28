<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsJsonController extends Controller{

    public function new(){

        return view("students.new");

    }

    public function create(Request $request){

        //Load JSON file
        $filename = storage_path("files/students.json");
        $data = file_get_contents($filename);
        $data = json_decode($data,true);

        $student = [
            "id" => $request->input("id"),
            "name" => $request->input("name"),
            "lastname" => $request->input("lastname")
        ];

        $data[$request->input("id")] = $student;

        //Save file
        if( file_put_contents($filename, json_encode($data)) ){
            return redirect("studentsJson/list");
        }

    }

}
