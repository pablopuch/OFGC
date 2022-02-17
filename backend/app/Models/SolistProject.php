<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SolistProject
 *
 * @property $id
 * @property $project_id
 * @property $soloists_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Project $project
 * @property Soloist $soloist
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SolistProject extends Model
{
    
    static $rules = [
		'project_id' => 'required',
		'soloists_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','soloists_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function soloist()
    {
        return $this->hasOne('App\Models\Soloist', 'id', 'soloists_id');
    }
    

}
