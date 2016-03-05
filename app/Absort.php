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

    public static $record_map = [
        'water' => 1,
        'food'  => 2,
        'piss'  => 101,
        'pupu'  => 102,
    ];

    public static $record_text = [
        'water' => '喝水',
        'food'  => '吃東西',
        'piss'  => '小號',
        'pupu'  => '大號',
    ];

    public static $unit = [
        'water' => '公克',
        'food'  => '公克',
        'piss'  => '公克',
        'pupu'  => '次',
    ];
}
