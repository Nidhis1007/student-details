<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegisterUser;
use Hash;
use Auth;

class RegisterStudent extends Model
{
    use HasFactory;
     public function register($request){
       
        $data = ['fname' => $request['sname'],
                 'lname' => $request['slname'],
                 'rno'   => $request['rno'],
                 'fathername' => $request['fname'],
                 'mothername' => $request['mname'],
                 'gender'=> $request['gender'],
                 'phonenumber'=> $request['phonenumber'],
                 'photo' => $request['photo']
                ];
              
        $user = RegisterUser::create($data);
        return ['status_code' => 200, 'message' => 'User created'];
        
    }

    public function view(){
        $students = RegisterUser::orderBy('id', 'desc')->get();
        if($students->isNotEmpty()){
            return ['status_code' => 200, 'message' => 'Users List', 'result' => $students];
        }else{
            return ['status_code' => 400, 'message' => 'No Students Created Yet!'];
        }
        
    }

    public function edit($id)
    {
        $student_update = RegisterUser::find($id);
        return ['status_code' => 200, 'message' => 'Users List', 'result' => $student_update];
    }

     public function store($value)
    {

        $student_update = RegisterUser::find($value["id"]);
        $student_update -> fname = $value["sname"];
        $student_update -> lname = $value["slname"];
        $student_update -> rno = $value["rno"];
        $student_update -> fathername = $value["fname"];
        $student_update -> mothername = $value["mname"];
        $student_update -> gender = $value["gender"];
        $student_update -> phonenumber = $value["phonenumber"];
        $student_update -> photo = $value["photo"];

        if($student_update ->save()){
            return ['status_code' => 200, 'message' => 'Users List', 'result' => $student_update];
        }else{
            return ['status_code' => 400, 'message' => 'Not Updated!'];
        }
    }

      public function deleterecord($id)
    {
        $student_delete = RegisterUser::find($id);
        if($student_delete->delete()){
            return ['status_code' => 200, 'message' => 'Deteted'];
        }else{
            return ['status_code' => 400, 'message' => 'Delete Failed'];
        }
    }
}
