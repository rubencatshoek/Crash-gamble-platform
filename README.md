![Logo of the project](https://raw.githubusercontent.com/jehna/readme-best-practices/master/sample-logo.png)

# Default Laravel project readme
A readme designed to get on track to developing faster.

## Installing / Getting started

```
git clone --branch master https://github.com/rubencatshoek/crash-gamble-platform
cd AWOZ-project/
composer install
cp .env.example .env
php artisan key:generate
```

### Initial Configuration

```
npm install
```

## Developing

Een stappenplan om te beginnen met developen.

```
php artisan migrate:fresh && php artisan db:seed
php artisan storage:link
```
