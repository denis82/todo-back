
Текст задания

Trial assignment
Estimated time for this task is 1-2 hours
Create API for todo app using clean PHP or any framework
Todo item should have 2 fields: title and flag completed: yes/no
API should provide methods for create/update/remove todo items
API should provide method to complete task
API user may delete only completed items
System should store create and update datetime for todo
API should provide a way to get all elements, just completed or just incomplete
Results
You should provide link to github repo with completed assignment
At readme.md of repo you should have documentation for your API
Bonus assignments (just in case if you have spare time)
Implement authorization flow and store creator next to todo item
Implement UI for API using Vue/React/Angular
Implement offline work with todo app





## Как запустить

1. клонировать репозиторий

```sh
git clone git@github.com:denis82/todo.git
```

2. перейти в корень

```sh
cd todo-back/
```

3. поставить все пакеты

```sh
composer update
```
> Note: Возможные проблемы, не соответсятвие версии компосера.


4. Развернуть контеунеры 

```sh
docker-compose up -d
```

> Note: Возможные проблемы, занятые порты для nginx или mysql.


5. Переименовать конфиг файл

```sh
mv .env.example .env
```

6. Запустить миграции

```sh
php artisan migrate
```

> Note: Возможные проблемы, если запросы к базе отваливаются, в env сделать DB_HOST=mysql

5. Если все прошло успешно запросы должны проходить так.

```sh
http://localhost/api/task
```

