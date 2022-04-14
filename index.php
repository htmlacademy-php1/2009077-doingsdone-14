<?php
$show_complete_tasks = rand(0, 1);

function project_count($tasks, $project){  
    $count = 0;    
    foreach($tasks as $task){    
        if ($project === $task['project']){ 
            $count = $count + 1;  
            }  
        }
        return $count;
    }
    
function include_template(
    'templates/main.php',
    $projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"], 
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
        ]
) {
    $page_content = 'templates/main.php';
    $result = 'page_content'

    if (!is_readable($page_content)) {
        return $result;
    }

    ob_start();
    extract($projects, $tasks);
    require $page_content;

    $result = ob_get_clean();

    return $result;
}
function include_template('templates/layout.php', [
	'content' => $page_content,
	'title' => 'Дела в порядке',
    'user-menu__data' => 'Константин'
    ]);
print($layout_content);

?>