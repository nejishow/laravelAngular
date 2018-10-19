<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $idRole
 * @property string $description
 * @property bool $enabled
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $table = 'Role';
	protected $primaryKey = 'idRole';
	public $timestamps = false;

	protected $casts = [
		'enabled' => 'bool'
	];

	protected $fillable = [
		'description',
		'enabled'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'idRole');
	}
}
