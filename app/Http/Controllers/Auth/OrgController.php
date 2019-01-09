<?php namespace App\Http\Controllers;

use Input;
use DB;
use RedirectResponse;
use App\Models\Dosen;
use App\Models\Organization;
use Session;
use Redirect;

class OrgController extends Controller {
    public function __construct() {
        if(empty(session('accmgr'))) {
            Redirect::to('accmgr/login')->send();
        }
    }

    // public function index() {
	// 	$data_table = DB::table('dosen')->get();
    //     $dosen = session('penilai');
    //
    //
	// 	return view('main.index', ['table' => $data_table, 'dosen' => $dosen]);
	// }

    public function index() {
        $data_table = DB::table('organization')->get();
        $accmgr= session('accmgr');


        return view('main.index', ['table' => $data_table, 'accmgr' => $accmgr]);
    }


    public function v_org(){
        $id_org = Input::get('id_org');

        $org = DB::table('login')->where('id_org', '=', $id_org)->first();
        $sesacc = session('accmgr');
        $accmgr = DB::table('login')->where('id_org', '=', $sesacc['id_org'])->first();

        $d_org = Organization::all();
        $datax = DB::table('organization')
        ->join('login', 'login.id_org', '=', 'organization.id_org')
        ->get();
        return view('auth.kegiatan_target', ['status_halaman'=>3, 'sesacc'=>$sesacc, 'organization' => $organization,'datax' => $datax,'org' => $org, 'organization' => $organization, 'accmgr' => $accmgr]);
        // return $data_table;
    }
}
