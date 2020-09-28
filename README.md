![Logo of the project](https://raw.githubusercontent.com/jehna/readme-best-practices/master/sample-logo.png)

# AWOZ project
Een webapplicatie voor Academische Werkplek Ouderenzorg Zeeland om onderzoeken op een efficiente manier te delen en te controleren.

## Installing / Getting started
Voer deze code uit om aan de minimale vereisten te voldoen.

```
git clone --branch master https://github.com/dannylifino/AWOZ-project.git AWOZ-project
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
php artisan migrate
php artisan db:seed
php artisan storage:link
```

1. Vul database met tables.
2. Vul tables met data.

## Features
* Onderzoeken overzichtelijker maken door filteren- en kaart functionaliteiten
* Onderzoeken tonen vanuit een centraal punt: awoz.nl
* Communicatie stimuleren d.m.v een intern communicatiesysteem
* Onderzoeken door onderzoekers laten toevoegen

## Authors

* **Kaycee Tjon-Kon-Fat** - *Initial work* - [Kaze85](https://github.com/Kaze85)
* **Ilse Riddersma** - *Initial work* - [ridd0053](https://github.com/ridd0053)
* **Alex Spelt** - *Initial work* - [alexspelt](https://github.com/alexspelt)
* **Kars Hamelink** - *Initial work* - [karsenHAM](https://github.com/karsanHAM)
* **Jeffrey Sentjens** - *Initial work* - [jpmsen](https://github.com/jpmsen)
* **Danny Lifino** - *Initial work* - [dannylifino](https://github.com/dannylifino)
