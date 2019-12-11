<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'object_domain', 'object_id', 'description', 'is_completed', 'completed_at', 'updated_by', 'due', 'urgency'
    ];
    
    public function items()
    {
        return $this->hasMany('App\Item', 'task_id', 'id');
    }

    public function checklists()
    {
        return $this->hasOne('App\Checklist', 'task_id', 'id');
    }
}
