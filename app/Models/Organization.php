<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Organization extends Model {

	/**
	 * The attributes included in the model's JSON form.
	 *
	 * @var array
	 */
	protected $table = 'organization';
	protected $fillable = array('name_org', 'phone_org', 'email_org', 'web_org', 'logo_org', 'id_org');
	public $timestamps = false;
	protected $primaryKey = 'id_org';

}
?>
