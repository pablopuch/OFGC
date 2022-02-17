<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DirectorProject
 *
 * @property $id
 * @property $project_id
 * @property $director_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Director $director
 * @property Project $project
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DirectorProject extends Model
{
    
    static $rules = [
		'project_id' => 'required',
		'director_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','director_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function director()
    {
        return $this->hasOne('App\Models\Director', 'id', 'director_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
    

}
