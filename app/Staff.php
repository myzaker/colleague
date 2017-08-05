<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id',
        'name',
        'title',
        'email',
        'phone',
        'duty',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
