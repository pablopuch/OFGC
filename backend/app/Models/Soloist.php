<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Soloist
 *
 * @property $id
 * @property $name
 * @property $titleSoloist
 * @property $created_at
 * @property $updated_at
 *
 * @property SolistProject[] $solistProjects
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Soloist extends Model
{
    
    static $rules = [
		'name' => 'required',
		'titleSoloist' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','titleSoloist'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solistProjects()
    {
        return $this->hasMany('App\Models\SolistProject', 'soloists_id', 'id');
    }
    

}
