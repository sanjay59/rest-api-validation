<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App;

class RegisterController extends Controller
{
 function __construct()
 {
    date_default_timezone_set("Asia/Calcutta");
}
function index()
{
    return view('frontend.home');
}
function getusers(Request $r)
{
    if($r->session()->get('id'))
    {
        $data=App\Models\RegisterUser::all();
        return view('frontend.users',compact('data'));
    }else{
        return redirect('login');
    }
}
function register()
{
    return view('frontend.register');
}
function store(Request $request)
{
    $name=request('name');
    $email=request('email');
    $password=request('password');
    $mobile_no=request('mobile_no');
        // print_r($name);die();
    $reg= new App\Models\RegisterUser;
    $reg->name=$name;
    $reg->email=$email;
    $reg->password=$password;
    $reg->mobile_no=$mobile_no;
    $check_email=App\Models\RegisterUser::where('email',$email)->get();

    if(count($check_email)>0)
    {
        return redirect()->back()->with('errormsg','Email Already exists.')->withInput();

    }
    $created=$reg->save();
    return redirect('users')->with('success','New Record Add Successfully');
}
function login()
{
    return view('frontend.login');
}
function checkuser(Request $r)
{
    $email=$r->email;
    $mobile_no=$r->mobile_no;

    $user= App\Models\RegisterUser::where('email',$email)->where('mobile_no',$mobile_no)->get();
    
    if(count($user)>0){
        $r->session()->put('id',$user[0]->id);
        $r->session()->put('name',$user[0]->name);

        return redirect('users')->with('slogin','Successfully Login');
    }
    else{
        return redirect('login')->with('errormsg','Email or Mobile No. are not matched')->withInput();;
    }
}
function logout(Request $r)
{
    $r->session()->forget('id');
    $r->session()->forget('name');
    return redirect('login')->with('errormsg','Successfully Logout');

}


//For API

public function signup_by_api(Request $request)
{
 $validator = Validator::make($request->all(), [
    'name'=>'required|alpha',
    'email' => 'required|email|unique:registerusers|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
    'password'=>'required',
    'mobile_no'=>'required',


], [
                // 'first_name.required' => 'first name is required',
                // 'last_name.required' => 'last name is required',
                // 'email.required' => 'email is required',

]);

 if ($validator->fails()) {
    return response()->json(['status' => false, 'validationErrors' => $validator->errors()], 200);
} 

$name = $request->name;
$email = $request->email;
$password = $request->password;
$mobile_no = $request->mobile_no;


$post = App\Models\RegisterUser::Create(
    ['name' => $name,'email' => $email,'password' =>$password,'mobile_no' =>$mobile_no,]);
$userid = App\Models\RegisterUser::where('email',$email)->latest('created_at')->first();
if ($post) {
    return response()->json(['status' => true, 'message' => "User save successfully",'id'=>$userid->id], 200);
} 
}
function signin_by_api(Request $request)
{
 $validator = Validator::make($request->all(), [
    'email' => 'required',
    'mobile_no'=>'required',
]);
 $email = $request->email;
$mobile_no = $request->mobile_no;
$user= App\Models\RegisterUser::where('email',$email)->where('mobile_no',$mobile_no)->first();

if($user){
 return response()->json(['status' => true, 'message' => "User login successfully",'id'=>$user->id], 200);
}
else{
 return response()->json(['status' => false, 'errormsg' => 'User Not Found'], 200);
}
}
function getusersapi(Request $r)
{
    $data=App\Models\RegisterUser::all();
    return response()->json(['status' => true, 'data'=>$data], 200);
}


}
