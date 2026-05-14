# Daily
Daily — это система управления записями, построенная на базе кастомного PHP-движка с умеренным соблюдением SOLID и чистой архитектуры. В нем реализована возможность регистрации профиля, вход в него, редактирование данных аккаунта, привязка заполняемых данных CRUD (речь о notes) к определенному профилю по ID. Загрузка аватаров на сервер, смена аватарки пользователя, автоматическое удаление аватара из папки проекта, если произошла замена изображения. Активация сессии, session destroy.


Технологический стек:
-

Frontend: HTML/CSS (Tailwind css), JavaScript

Backend: PHP 8.x.

Database: MySQL (взаимодействие через PDO для защиты от SQL-инъекций).

Architecture: MVC (Model-View-Controller).

Dependency Management: Самописный IoC Container для гибкого управления зависимостями.

Security: Безопасное хеширование паролей с использованием алгоритма bcrypt.

Testing: Автоматизированное тестирование (Unit & Feature) с использованием Pest/PHPUnit (в процессе добавления).

Version Control: Git-workflow.

Ключевые особенности
-

IoC Container: Реализована логика bind и resolve для автоматического внедрения зависимостей (Dependency Injection).

Secure Auth: Система регистрации и авторизации с защищенным хранением данных.

Clean Routing: Кастомный роутер для обработки запросов и распределения их по контроллерам.

Notes Lifecycle: Управление заметками (создание, чтение, редактирование, удаление).

Установка
-

1. Выберите куда клонировать репозиторий и перейти в папку проекта:
   ```bash
   git clone https://github.com/Kenal0/daily-php-mysql
   cd daily-php-mysql
   ```

2. Установить зависимости:
   ```bash
   composer install
   ```

3. Создать базу данных `myapp` в MySQL, пример заполнения данных:

   - Name: myapp
   - host/ip: localhost
   - port: 3306
   - user: root
   - password: (пусто)

4. Импортировать структуру таблиц:
   - TablePlus: откройте/создайте `myapp` через Ctrl+K → File → Import → From SQL Dump → выбери `database.sql`
   - phpMyAdmin: откройте `myapp` → вкладка Import → выбери `database.sql` → Go

5. Если вы создали данные не по примеру в 3 пункте, укажите свои данные в `config.php`:
```php
   'database' => [
   
       'host' => 'localhost',
       'port' => 3306,
       'dbname' => 'myapp',
       'charset' => 'utf8mb4'
       
   ]
```

6. Запустить локальный сервер из папки public/:
   ```bash
   php -S localhost:8888 -t public
   ```
