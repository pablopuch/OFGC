<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 *
 * @property $id
 * @property $name
 * @property $acronym
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Room extends Model
{
    
    static $rules = [
		'name' => 'required',
		'acronym' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','acronym'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shedules()
    {
        return $this->hasMany('App\Shedule');
    }



}
