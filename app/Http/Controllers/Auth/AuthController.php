<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Dealers;
use DB;
use Validator;
class AuthController extends Controller
{
    public function adminlogin(){
        return view('backend.adminlogin');
    }
    public function dealerLogin(){
        return view('frontend.dealerLogin');
    }
    public function dealerRegister(){
        $states = DB::table('states')->get();
        return view('frontend.dealerRegister',compact('states'));
    }
    public function registerdealerindb(Request $request){
        $validator = $request->validate([
            'dealername' => ['required', 'string', 'max:255'],
            'contactperson' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $users  = User::count();
        $counter = $users + 1;
        $random = rand('111','999');
        $loginid = $counter.''.$random;
        $user = User::create([
            'role_id' => 2,
            'name' => $request->dealername,
            'email' => $request->email,
            'loginid' => $loginid,
            'password' => $request->password,
        ]);
        
        
        $dealer = new Dealers;
        $dealer->user_id = $user->id;
        $dealer->dealership_name = $request->dealername;
        $dealer->contact_person = $request->contactperson;
        $dealer->region	 = $request->region;
        $dealer->city = $request->city;
        $dealer->telephone = $request->telephone;
        $dealer->cell = $request->cell;
        $dealer->save();
        
        return redirect()->route('dealerLogin')->with('success', 'Thanks for registration as dealership. you can login now.');
      //  return redirect()->back()->with('success', 'Thanks for registration as dealership. you can login now.');
    }
    
    public function checkadminlogin(Request $request){
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ], request()->has('remember'));

        if($success) {
            if(auth()->user()->role_id == 1){
                return redirect()->to('dashboard');
            }elseif(auth()->user()->role_id == 2){
                return redirect()->to('/dealer-dashboard');
            }else{
                return redirect()->to('/');
            }
            
        }

        return back()->withErrors('The provided credentials do not match our records.');
    }
    
    public function register(Request $request)
    {
        User::create([
            'role_id' => 3,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('webLogin')->with('success', 'Thanks for registration. you can login now.');
    }
    public function logincheck(Request $request)
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ], request()->has('remember'));

        if($success) {
            $link = session('link');
            session()->forget('link');
            if($link){
                return redirect($link);
            }else{
                return redirect()->to('/');
            }
        }
        return redirect()->route('webLogin')->with('error', 'The provided credentials do not match our records.');
    }
    public function logindealercheck(Request $request)
    {
        $success = auth()->attempt([
            'loginid' => request('loginid'),
            'password' => request('password')
        ], request()->has('remember'));

        if($success) {
            return redirect()->to('/dealer-dashboard');
        }
        return redirect()->route('dealerLogin')->with('error', 'The provided credentials do not match our records.');
    }
    public function adminlogout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function weblogout()
    {
        auth()->logout();
        return redirect()->route('homepage');
    }
    

}
