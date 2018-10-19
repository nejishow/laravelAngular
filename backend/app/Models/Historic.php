<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Historic
 * 
 * @property int $idHistoric
 * @property int $idU
 * @property int $idMeter
 * @property \Carbon\Carbon $startDate
 * @property \Carbon\Carbon $endDate
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Meter $meter
 *
 * @package App\Models
 */
class Historic extends Eloquent
{
	protected $table = 'Historic';
	protected $primaryKey = 'idHistoric';
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idMeter' => 'int'
	];

	protected $dates = [
		'startDate',
		'endDate'
	];

	protected $fillable = [
		'idU',
		'idMeter',
		'startDate',
		'endDate'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'idU');
	}

	public function meter()
	{
		return $this->belongsTo(\App\Models\Meter::class, 'idMeter');
	}
}
