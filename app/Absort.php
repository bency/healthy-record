<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absort extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'attribute_id',
        'value',
        'absort',
        'modified_at',
    ];
    protected $dateFormat = 'U';
    protected $hidden = ['deleted_at'];
    protected $dates = ['deleted_at'];
}
