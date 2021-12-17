# ProjectStream

## About App

Laravel app that helps project display timeline based on the teams involved to that project.

## Installation

Install composer dependency:

```
composer install
```
Create `.env` file :

```
cp .env.example .env
```
Generate app key :

```
php artisan key:generate
```
Deploy Sqlite database :

```
touch database/database.sqlite
```
Database migration :

```
php artisan migrate
```

Run app :

```
php artisan serve
```


## Testing

Run testing :

```
php artisan test
```

## License

The Apps is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
