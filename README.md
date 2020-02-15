# Registration Form - Laravel
Для запуска проекта неоходимо:
- Настроить файл `.env`, для подключения к БД. Добавить Google Key для использования Google Maps
```sh
GOOGLE_API_KEY=
```
- Установить пакеты
```sh
$ compser install
```
- Создать хранилие для изображений
```sh
$ php artisan storage:link
```
- Создать таблицы в БД
```sh
$ php artisan migrate
```