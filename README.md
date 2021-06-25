# Тестовое задание в ВК: 


## How to run

1) docker-compose up
2) http://localhost:8080/testVkontakte/server/create_table.php (для создания базы данных)
3) http://localhost:8080/ 

## Описание проекта

### PHP Framework:
Vanila PHP

### Структура
/server - серверная часть проекта

/client - клиентская

/common - общие файлы(классы-модели)

### API:
NonREST RPC OVER HTTP

### Описание запросов

/api.php?action=get_room
BODY {id_room,id_session}  
Возвращает комнату

/api.php?action=get_state
BODY {id_room,id_session}  
Возвращает состояние комнаты

/api.php?action=create_session
BODY {name_player}  
Создает и возвращает id сессии

/api.php?action=enter_room
BODY {id_room,id_session}  
Меняет состояние комнаты 

/api.php?action=attack_monster
BODY {id_room,id_session}  
Иммитирует "бой", добавлавляет очки, обновляет состояние комнаты, возвращает монстра

/api.php?action=open_chest
BODY {id_room,id_session}  
Добавлавляет очки, обновляет состояние комнаты, возвращает сундук

/api.php?action=restart
BODY {id_session}  
Обновляет состояние всех комнат, обнуляет счет игрока

/api.php?action=get_score
BODY {id_session}  
Возвращает счет



## Описание игры 

Чтобы передвигаться по комнатам нажимайте на двери. Для взаимодействия с предметом, нужно нажать на него.  

# Скриншоты
![image](https://user-images.githubusercontent.com/57155484/123342901-49174700-d559-11eb-8641-cd8349946809.png)

![image](https://user-images.githubusercontent.com/57155484/123343021-998ea480-d559-11eb-9610-ae4847cd5988.png)

![image](https://user-images.githubusercontent.com/57155484/123343067-b034fb80-d559-11eb-8dc4-f5a399a50829.png)

![image](https://user-images.githubusercontent.com/57155484/123343114-c478f880-d559-11eb-80a8-e2e7911da4ec.png)










