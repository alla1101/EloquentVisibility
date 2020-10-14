<?php

namespace Alla\Visibility\Models;

use Illuminate\Database\Eloquent\Model;

class EloquentVisibility extends Model
{
    protected $table = "eloquent_visibilities";

    protected $fillable = [];

    protected $hidden = [
        'visible_id',
        'visible_type'
    ];

    public function statuses()
    {
        return $this->belongsToMany('Alla\Visibility\Models\Status');
    }
}
