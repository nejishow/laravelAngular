<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $idU
 * @property string $firstName
 * @property string $lastName
 * @property int $idRole
 * @property string $email
 * @property string $password
 * @property string $address
 * @property int $telNumber
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAr
 * @property bool $enabled
 * 
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $bills
 * @property \Illuminate\Database\Eloquent\Collection $historics
 * @property \Illuminate\Database\Eloquent\Collection $notifications
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'User';
	protected $primaryKey = 'idU';
	public $timestamps = false;

	protected $casts = [
		'idRole' => 'int',
		'telNumber' => 'int',
		'enabled' => 'bool'
	];

	protected $dates = [
		'createdAt',
		'updatedAr'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'firstName',
		'lastName',
		'idRole',
		'email',
		'password',
		'address',
		'telNumber',
		'createdAt',
		'updatedAr',
		'enabled'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'idRole');
	}

	public function bills()
	{
		return $this->hasMany(\App\Models\Bill::class, 'verifiedBy');
	}

	public function historics()
	{
		return $this->hasMany(\App\Models\Historic::class, 'idU');
	}

	public function notifications()
	{
		return $this->hasMany(\App\Models\Notification::class, 'senderId');
	}
}
