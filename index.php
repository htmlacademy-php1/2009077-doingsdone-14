<?php
require_once('helpers.php');

$show_complete_tasks = rand(0, 1);

$projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"]; 
$tasks = [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '01.12.2019',
        'project' => 'Работа',
        'done' => false 
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
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

$page_content = include_template('main.php', ['projects' => $projects], ['tasks' => $tasks]);
$layout_content = include_template('layout.php', [
	'content' => $page_content,
	'name' => 'name',
	'title' => 'Дела в порядке'
]);

print($layout_content);
?>