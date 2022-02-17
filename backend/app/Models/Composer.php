<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Composer
 *
 * @property $id
 * @property $name
 * @property $surname
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Composer extends Model
{
    
    static $rules = [
		'name' => 'required',
		'surname' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','surname'];



}
