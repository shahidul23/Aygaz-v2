<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Aygas;
use Hash;
use Session;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function registration(){
        // return view('Auth.registration');
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        if($data->is_admin == 1){
            return view('Auth.registration',compact('data'));
        }else{
            return redirect('/');
        }
        
    }

    public function userRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:8|max:20'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->access_token =$request->password;
        $result = $user->save();
        if ($result) {
            return back()->with('success','You have registerd successfully');
        }else{
            return back()->with('error','You have registerd successfully');
        }

    }
    public function userLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if ($user) {
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('/');
            }else{
                return back()->with('error','Password not matches');
            }
        } else {
            return back()->with('error','This email is not registerd');
        }
        
    }
    public function userLogout(){
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
    public function userList(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $user = User::where('is_admin','=',0)->get();
        return view('Auth.user_list',compact('data','user'));
    }
    public function dashboard(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $week = Aygas::whereBetween('date',[Carbon::now()->startOfWeek(), 
            Carbon::now()->endOfWeek()])->count();
        $month = Aygas::whereYear('date', Carbon::now()->year)
                        ->whereMonth('date', Carbon::now()->month)
                        ->count();
        $year = Aygas::whereYear('date', date('Y'))->count();
        $total = Aygas::all()->count();

        return view('dashboard',compact('data','week','month','year','total'));
    }

}
