# Daily
Daily — это производительная система управления задачами и записями построенная на базе кастомного PHP-движка с упором на принципы SOLID и чистую архитектуру.


Технологический стек:
-

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

Task Lifecycle: Управление задачами (создание, редактирование, удаление, статусы выполнения).

Установка
-

1. Клонировать репозиторий и перейти в папку проекта:
   ```bash
   git clone https://github.com/Kenal0/daily-php-mysql
   cd daily-php-mysql

2. Установить зависимости:
   ```bash
   composer install

3. Создать базу данных `myapp` в MySQL

4. Импортировать структуру таблиц:
   - phpMyAdmin: Import → выбрать `database.sql`
   - Терминал:
     ```bash
     mysql -u root -p myapp < database.sql

5. Указать свои данные в `config.php`:
   'database' => [
   
       'host' => 'localhost',
       'port' => 3306,
       'dbname' => 'myapp',
       'charset' => 'utf8mb4'
   ]

6. Запустить локальный сервер из папки public/:
   ```bash
   php -S localhost:8888 -t public

Почему это в моем портфолио?
-
Этот проект демонстрирует мои навыки проектирования backend-систем с нуля, понимание паттернов проектирования и умение работать с инструментами командной разработки Git.
