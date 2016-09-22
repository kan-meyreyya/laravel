<?php
namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
	use AuthenticableTrait;

	protected $table = 'users';
	public $timestamps = false;

    protected $fillable = [
    	'username', 'password', 'email', 'role', 'status', 'created_at'
	];

	protected $hidden = [
	    'password', 'remember_token',
	];
}
