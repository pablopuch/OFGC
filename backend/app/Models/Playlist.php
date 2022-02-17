<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Playlist
 *
 * @property $id
 * @property $project_id
 * @property $composer_id
 * @property $work_id
 * @property $orchestration_total
 * @property $order
 * @property $created_at
 * @property $updated_at
 *
 * @property Composer $composer
 * @property Project $project
 * @property Work $work
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Playlist extends Model
{
    
    static $rules = [
		'project_id' => 'required',
		'composer_id' => 'required',
		'work_id' => 'required',
		'orchestration_total' => 'required',
		'order' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','composer_id','work_id','orchestration_total','order'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function composer()
    {
        return $this->hasOne('App\Models\Composer', 'id', 'composer_id');
    }
    
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
    public function work()
    {
        return $this->hasOne('App\Models\Work', 'id', 'work_id');
    }
    

}
