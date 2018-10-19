<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 15:49:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BillSetting
 * 
 * @property int $idBillS
 * @property string $type
 * @property int $pricePerKw
 * @property int $tax
 * @property int $discount
 * @property string $processing
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * @property string $description
 *
 * @package App\Models
 */
class BillSetting extends Eloquent
{
	protected $table = 'BillSetting';
	protected $primaryKey = 'idBillS';
	public $timestamps = false;

	protected $casts = [
		'pricePerKw' => 'int',
		'tax' => 'int',
		'discount' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'type',
		'pricePerKw',
		'tax',
		'discount',
		'processing',
		'createdAt',
		'updatedAt',
		'description'
	];
}
