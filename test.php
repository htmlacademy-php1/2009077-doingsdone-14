<?php

$start_date = date('Y-m-d H:i:s');
$end_date = '23.04.2022';

function is_soon_expire($start_date; $end_date){
    $secs_in_hour = 3600;
    $start_time = strtotime($start_date);
    $end_time = strtotime($end_date);
    $ts_diff = $end_time - $start_time;
    $hours_until_end = floor($ts_diff / $secs_in_hour);
        if ($hours_until_end <= 24){
            return true;
            } else {
                return false;   
            }
    return $hours_until_end;
}

$result = is_soon_expire($start_date; $end_date);

if ($result === true) {
    echo 'Задача скоро просрочится'; 
} else {
    echo 'Еще есть время'; 
}
?>