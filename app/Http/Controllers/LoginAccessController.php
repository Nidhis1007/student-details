<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSignUpRequest;
use App\Models\LoginModel;
use App\Models\RegisterStudent;
use Auth;
use Hash;

class LoginAccessController extends Controller
{
    
     // Single constructor method
    public function __construct(LoginModel $loginModel, RegisterStudent $registerStudent)
    {
        $this->loginModel = $loginModel;
        $this->registerStudent = $registerStudent;
    }

    public function home(){
            return view("home");
    }

    public function login(Request $request){
            return view("login");
    }

    public function userlogin(Request $request){

        $data = $request->only('email','password');
        if(Auth::attempt($data)){ 
            
            return redirect("/dashboard"); 
        }else{
            return back();
        }
    }
  
    public function authenticateUser(StoreSignUpRequest $request){
        $validatedData = $request->validated();
        /*$credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){ 
                return back();
        }else{*/
             $result = $this->loginModel->register($request->all());
             //$user = Auth::user();
             if($result['status_code'] == 200){
                return redirect("/")->with('status', 'User Profile Created!');
             }else{
                return back();
             }   
        //}
    }

    public function registerform(){
        return view("studentform");
    }

     public function registerstudent(StoreSignUpRequest $request){

        

        $result = $this->registerStudent->register($request->all());
        //$user = Auth::user();
             if($result['status_code'] == 200){
                return redirect('/viewstudentlist');
             }else{
                return back()->withErrors(['error' => 'Registration failed!']);
             } 
        
    }

    public function updatestudent(Request $request){

        $validatedData = $request->validated();

        $result = $this->registerStudent->store($request->all());
             if($result['status_code'] == 200){
                return redirect('/viewstudentlist');
             }else{
                return back()->withErrors(['error' => 'Registration failed!']);
             } 
    }




    public function viewstudentlist(Request $request){
        $result = $this->registerStudent->view($request->all());
        $user = Auth::user();
             if($result['status_code'] == 200){
                 $students = $result['result']; 
                return view("login", compact('students', 'user'));
                //return view("login")->with('user',$user);
             }else{
                //return "No Students Created Yet!";
                return view("login", [
                 'user' => $user,
                 'result' => $result,
                 'message' => $result['message']
                ]);
                //return back();
             } 
    }



    public function logout(){ 
        $user = Auth::user();
        Auth::logout();
        return view("logout")->with('user',$user);
        // return redirect('/index');
    }

    public function update($id){
        $result = $this->registerStudent->edit($id);
        return view('studentupdate', $result);
    }

    public function delete($id){

        $result = $this->registerStudent->deleterecord($id);
        if($result['status_code'] == 200){
        return redirect('/viewstudentlist');
        }
    }
}
