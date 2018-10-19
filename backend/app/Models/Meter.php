<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Meter
 * 
 * @property int $idMeter
 * @property int $typeMeter
 * @property int $brandMeter
 * @property string $longitude
 * @property string $latitude
 * @property string $address
 * @property boolean $qrCode
 * @property \Carbon\Carbon $createdAt
 * 
 * @property \Illuminate\Database\Eloquent\Collection $bills
 * @property \Illuminate\Database\Eloquent\Collection $historics
 *
 * @package App\Models
 */
class Meter extends Eloquent
{
	protected $table = 'Meter';
	protected $primaryKey = 'idMeter';
	public $timestamps = false;

	protected $casts = [
		'typeMeter' => 'int',
		'brandMeter' => 'int',
		'qrCode' => 'boolean'
	];

	protected $dates = [
		'createdAt'
	];

	protected $fillable = [
		'typeMeter',
		'brandMeter',
		'longitude',
		'latitude',
		'address',
		'qrCode',
		'createdAt'
	];

	public function bills()
	{
		return $this->hasMany(\App\Models\Bill::class, 'idMeter');
	}

	public function historics()
	{
		return $this->hasMany(\App\Models\Historic::class, 'idMeter');
	}
}
