<?php

namespace Alla\Visibility\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "statuses";

    protected $fillable = [
        "str_key"
    ];
}
