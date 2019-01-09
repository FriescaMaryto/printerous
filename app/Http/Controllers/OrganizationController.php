<?php namespace App\Http\Controllers;

use Input;
use DB;
use RedirectResponse;
use Session;
use Redirect;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Organization;
use App\Models\Person;


class OrganizationController extends Controller {

	public function __construct() {
		if(empty(session('accmgr'))){
			Redirect::to('login')->send();;
		}
	}

	    //Pencarian data Organization untuk menuju ke halaman kriteria
    public function getNameOrganization()
    {
        $input = Input::get('cari_org');
        $name = \App\Models\Organization::where('name_org', 'LIKE', '%'.$input.'%')->get();
        $sesinfo = session('accmgr');

        $organization = DB::table('organization')->join('person', 'person.id_org', '=', 'organization.id_org')->get();


        $data_org = DB::table('organization')->get();

        $data_cari = DB::table('organization')->get();
        return view('auth.search_org', ['sesinfo' => $sesinfo, 'status_halaman'=>1, 'name' => $name, 'table' => $data_cari, 'organization' => $organization, 'data_org' => $data_org]);
    }

	public function option_nama(){
		return DB::table('organization')->where('name_org', 'LIKE', '%'.Input::get('cari_pegawai').'%')->get();

	}

	public function profile(){
        $sesinfo = session('accmgr');
        $organization = DB::table('organization')->where('id_org', '=', $sesinfo['id_org'])->first();

        $logins= DB::table('user')->where('id_org', '=', $sesinfo['id_org'])->first();
// print_r($organization);die;
				$profile = ['organization' => $organization, 'status_halaman'=>2, 'sesinfo'=>$sesinfo, 'logins'=>$logins];
        return view('auth.profil',$profile);
		//print_r($organization);
		//die;
    }

	public function update_profile() {
		$sesinfo = session('accmgr');

		$id_org = Input::get('id_org');
		$name_org = Input::get('name_org');
		$phone_org = Input::get('phone_org');
		$email_org = Input::get('email_org');
		$web_org = Input::get('web_org');
		$logo_org = Input::get('logo_org');

		$username = Input::get('username');
		$password = Input::get('password');


		$data= DB::table('organization')->where('id_org', '=', $sesinfo['id_org'])->update(['name_org' => $name_org, 'phone_org' => $phone_org, 'email_org' => $email_org, 'web_org' => $web_org, 'logo_org' => $logo_org]);
		$logins= DB::table('user')->where('id_org', '=', $sesinfo['id_org'])->update(['username' => $username, 'password' => $password]);

		return redirect('/profile' , ['data' => $data, 'logins' => $logins, 'sesinfo' => $sesinfo]);
	}

	public function view_update_profile() {
		$sesinfo = session('accmgr');

		$data_update = DB::table('organization')->where('id_org', '=',$sesinfo['id_org'])->get();
		$login_update = DB::table('user')->where('id_org', '=', $sesinfo['id_org'])->get();
		return view('auth.update_org', ['data' => $data_update, 'sesinfo' => $sesinfo]);
	}

	public function profile_modal_update() {
		$sesinfo = session('accmgr');
		$id_org = $sesinfo['id_org'];
		$data = DB::table('organization')->where('organization.id_org', $id_org)
		  ->select('organization.id_org', 'organization.name_org', 'organization.phone_org', 'organization.email_org', 'organization.web_org', 'organization.logo_org')
		  ->get();

		return view('auth.modals.profile', ['data' => $data]);

	}

	// public function profile_update() {
	//   $sesinfo = session('accmgr');
    //
	//   $id_org = Input::get('id_org_update');
	//   $name_org = Input::get('name_org_update');
	//   $phone_org = Input::get('phone_org_update');
	//   $email_org = Input::get('phone_org_update');
	//   $web_org = Input::get('web_org_update');
	//   $logo_org = Input::get('logo_org_update');
	// 	$username = Input::get('username');
	// 	$password = Input::get('password');
	// 	  DB::table('organization')->where('id_org', '=', $id_org)
	// 	  ->update(['name_org' => $name_org, 'phone_org' => $phone_org, 'email_org' => $email_org, 'web_org' => $web_org, 'logo_org' => $logo_org]);
    //
	// 	  $organization = DB::table('organization')->where('id_org', '=',$sesinfo['id_org'])->get();
    //
	// 	  $logins= DB::table('user')->where('id_org', '=',$sesinfo['id_org'])->first();
    //
    //
	// 	  return view('auth.profil', ['status_halaman'=>2, 'sesinfo'=>$sesinfo, 'organization' => $organization, 'logins'=>$logins]);
    //
	// }

	public function profile_update(Request $request)
	{
		// $sesinfo = session('accmgr');
		$organization_p = organization::where("id_org",$request['id_org'])->first();
	  $destination = 'img';

	  if(!Storage::exists($destination)){
		Storage::makeDirectory($destination);
	  }

	  if($request->hasFile('logo_org_update')) {
		$file = $request->file('logo_org_update');
		$extension = $file->getClientOriginalExtension();
		$file_name =  date('Ymd') .'_'. $request['name_org_update'] . '.' . $extension;
		$file->move($destination, $file_name );
		$organization_p->logo_org = $file_name;
	  }
	  //print_r($request['id_org']);die;
			$organization_p->name_org = $request->name_org_update;
			$organization_p->phone_org = $request->phone_org_update;
			$organization_p->email_org = $request->email_org_update;
			$organization_p->web_org = $request->web_org_update;
	  $organization_p->save();
	  // $organization = DB::table('organization')->where('id_org', '=', $sesinfo['id_org'])->first();

	  // return view('auth.profil');
	  return redirect('/profile');

	}

	public function password_update() {
	  $sesinfo = session('accmgr');

		$username = Input::get('username');
		$pwd = sha1(Input::get('password'));

		$organization = DB::table('organization')->where('id_org', '=', $sesinfo['id_org'])->first();

		$login= DB::table('user')->where('id_org', '=', $sesinfo['id_org'])->first();


	   DB::table('login')->where('id_org', '=', $sesinfo['id_org'])
	  ->update(['username' => $username, 'password' => $pwd]);

	  return view('auth.profil' , [ 'sesinfo' => $sesinfo, 'organization'=>$organization, 'user'=>$login, 'status_halaman'=>2]);
	}

	public function password_modal_update() {
		$sesinfo = session('accmgr');
		$id_org = $sesinfo['id_org'];
		$data = DB::table('user')->where('id_org', $id_org)
		  ->select('login.nip','login.username', 'login.pwd')
		  ->get();
		return view('auth.modals.password', ['data' => $data]);

	}


}//class
