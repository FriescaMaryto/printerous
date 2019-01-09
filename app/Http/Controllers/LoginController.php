<?php namespace App\Http\Controllers;

use Input;
use DB;

use Auth;
use RedirectResponse;
use Login;
use Validator;
use Redirect;
use Session;

use Hash;

class LoginController extends Controller {

    public function accmgr_login(){
        $data1 = session('accmgr');
        $data2 = session('admin');

    if($data1 == null&& $data2 == null) {
			return view('auth.login');
		}
		elseif ($data1 !== null) {
			return redirect('cari_org');
		}
    elseif ($data2 !== null) {
			return redirect('/admin/view');
		}
		else {
			return view('auth.login');
		}
    }


    public function accmgr_do_login(){
        $username = Input::get('username');
        $password = sha1(Input::get('password'));
        //$status = Input::get('hak_akses');

        $user = DB::table('user')->where('username', '=', $username)->where('password', '=', $password)->first();
        //return $user->status;
        if(!empty($user)) {
    			$id = $user->id;
    			$biodata = DB::table('user')->where('id','=',$id)->first();
          // print_r($biodata->username);die;
    			session(['accmgr' => ['id' => $biodata->id, 'username' => $biodata->username, 'id_org' => $biodata->id_org ]]);

            // print_r($biodata->username);die;
          if($biodata->username == 'admin'){
            Session::set('USER_ROLE', 'admin');
            return redirect('/admin/view');
          }
          else{
            Session::set('USER_ROLE', 'accmgr');
            return redirect('/cari_org');
          }
    			// return redirect('/cari_org');
    		}
		    else {
          // print_r('masuk ke else');die;
        // return view('auth.index');
        return redirect('/login');
        }
	  }

    public function accmgr_do_logout() {
        Session::flush();
        return redirect('/login');
    }



    public function admin_login(){
        if(session('dosen') !== null) {
             return redirect('dosen');
        }
        else {
            return view('auth.login');
        }
    }

    public function admin_do_login(){
        $username = Input::get('username');
		    $password = sha1(Input::get('password'));

        $admin = DB::table('user')->where('username', '=', $username)->where('password', '=', $password)->first();

        if(!empty($admin)) {
            $id = $admin->id;
            $admin = DB::table('user')->where('id', '=', $id)->first();
            session(['admin' => ['id' => $admin->id, 'username' => $admin->username, 'id_org' => $admin->id_org ]]);
            return redirect('/admin_org/view');
        }
        else {
            return redirect('/admin_org/view');
        }

	  }

    public function admin_do_logout() {
        Session::forget('admin');
        return redirect('/login');
    }

}
