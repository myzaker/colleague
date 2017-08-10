<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    protected $appends = ['groups'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function getGroupsAttribute()
    {
        return $this->groups()->get();
    }
}
