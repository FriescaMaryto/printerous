<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Person extends Model {

	/**
	 * The attributes included in the model's JSON form.
	 *
	 * @var array
	 */
	protected $table = 'person';
	protected $fillable = array('name_p', 'email_p', 'phone_p', 'avatar_p', 'id_org');

}
?>
