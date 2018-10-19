<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Notification
 * 
 * @property int $idNotif
 * @property string $description
 * @property bool $status
 * @property int $receiverId
 * @property int $senderId
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Notification extends Eloquent
{
	protected $table = 'Notification';
	protected $primaryKey = 'idNotif';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'receiverId' => 'int',
		'senderId' => 'int'
	];

	protected $fillable = [
		'description',
		'status',
		'receiverId',
		'senderId'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'senderId');
	}
}
