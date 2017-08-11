<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id',
        'group_id',
        'name',
        'title',
        'email',
        'duty',
    ];

    protected $appends = ['group_name'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function getGroupNameAttribute()
    {
        return $this->group ? $this->group->name : null;
    }
}
