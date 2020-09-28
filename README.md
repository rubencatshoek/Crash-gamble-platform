![Logo of the project](https://raw.githubusercontent.com/jehna/readme-best-practices/master/sample-logo.png)

# AWOZ project
Een webapplicatie voor Academische Werkplek Ouderenzorg Zeeland om onderzoeken op een efficiente manier te delen en te controleren.

## Installing / Getting started
Voer deze code uit om aan de minimale vereisten te voldoen.

```
git clone --branch master https://github.com/rubencatshoek/crash-gamble-platform
cd AWOZ-project/
composer install
cp .env.example .env
php artisan key:generate
```

1. Clone het project (master branch) naar je pc
2. Verander directory naar het project
3. Voer composer install uit.
4. Kopieer .env.example > .env en vul configuratie in.
5. Genereer een encryption key.

### Initial Configuration

```
npm install
```

1. Installeer node modules.

## Developing

Een stappenplan om te beginnen met developen.

```
php artisan migrate:fresh && php artisan db:seed
php artisan storage:link
```

1. Vul database met tables.
2. Vul tables met data.
