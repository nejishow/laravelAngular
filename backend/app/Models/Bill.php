<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Bill
 * 
 * @property int $idBill
 * @property int $idU
 * @property int $idMeter
 * @property int $lastMonthReading
 * @property int $currentMonthReading
 * @property boolean $billFile
 * @property \Carbon\Carbon $deadline
 * @property int $amount
 * @property int $verifiedBy
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * @property int $idBillSetting
 * @property bool $paid
 * @property boolean $image
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Meter $meter
 *
 * @package App\Models
 */
class Bill extends Eloquent
{
	protected $primaryKey = 'idBill';
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idMeter' => 'int',
		'lastMonthReading' => 'int',
		'currentMonthReading' => 'int',
		'billFile' => 'boolean',
		'amount' => 'int',
		'verifiedBy' => 'int',
		'idBillSetting' => 'int',
		'paid' => 'bool',
		'image' => 'boolean'
	];

	protected $dates = [
		'deadline',
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'idU',
		'idMeter',
		'lastMonthReading',
		'currentMonthReading',
		'billFile',
		'deadline',
		'amount',
		'verifiedBy',
		'createdAt',
		'updatedAt',
		'idBillSetting',
		'paid',
		'image'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'verifiedBy');
	}

	public function meter()
	{
		return $this->belongsTo(\App\Models\Meter::class, 'idMeter');
	}
}
