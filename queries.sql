INSERT INTO users SET created_at = '20.03.2018', email = 'email_konstantin@gmail.com', name = 'Константин', password = 'pass_konstantin';
INSERT INTO users SET created_at = '07.11.2016', email = 'email_anna@gmail.com', name = 'Анна', password = 'pass_anna';

INSERT INTO projects (name, user_id) VALUES ('Входящие', '2');
INSERT INTO projects (name, user_id) VALUES ('Учеба', '2');
INSERT INTO projects (name, user_id) VALUES ('Работа', '1');
INSERT INTO projects (name, user_id) VALUES ('Домашние дела', '1');
INSERT INTO projects (name, user_id) VALUES ('Авто', '1');

INSERT INTO tasks (created_at, name, file, end_date, user_id, project_id)
VALUES 
    ('02.02.2022', 'Собеседование в IT компании', 'file', '25.04.2022', '2', '3'),
    ('02.02.2022', 'Выполнить тестовое задание', 'file', '20.04.2022', '2', '3'),
    ('07.11.2019', 'Сделать задание первого раздела', 'file', '21.12.2019', '1', '2' ),
    ('07.11.2019', 'Встреча с другом', 'file', '22.12.2019', '1', '1' ),
    ('07.11.2019', 'Купить корм для кота', null, null, '4', '1' ),
    ('07.11.2019', 'Заказать пиццу', null, null, '4', '1' );



 

 