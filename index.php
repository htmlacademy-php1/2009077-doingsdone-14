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
} else {
    $sql = "SELECT p.name, t.name  FROM projects p, tasks t WHERE id = 2";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($result);
} 

$show_complete_tasks = rand(0, 1);

$projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"]; 
$tasks = [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '25.04.2022',
        'project' => 'Работа',
        'done' => false 
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '20.04.2022',
        'project' => 'Работа',
        'done' => false  
    ],
    [
        'name' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'project' => 'Учеба',
        'done' => true      
    ],
    [
        'name' => 'Встреча с другом',
        'date' => '22.12.2019',
        'project' => 'Входящие',
        'done' => false  
    ],
    [
        'name' => 'Купить корм для кота',
        'date' => null,
        'project' => 'Домашние дела',
        'done' => false
    ],
    [
        'name' => 'Заказать пиццу',
        'date' => null,
        'project' => 'Домашние дела',
        'done' => false
    ]
];

function project_count($tasks, $project){  
    $count = 0;    
    foreach($tasks as $task){    
        if ($project === $task['project']){ 
            $count = $count + 1;  
        }  
    }
        return $count;
}

function is_soon_expire($start_date, $end_date){
    if ($end_date === null) {
        return false;
    }
    $secs_in_hour = 3600;
    $start_time = strtotime($start_date);
    $end_time = strtotime($end_date);
    $ts_diff = $end_time - $start_time;
    $hours_until_end = floor($ts_diff / $secs_in_hour);
    return $hours_until_end <= 24;
}

$page_content = include_template('main.php', [
    'show_complete_tasks' => $show_complete_tasks,
    'projects' => $projects,
    'tasks' => $tasks,
]);

$layout_content = include_template('layout.php', [
	'content' => $page_content,
	'username' => 'Константин',
	'title' => 'Дела в порядке'
]);

print($layout_content);
?>