<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Jumbojett\OpenIDConnectClient;

class AuthController extends Controller
{
    public function tujuan()
    {
        return view('auth.login2');   
    }
    public function showlogin()
    {
    	return view('auth.login2');
    }
    public function login(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) )
    	{
    		if (Auth::User()->status =='admin')
    		{
    			return redirect('/admin');
    		}
    		else
    		{
    			return redirect('/member');
    		}
    	}
    	else
    	{
    		return redirect ('/login');
    	}
    }
    public function login2()
    {

        $oidc = new OpenIDConnectClient('https://my.its.ac.id', '23361951-658B-488E-BBB2-61E0726257C8', '473f1834480bcd7e2bb7d3ca');

        /* jika tidak menggunakan openid discovery aktifkan bagian ini 
        $oidc->providerConfigParam(
            array(
                'authorization_endpoint' => 'https://my.its.ac.id/authorize', 
                'token_endpoint' => 'https://my.its.ac.id/token',
                'jwks_uri' => 'https://my.its.ac.id/.well-known/jwks.json'
            ));
        */

        //String redirect URI harus identik dengan yang didaftarkan di provider (my.its.ac.id)
        $oidc->setRedirectURL('http://localhost:8000/login2'); 


        //set scope yang diinginkan
        $oidc->addScope('openid profile email roleunit');

        //set auth param jika diperlukan
        // $oidc->addAuthParam(array(
        //  'prompt' => 'none'
        // ));


        /* in development */
        //$oidc->setVerifyHost(false);
        //$oidc->setVerifyPeer(false);

        /*
            
        pada server produksi pastikan web server memiliki daftar trusted CA
        dapat diunduh di http://curl.haxx.se/ca/cacert.pem

        set di php.ini
        curl.cainfo="path/to/cacert.pem"
        openssl.cafile="path/to/cacert.pem"

        */
        $oidc->authenticate();
        // var_dump('berhasil'); die();
        $userInfo = $oidc->requestUserInfo();
        //session_start();

        $_SESSION['userinfo'] = $userInfo;
        $_SESSION['userinfo2'] = $userInfo->email;
        $_SESSION['username'] = $userInfo->name;
        $_SESSION['id_token'] = $oidc->getIdToken();

        return redirect('/tujuan');
        //header('Location: index.php');
        //return redirect('/');
    }
    public function logout2(){
        session_start();
        if (isset($_SESSION['id_token'])) {
        $accessToken = $_SESSION['id_token'];
        $redirect = 'http://localhost:8000';

        session_destroy();

        $oidc = new OpenIDConnectClient('https://my.its.ac.id', '23361951-658B-488E-BBB2-61E0726257C8', '473f1834480bcd7e2bb7d3ca');
        $oidc->signOut($accessToken, $redirect);
        return redirect('/tujuan');
    }
    else{
        dd("belum keisi session");
    }
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        else
        {
            $usr=new User();
            $usr->email=$request->email;
            $usr->name=$request->name;
            $usr->password=bcrypt($request->password);
            $usr->status=$request->status;
            $usr->save();
            if ( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) 
            {
                if(Auth::user()->status=='admin')
                {
                    return redirect('/admin');
                }
                else
                {
                    return redirect('/member');
                }
            }
        }
    }
	public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function home()
    {
    	return view ('admin.admin');
    }
    public function homemember()
    {
    	return view('member.home');
    }
    public function hak()
    {
        return view('hak');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
