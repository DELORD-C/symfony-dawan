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