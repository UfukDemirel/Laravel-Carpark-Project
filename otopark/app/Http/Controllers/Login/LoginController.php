<?php

namespace App\Http\Controllers\Login;

use App\Models\Blok;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends BaseController
{
    /**@var Blok|Model
     */

    public $blok;

    public function __construct(Blok $blok){
        $this->blok = $blok;
    }

    public function login(){
        return view('Login.login');
    }

    public function loginpost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $isemailverify = User::where("email", $credentials["email"])->value('email_verify');
        $is_active = User::where("email", $credentials["email"])->value('is_active');

        if ($is_active == 1) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if ($isemailverify == 0) {
                    return redirect()->route('update');
                }
                Alert::alert('Great', 'you are logged in...', 'success');
                if (Auth::user()->permission_level == 'admin') {
                    return redirect()->intended(route('welcome'));
                } else {
                    return redirect()->intended(route('home'));
                }
            } else {
                Alert::error('Error', 'Your information is incorrect...', 'error');
                return redirect()->route('login');
            }
        } else {
            Alert::error('Error', 'Your information is incorrect...', 'error');
            return redirect()->route('error');
        }
    }

    public function register(){
        return view('Login.register');
    }

    public function registerpost(Request $request){
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $cod = Str::random(6);
        $record=DB::table("users")->insert([
            "name"=>$request->name,
            "surname"=>$request->surname,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "permission_level"=>("user"),
            "is_active"=>1,
            "email_verify"=>0,
            "random"=>$cod,
        ]);

        $details = [
            'title' => 'Lütfen mail adresinizi onaylayın..',
            'body' => 'Onay kodunuz:  '. $cod
        ];

        Mail::to($request->email)->send(new \App\Mail\TestMail($details));
        print_r($cod);
        if($record){
            Alert::success('Great!', 'You are registered, you can login.');
            return redirect('login');
        }else{
            Alert::error('Error!', 'E-mail or nickname error..');
        }
        return back();
    }

    public function update(){
        $post = User::where('id','=',Auth::user()->id)->get();
        return view('Frontend.update',compact('post'));
    }

    public function updatepost(Request $request){
        $emptya = $this->blok->bloka();
        $emptyb = $this->blok->blokb();
        $emptyc = $this->blok->blokc();
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'email_verify'=>'required',
        ]);
        $post = DB::table("users")
            ->where('id',Auth::user()->id)
            ->update([
                "name"=>$request->name,
                "surname"=>$request->surname,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "email_verify"=>$request->email_verify,
                "is_active"=>1
            ]);
        if ($post){
            if($request->email_verify==Auth::user()->random){
                Alert::success('Great!', 'You are registered, you can login.');
                return view('Frontend.empty',compact('emptya','emptyb','emptyc'));
            }else{
                Alert::error('Error!', 'We encountered a problem while updating.');
                return back('update');
            }
        }else{
            Alert::error('Error!', 'We encountered a problem while updating.');
            return back();
        }
    }

    public function exit(){
        Auth::logout();
        Alert::alert('Great', 'You signed out...', 'success');
        return redirect()->intended(route('login'));
    }
}
