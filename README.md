<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project NoOzone</h1>
    <br>
</p>

Инструкция по установке проекта

УСТАНОВКА NOOZONE
-------------------

1) Зайти в папку OSPanel/domains
2) Скопировать путь папки
3) Зайти в терминал
4)
~~~
cd *путь к папке domains*
git clone *ссылка на этот репозиторий*
~~~
5) В папке OSPanel/domains появится папка с названием NoOzone


ЗАПУСК OSPANEL
------------

1) Перейти C:\OSPanel
2) Запустить Open Server Panel
3) В панели задач необходимо нажать на красный флажок
4) После того, как флажок стал зеленым необходимо перейти в Дополнительно->PhpMyAdmin


УСТАНОВКА БАЗЫ ДАННЫХ
------------

1) На главной странице PhpMyAdmin в поле "Пользователь" необходимо прописать 
~~~
root
~~~
поле пароля оставить пустым

2) Создаем новую базу данных
3) В поле "Имя базы данных" написать:
~~~
no_ozon
~~~

4) Выбрать тип: utf8mb3_general_ci
5) "Создать"
6) После создания базы данных "no_ozon" переходим в пункт "импорт"
7) Выбираем файл по пути OSPanel\domains\noozone
~~~
no_ozon.sql
~~~

8) Импортируем 
10) В консоли необходимо прописать
~~~
  cd domains
  cd noozone
  composer u
~~~

11) Перезагружаем OSPanel
12) Переходим в Мои проекты->noozone
13) На открывшейся странице выбрать папку "web"
14) Done)
