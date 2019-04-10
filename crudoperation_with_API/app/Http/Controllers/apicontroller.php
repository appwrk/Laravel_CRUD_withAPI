<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
class apicontroller extends Controller
{
    public function create(Request $request){
      $students = new student();
        $students->name = $request->input('name');
        $students->email = $request->input('email');
        $students->save();
        return response()->json($students);
    }
    public function read(){
          $students = student::all();
          return response()->json($students);
      }
      public function fetch($id){
          $students = student::find($id);
          return response()-> json($students);  
      }
      public function update(Request $request){
        $id = $request ->id;
        $student = student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return response()->json($student);
      }
      public function delete($id){
        $students = student::find($id);
        $students->delete();
            return response()->json($students);
      }
}
