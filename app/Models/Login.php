<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

use Illuminate\Auth\Reminders\RemindableInterface;
use UserInterface;
use Eloquent;
use Authenticable;

class Login extends Model implements Authenticable {

	/**
	* The attributes included in the model's JSON form.
	*
	* @var array
	*/

	protected $table = 'user';
	protected $fillable = array('username', 'password');

	protected $hidden = array('password');
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
{
    return $this->getKey();
}

/**
 * Get the password for the user.
 *
 * @return string
 */
public function getAuthPassword()
{
    return $this->password;
}

/**
 * Get the e-mail address where password reminders are sent.
 *
 * @return string
 */
public function getReminderNip()
{
    return $this->nuo;
}


}

?>
