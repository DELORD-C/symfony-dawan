# Formation Symfony Dawan


composer : gestionnaire de paquets php

npm : gestionnaire de paquets js & css



## architecture des dossiers

```php
assets/ //css, js, medias
bin/ //console
config/ //configuration de l'application
migrations/ //historiques des actions de l'ORM sur la base de donnée
node_modules/ //dépendances npm
public/ //racine de notre dossier web
src/ //contient tout le code php, les controleurs, modules, etc.
templates/ //templates de pages en twig
translations/ //traductions
var/ //cache & logs
vendor/ //dépendances php
```

symfony flex : permet d'ajouter et de gérer les dépendaces via la commande :
```shell
composer require [nom du paquet]
composer remove [nom du paquet]
```

Lister les routes :
```shell
php bin/console debug:router
```


Les tags utiles en TWIG :
```twig
block
include
extends
if
for
```