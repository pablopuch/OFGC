<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shedule
 *
 * @property $id
 * @property $project_id
 * @property $type_id
 * @property $room_id
 * @property $date
 * @property $hour_range
 * @property $note
 * @property $created_at
 * @property $updated_at
 *
 * @property Project $project
 * @property Room $room
 * @property TypeShedule $typeShedule
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Shedule extends Model
{
    
    static $rules = [
		'project_id' => 'required',
		'type_id' => 'required',
		'room_id' => 'required',
		'date' => 'required',
		'hour_range' => 'required',
		'note' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['project_id','type_id','room_id','date','hour_range','note'];


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
    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeShedule()
    {
        return $this->hasOne('App\Models\TypeShedule', 'id', 'type_id');
    }
    

}
