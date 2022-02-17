<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Director
 *
 * @property $id
 * @property $name
 * @property $titleDirector
 * @property $created_at
 * @property $updated_at
 *
 * @property DirectorProject[] $directorProjects
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Director extends Model
{
    
    static $rules = [
		'name' => 'required',
		'titleDirector' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','titleDirector'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directorProjects()
    {
        return $this->hasMany('App\Models\DirectorProject', 'director_id', 'id');
    }
    

}
