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

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}
