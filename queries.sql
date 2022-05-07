INSERT INTO users (created_at, email, name, password)
VALUES
    ('20.03.2018', 'em_konstantin@gmail.com', 'Константин', 'pass_konstantin') ON DUPLICATE KEY UPDATE email='em_konstantin@gmail.com',
    ('07.11.2016', 'em_anna@gmail.com', 'Анна', 'pass_anna');

INSERT INTO projects (name, user_id) 
VALUES 
    ('Входящие', '2'),
    ('Учеба', '2'),
    ('Работа', '1'),
    ('Домашние дела', '1'),
    ('Авто', '1');

INSERT INTO tasks (created_at, name, file, end_date, user_id, project_id)
VALUES 
    ('02.02.2022', 'Собеседование в IT компании', 'file', '25.04.2022', '2', '3'),
    ('02.02.2022', 'Выполнить тестовое задание', 'file', '20.04.2022', '2', '3'),
    ('07.11.2019', 'Сделать задание первого раздела', 'file', '21.12.2019', '1', '2' ),
    ('07.11.2019', 'Встреча с другом', 'file', '22.12.2019', '1', '1' ),
    ('07.11.2019', 'Купить корм для кота', null, null, '1', '4'),
    ('07.11.2019', 'Заказать пиццу', null, null, '1', '4');

SELECT user_id FROM projects WHERE user_id = '1';
SELECT project_id FROM tasks WHERE project_id = '4';



 

 