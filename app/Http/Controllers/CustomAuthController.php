<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Жүйеге кірдіңіз');
        }
  
        return redirect("login")->withSuccess('Логин мәліметтері жарамсыз');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'photo' => 'required|image|mimes:jpg,png,jpeg',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        if(!empty($request->password)){
            $data["password"] = trim($request->password);
        }
        $filename = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $filename, 'public');
        $data["photo"] = '/storage/'.$path;
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Сіз жүйеге кірдіңіз');
    }

    public function create(array $data)
    {
      return User::create([
        
        'name' => $data['name'],
        'email' => $data['email'],
        'photo' => $data['photo'],
        'phone' => $data['phone'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Сізге жүйеге кіруге рұқсат жоқ');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
