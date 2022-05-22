<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('helpers.php');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$con = mysqli_connect("127.0.0.1", "root", '', "doingsdone");
mysqli_set_charset($con, "utf8");
if ($con === false) {
    print("Ошибка подключения: " . mysqli_connect_error());
} 
else {
    $sql = 'SELECT id, name FROM projects WHERE user_id = 1'; 
    $result = mysqli_query($con, $sql);
        if ($result) {
            $projects = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        } 
} 
    
$project_id = filter_input(INPUT_GET, 'project_id');
if (empty($project_id)) {
    $sql = 'SELECT * FROM tasks';
    $result = mysqli_query($con, $sql);
    $tasks = mysqli_fetch_all ($result, MYSQLI_ASSOC);
} else {
    $sql = 'SELECT * FROM tasks WHERE project_id =' . $project_id;
    $result = mysqli_query($con, $sql);
    $tasks = mysqli_fetch_all ($result, MYSQLI_ASSOC);   
} 

$show_complete_tasks = rand(0, 1);
$page_content = include_template('main.php', [
    'show_complete_tasks' => $show_complete_tasks,
    'projects' => $projects,
    'tasks' => $tasks
]);

function project_count($tasks, $project){  
    $count = 0;    
    foreach($tasks as $task){    
        if ($project['id'] === $task['project_id']){ 
            $count = $count + 1;  
        }  
    }
        return $count;
}

function is_soon_expire($end_date, $start_date){
    if ($end_date === null) {
        return false;
    }
    $secs_in_hour = 3600;
    $start_time = strtotime($end_date);
    $end_time = strtotime($start_date);
    $ts_diff = $end_time - $start_time;
    $hours_until_end = floor($ts_diff / $secs_in_hour);
    return $hours_until_end <= 24;
}

$layout_content = include_template('layout.php', [
	'content' => $page_content,
	'username' => 'Константин',
	'title' => 'Дела в порядке'
]);

print($layout_content);
?>