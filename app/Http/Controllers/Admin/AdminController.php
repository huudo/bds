<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;

use App\Repositories\User\UserInterface;
use App\Repositories\Mail\MailInterface as MailInterface;

class AdminController extends Controller
{
    protected $user;
    protected $mail;


    public function __construct(UserInterface $user, MailInterface $mail) {
        $this->user = $user;
        $this->mail = $mail;
    }

    public function index()
    {
        $data = [
          'title' => 'Trang quản trị Admin'  
        ];
        return view('backend.index', $data);
    }
    
    public function getLogin(){
        if(auth()->check()){
            return view('errors.logon')->with('mess', 'You are Logged in');
        }
        return view('auth.login');
    }
    
    public function postLogin(Request $request){
        $valid = Validator::make($request->all(), [
                    'username' => 'required|alpha_dash',
                    'password' => 'required'
        ]);
        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'active' => 1
        ];
        if (\Cache::has('loginAttempt')) {
            $attempt_count = \Cache::get('loginAttempt');
            if ($attempt_count > 5) {
                return redirect()->back()->with('errorMess', 'Bạn đã đăng nhập sai quá nhiều lần, Vui lòng thử lại sau 1 giờ nữa');
            }
            \Cache::increment('loginAttempt');
        } else {
            \Cache::put('loginAttempt', 1, 60);
        }

        if (auth()->attempt($data)) {
            \Cache::forget('loginAttempt');
            return redirect()->route('admin');
        }
        return redirect()->back()->withInput()->with('errorMess', trans('Tên đăng nhập hoặc mật khẩu không đúng'));
    }
    
    public function getLogout(){
        if(!auth()->check()){
            return view('errors.logon')->with('mess', 'Bạn chưa đăng nhập!');
        }
        auth()->logout();
        return view('auth.login');
    }
    
    public function lostPassword(){
        if(auth()->check()){
            return view('errors.logon')->with('mess', 'You are Logged in');
        }
        return view('auth.resetpassword');
    }
    
    public function resetPassword(Request $request){
        $valid = Validator::make($request->all(), [
            'email' => 'email|required'
        ]);
        if($valid->fails()){
            return redirect()->back()->withInput()->withErrors($valid->errors());
        }
        $user = $this->user->getByEmail($request->input('email'));
        
        $this->mail->send('auth.resetmail', [], 'admin@gmail.com', 'member@gmail.com', 'Reset Email');
        
    }
    
    public function filemanager(){
        $data = [
            'title' => 'Quản lý thư viện'
        ];
        return view('backend.file.index', $data);
    }
}
