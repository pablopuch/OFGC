<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ControlVersion
 *
 * @property $id
 * @property $project_id
 * @property $starDate
 * @property $upgradeDate
 * @property $published
 * @property $created_at
 * @property $updated_at
 *
 * @property Project $project
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ControlVersion extends Model
{
    
    static $rules = [
		'project_id' => 'required',
		'starDate' => 'required',
		'upgradeDate' => 'required',
		'published' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','starDate','upgradeDate','published'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
    

}
