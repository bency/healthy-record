<?php
namespace App\Services;

use \Exception;
use App\Absort;

class Record
{
    public static $record_map = [
        'water' => 1,
        'food'  => 2,
        'piss'  => 101,
        'pupu'  => 102,
    ];

    public static $accept_types = [
        'water',
        'food',
        'piss',
        'pupu',
    ];

    public static function addRecord(array $data)
    {
        $absort_list = ['water', 'food'];
        $type = $data['type'];
        if (!in_array($type, self::$accept_types)) {
            throw new Exception('無此類型的紀錄');
        }

        // 0 為排出, 1 為吸收
        $absort = 0;
        if (in_array($type, $absort_list)) {
            $absort = 1;
        }
        $value = $data['value'];
        $attribute_id = self::$record_map[$type];
        return self::add([
            'value' => $value,
            'absort' => $absort,
            'attribute_id' => $attribute_id,
        ]);
    }

    private static function add(array $data)
    {
        return Absort::create($data);
    }
}
