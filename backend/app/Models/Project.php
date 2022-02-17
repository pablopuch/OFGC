<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property $id
 * @property $season_id
 * @property $name
 * @property $starDate
 * @property $endDate
 * @property $published
 * @property $created_at
 * @property $updated_at
 *
 * @property Season $season
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Project extends Model
{
    
    static $rules = [
		'season_id' => 'required',
		'name' => 'required',
		'starDate' => 'required',
		'endDate' => 'required',
		'published' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['season_id','name','starDate','endDate','published'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function season()
    {
        return $this->hasOne('App\Models\Season', 'id', 'season_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shedules()
    {
        return $this->hasMany('App\Shedule');
    }
    
}
