<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeShedule
 *
 * @property $id
 * @property $name
 * @property $hour_range_type
 * @property $created_at
 * @property $updated_at
 *
 * @property Shedule[] $shedules
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeShedule extends Model
{
    
    static $rules = [
		'name' => 'required',
		'hour_range_type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','hour_range_type'];


   /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shedules()
    {
        return $this->hasMany('App\Shedule');
    }
    

}
