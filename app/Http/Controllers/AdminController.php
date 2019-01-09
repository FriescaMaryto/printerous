<?php namespace App\Http\Controllers;

use Input;
use DB;
use RedirectResponse;
use Session;
use Redirect;
use Storage;
//use Request;
use Illuminate\Http\Request;

use App\Models\Organization;

class AdminController extends Controller {

	// public function __construct() {
  //       if(empty(session('admin'))) {
  //           Redirect::to('login')->send();
  //       }
	//
  // }
	// public function __construct()
  //   {
  //       $this->middleware('auth');
  //   }

  /*Person
	*/
	public function person(){
		$sesinfo = session('admin');
		$pic = DB::table('person')->where('id_org', '=', $sesinfo['id_org'])->first();

		$v_pic = DB::table('organization')
		->join('person', 'person.id_org', '=', 'organization.id_org')
		->get();

		//return $penilai;
		return view('auth.person',['status_halaman'=>2, 'sesinfo'=>$sesinfo, 'pic' => $pic, 'v_pic' => $v_pic]);
	}


		//View organization form
		public function vieworganization() {
			$sesinfo=session('admin');
			$id_org= Input::get('id_org');
			$data_table = DB::table('organization')->get();

			return view('admin_org.index', ['sesinfo'=>$sesinfo ,'table' => $data_table, 'status_halaman'=>1]);
		}

		public function addorganization(Request $request){

		      $destination = 'img';

		      if(!Storage::exists($destination)){
		        Storage::makeDirectory($destination);
		      }

		      $NewData = new Organization;
		      if($request->hasFile('logo_org')) {
		        $file = $request->file('logo_org');
		        $extension = $file->getClientOriginalExtension();
		        $file_name =  date('Ymd', strtotime(date('Y-m-d H:i:s'))) .''. date('Hi', strtotime(date('Y-m-d H:i:s'))) .''. $request['logo_org'] . '.' . $extension;

						$file->move($destination, $file_name );
				        $NewData->logo_org = $file_name;
				      }
		        $NewData->name_org = $request->name_org;
		        $NewData->phone_org = $request->phone_org;
		        $NewData->email_org = $request->email_org;
		        $NewData->web_org = $request->web_org;
		        $NewData->save();

		    return redirect('/admin/profile');
		  }

		public function profile() {
		    $sesinfo=Session('admin');
		    $id_org= Input::get('id_org');
		    $data_table = DB::table('organization')->get();

		    return view('admin_org.index', ['sesinfo'=>$sesinfo,'table' => $data_table, 'status_halaman'=>5]);
		}

		public function profile_modal_update() {
		    $id_org = Input::get('id_org');
		    $data = DB::table('organization')->where('id_org', $id_org)->select('id_org', 'name_org', 'phone_org', 'email_org', 'web_org', 'logo_org')->first();
		    return view('admin.modals.profile', ['data' => $data]);
		}

		public function update(Request $request)
    {
			// print_r($request['editname_org']);die;
      $organization = Organization::where("id_org",$request['id_org'])->first();
      $destination = 'img';

      if(!Storage::exists($destination)){
        Storage::makeDirectory($destination);
      }

      if($request->hasFile('editlogo_org')) {
        $file = $request->file('editlogo_org');
        $extension = $file->getClientOriginalExtension();
        $file_name =  date('Ymd') .'_'. $request['editname_org'] . '.' . $extension;
        $file->move($destination, $file_name );
        $organization->logo_org = $file_name;
      }

			$organization->name_org = $request->editname_org;
			$organization->phone_org = $request->editphone_org;
			$organization->email_org = $request->editemail_org;
			$organization->web_org = $request->editweb_org;
      $organization->save();

      return redirect('admin/profile');

  }


  public function view_update() {
    $id_org = Input::get('id_org');
    $data_update = DB::table('organization')->where('id_org', '=', $id_org)->first();

    return view('admin.update', ['data' => $data_update, 'data_update'=>$data_update]);
  }

  public function delete() {
    $id_org = Input::get('id_org');
    DB::table('organization')->where('id_org', '=', $id_org)->delete();

    return redirect('admin/profile');
  }

}
