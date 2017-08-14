<?php

namespace App;

class Staff extends User
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
        'gender',
        'city',
        'job',
        'position',
        'email',
        'duty',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
