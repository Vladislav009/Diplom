<h1>Инструкция по установке и запуску проекта.</h1>

<b>Установка</b>

- Скопировать проект с репозитория
- В командной строке выполнить composer install и дождаться установки всех пакетов
- Скопировать все данные из файла .env.example
 -- Создать в папке проекта файл и дать ему название .env, и вставить туда все данные из .env.example
- Создать пустую базу данных
- В файле .env прописать настройки для вашей БД
- В командной строке прописать:
 -- php artisan key:generate ( Для создания уникального ключа)
 -- php artisan migrate ( Для переноса таблиц в вашу БД)
 -- php artisan db:seed ( Для заполнения таблиц начальными данными)

 <b>Запуск</b>

Если используется OpenServer:
  Перейти в Настройки->Домены в списке "Управление доменами" выбираем "Ручное управление + Автопоиск";
  В "Имя домена" прописываем домен портала ( например faq.loc), в "Папке домена" выбираем папку Public из скопированного проекта.
  Перезапускаем сервер и в браузере вводим faq.loc

 Более подробно можно почитать на http://cccp-blog.com/laravel/laravel-nastrojka#nastrojka-laravel-dlya-apache
