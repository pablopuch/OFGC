<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Season
 *
 * @property $id
 * @property $name
 * @property $starDate
 * @property $endDate
 * @property $noteSeason
 * @property $created_at
 * @property $updated_at
 *
 * @property Project[] $projects
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Season extends Model
{
    
    static $rules = [
		'name' => 'required',
		'starDate' => 'required',
		'endDate' => 'required',
		'noteSeason' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','starDate','endDate','noteSeason'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'season_id', 'id');
    }
    

}
