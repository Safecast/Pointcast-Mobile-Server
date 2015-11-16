<?php

namespace Fuel\Tasks;

class Aggregation
{
    public function run($captured_before = null, $captured_after = null)
    {
        ini_set('memory_limit', '1024M');
        $targets = array("daily" => 1, "monthly" => 2);

        if ($captured_before != date("Y-m-d", strtotime($captured_before)) ||
                $captured_after != date("Y-m-d", strtotime($captured_after)) )  {
            
            // echo "Please Type EX)  php oil r aggregation 2015-11-01 2015-01-01\n";
            // return;
            // @note デフォルト値で動かす
            $captured_before != date("Y-m-d", strtotime("+1 day"));
            $captured_after != date("Y-m-d", strtotime("-5 day"));
        }

        // 指定期間の計測データを集計する
        foreach ($targets as $target) {
            $m_sensor_mains = \Model_M_Sensor_Main::query()->get();
            foreach ($m_sensor_mains as $key => $m_sensor_main) {
                for ($i = 1;$i <= 9; $i++) {
                    $column = "sensor" . $i . "_device_id";
                    if (isset($m_sensor_main->$column) && $m_sensor_main->$column > 0 ) {
                        if ($target == $targets["monthly"]) {
                            // 月次は今の所集計しない
                            continue;
                        }
                        $this->executeAggregation($m_sensor_main->$column, $captured_before, $captured_after);
                    }
                }
            }
        }
        return;
    }

    public function executeAggregation($device_id, $captured_before, $captured_after)
    {

echo("--------start ${device_id}--------\n");
        $captured_before_timestamp = strtotime($captured_before);
        $captured_after_timestamp = strtotime($captured_after);

        $current_timestamp = $captured_after_timestamp;
        do {
            $target_date = date("Y-m-d", $current_timestamp);
            $sql  = "SELECT max(value) as peak_value, avg(value) as avg_value ";
            $sql .= "FROM l_measurements_history ";
            $sql .= "WHERE device_id = ${device_id} AND captured_at >= '${target_date} 00:00:00' AND captured_at <= '${target_date} 23:59:59'";
            var_dump($target_date);
            $result = \DB::query($sql)->execute()->as_array();
            if (empty($result) || !is_array($result)) {
                // can't executeAggregation
            } else if (empty($result[0]['peak_value']) || empty($result[0]['avg_value'])) {
                // can't executeAggregation
            } else {
                $result = current($result);
                if (empty($result['peak_value']) || empty($result['avg_value']))  {
                    continue;
                }

                // regist or update
                $captured_date = date("Y-m-d 00:00:00", $current_timestamp);
                $l_measurements_history_daily = \Model_L_Measurements_History_Daily::query()
                                                    ->where("captured_date", $captured_date)
                                                    ->where("device_id", $device_id)
                                                    ->get_one();
                if (empty($l_measurements_history_daily)) {
                    $l_measurements_history_daily = \Model_L_Measurements_History_Daily::forge();
                    $l_measurements_history_daily->captured_date = $captured_date;
                    $l_measurements_history_daily->device_id = $device_id;
                }

                $l_measurements_history_daily->average_value = $result['avg_value'];
                $l_measurements_history_daily->peak_value = $result['peak_value'];
                $l_measurements_history_daily->save();

                var_dump($sql);
                var_dump($result);

                }
            // next day
            $current_timestamp += 86400;
        } while ($current_timestamp <= $captured_before_timestamp);
echo("--------end ${device_id}--------\n");


//         $sql = "SELECT * FROM users WHERE";
// $result = DB::query('SELECT * FROM `users`')->execute();


        // strlen($captured_before);
        // var_dump($device_id);
        // var_dump($captured_before);
        // var_dump($captured_after);
        
        
    }
}