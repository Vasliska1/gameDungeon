# Тестовое задание в ВК: 


## How to run

1) docker-compose up
2) localhost:8080/testVkontakte/server/create_table.php
3) https://localhost:8080/ (https://localhost:8080/testVkontakte/client/views/start.php) 

### PHP Framework:
Vanila PHP

### Описание проекта
/server - серверная часть проекта
/client - клиентская
/common - общие файлы(классы-модели)

### API:
NonREST RCP OVER HTTP

## Описание запросов

/api.php?action=get_room
BODY id_room,id_session 
Возвращает комнату

/api.php?action=get_state
BODY d_room,id_session
Возвращает состояние комнаты

/api.php?action=create_session
BODY name_player
Создает и возвращает id сессии

/api.php?action=enter_room
BODY id_room,id_session
Меняет состояние комнаты 

/api.php?action=attack_monster
BODY id_room,id_session
Иммитирует "бой", добавлавляет очки, обновляет состояние комнаты, возвращает монстра

/api.php?action=open_chest
BODY id_room,id_session
Добавлавляет очки, обновляет состояние комнаты, возвращает сундук

/api.php?action=restart
BODY id_session
Обновляет состояние всех комнат, обнуляет счет игрока

/api.php?action=get_score
BODY id_session
Возвращает счет














