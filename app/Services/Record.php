<?php
namespace App\Services;

use \Exception;
use App\Absort;

class Record
{
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
        $attribute_id = Absort::$record_map[$type];
        return self::add([
            'value' => $value,
            'absort' => $absort,
            'attribute_id' => $attribute_id,
        ]);
    }

    public static function getTodayRecordsByType($type)
    {
        if (!in_array($type, self::$accept_types)) {
            throw new Exception('無此類型的紀錄');
        }
        $attribute_id = Absort::$record_map[$type];
        $sum = Absort::where('attribute_id', $attribute_id)
            ->where('created_at', '>', strtotime('today'))
            ->where('created_at', '<=', strtotime('tomorrow'))
            ->sum('value');
        return ['type_name' => Absort::$record_text[$type], 'sum' => intval($sum), 'unit' => Absort::$unit[$type]];
    }

    public static function getSummaryByDay($day = 'today')
    {
        $start_at = strtotime($day . " midnight");
        $end_at = $start_at + 86400;
        $positive_sum = Absort::where('attribute_id', '<', 100)
            ->where('created_at', '>', $start_at)
            ->where('created_at', '<', $end_at)
            ->sum('value');
        $negetive_sum = Absort::where('attribute_id', 101)
            ->where('created_at', '>', $start_at)
            ->where('created_at', '<', $end_at)
            ->sum('value');
        return $positive_sum - $negetive_sum;
    }

    public static function getTodayRecords()
    {
        return Absort::where('created_at', '>', strtotime('today'))
            ->where('created_at', '<=', strtotime('tomorrow'))
            ->get();
    }

    private static function add(array $data)
    {
        return Absort::create($data);
    }
}
