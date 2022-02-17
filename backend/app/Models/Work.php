<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 *
 * @property $id
 * @property $composer_id
 * @property $name
 * @property $duration
 * @property $orchestration_work
 * @property $string_work
 * @property $note
 * @property $created_at
 * @property $updated_at
 *
 * @property Composer $composer
 * @property Playlist[] $playlists
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Work extends Model
{
    
    static $rules = [
		'composer_id' => 'required',
		'name' => 'required',
		'duration' => 'required',
		'orchestration_work' => 'required',
		'string_work' => 'required',
		'note' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['composer_id','name','duration','orchestration_work','string_work','note'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function composer()
    {
        return $this->hasOne('App\Models\Composer', 'id', 'composer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playlists()
    {
        return $this->hasMany('App\Models\Playlist', 'work_id', 'id');
    }
    

}
