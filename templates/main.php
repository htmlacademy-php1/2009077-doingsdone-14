        <section class="content__side">
            <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    
                    <ul class="main-navigation__list">
                        <?php foreach ($projects as $project): ?>
                        <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link" href="index.php?project_id= <?= $project['id']; ?>"><?= htmlspecialchars($project['name']); ?></a>
                            <span class="main-navigation__list-item-count"><?= $project['task_count']; ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
        </section>

            <main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <?php if ($show_complete_tasks === 1): ?>
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox" checked>
                        <?php endif; ?>
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">
                    <?php foreach ($tasks as $task): ?>
                        <?php if ((bool)$task['done'] === false || $show_complete_tasks === 1): ?> 
                            <tr class="tasks__item task <?= $task['done'] === true ? 'task--completed' : '' ?> <?= is_soon_expire(date('d-m-Y H:i:s'), $task['end_date']); var_dump($tasks['end_date']); exit(); ? 'task--important' : '' ?>">
                    
                                <td class="task__select">
                                    <label class="checkbox task__checkbox">
                                        <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1" <?= $task['done'] === true ? 'checked' : '' ?>>
                                        <span class="checkbox__text"><?= htmlspecialchars($task['name']); ?></span>
                                    </label>
                                </td>

                                <td class="task__file">
                                    <a class="download-link" href="#"></a>
                                </td>

                                <td class="task__date"><?= htmlspecialchars($task['end_date']); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </main>
    </div>