# Formation Symfony Dawan

## Définitions

`composer` : Gestionnaire de paquets php

`npm` : Gestionnaire de paquets js & css

`twig` : Moteur de template de Symfony

`Doctrine` : `ORM` de Symfony

`ORM` : Gestionnaire de base de donnée

`Annotations` : Paquet optionnel permettant de configurer les routes directement dans les controllers

---

## Liens des documentations

- Symfony : https://symfony.com/doc/current/index.html
- Twig : https://twig.symfony.com/doc/3.x/
- Bootstrap : https://getbootstrap.com/docs/5.0/getting-started/introduction/
- SQL : https://sql.sh

---

## Commandes utiles
- Lister les versions de php :
```shell
symfony local:php:list
```

- Lister les routes :
```shell
php bin/console debug:router
```

- Lancer le serveur symfony :
```shell
symfony serve
```

- Lancer la compilation automatique du css/js/medias :
```shell
npm run watch
```

- Ajouter un paquet avec symfony flex :
```shell
composer require [nom du paquet]
```
- Retire un paquet :
```shell
composer remove [nom du paquet]
```

- Valider les schémas des Entités :
```shell
php bin/console doctrine:schema:validate
```

---

## Architecture des dossiers

```php
assets/ //css, js, medias
bin/ //console
config/ //configuration de l'application
migrations/ //historiques des actions de l'ORM sur la base de donnée
node_modules/ //dépendances npm
public/ //racine de notre dossier web
src/ //contient tout le code php, les controllers, entités, repertoires, etc.
templates/ //templates de pages en twig
translations/ //traductions
var/ //cache & logs
vendor/ //dépendances php
```

---

## TWIG
### Les tags utiles
```twig
{% block [blockname] %} permet de remplacer le contenu d'un block hérité (ou de créer un block dans un parent)
{% include '[templatename].html.twig' %} permet d'inclure le contenu d'un autre fichier dans l'actuel
{% extends '[templatename].html.twig' %} permet d'hériter d'un fichier
{% if [condition] %}
{% for %}
```
### Comparer la route actuelle avec une route spécifique :
```twig
{% if app.request.pathInfo == path('[nom de la route]') %}
```

### Ajouter les fichiers css & js de `encore` à la page
```twig
CSS :
    {{ encore_entry_link_tags('app') }}
    
JS :
    {{ encore_entry_script_tags('app') }}
```

---

## Doctrine

### Créer la database
```shell
php bin/console doctrine:database:create
```

### Créer une entité
```shell
php bin/console make:entity
```

### Préparer une migration
```shell
php bin/console make:migration
```

### Effectuer une migration
```shell
php bin/console doctrine:migrations:migrate
```

---

## Ajouter Bootstrap 5

1. Installer toutes les dépendances requises
- bootstrap :
```shell
   npm install bootstrap
```
- sass & sass_loader (compiler les fichiers scss)
```shell
npm install sass sass-loader
```
- installer bootstrap js
```shell
npm install @popperjs/core --save-dev
```

2. Configurer webpack
```js
// Dans webpack.config.js
// décommenter ou ajouter la ligne :
.enableSassLoader()
```

3. Importer bootstrap css et bootstrap js dans notre projet
```js
//importer le css
import "bootstrap/scss/bootstrap.scss";

//importer le js
require('bootstrap');
```

4. Inclure nos assets dans nos templates twig (cf : Ajouter les fichiers css & js de `encore` à la page)

---

## Ajouter des medias (images, videos) à notre projet

1) Lier les fichiers uns par uns dans app.js
```js
// Nous n'avons qu'à rajouter des import pour chaque fichier :
// assets/app.js
import image from './media/img/test.jpeg';
// Le nom de la variable n'est utile qu'en js
// Cet import va automatiquement créer une image test.[string aléatoire].jpeg dans notre dossier public
```

2) Copier plusieurs fichiers à la fois avec la fonction `copyFile()`
```js
// webpack.config.js
// ajouter la fonction suivante à Encore
.copyFiles({
    from: './assets/media', //url dans le dossier assets
    to: 'media/[path][name].[hash-8].[ext]', //url dans le dossier public
    pattern: /\.(svg|png|jpg|jpeg|mp4)$/ //optionnel : on peut cibler avec une regex
})
```

3) faire référence aux fichiers dans les templates TWIG
```twig
{{ asset('URL du fichier dans le dossier public (sans la string aléatoire)') }}
```

---

## Versioning

Les dossiers à ignorer sont normalement déjà spécifiés dans le `.gitignore` généré
par la commande
```shell
symfony new [nom du projet] --webapp
```
Mais voici la liste :
```
node_modules/
var/
vendor/
public/build/
```

Tout le reste des fichiers est à versionner (à l'exception du `.env` ou `.env`.local si
vous venez à l'utiliser)

Le fichier `.env.local` viens écraser les propriétés qu'il contient dans le `.env` il peut
donc être utile si vous travaillez en équipe