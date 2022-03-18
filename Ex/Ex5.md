# Exercice 5

Créer un service Sapin (src/Service/Sapin.php) qui contiendra une méthode 
permettant de renvoyer un sapin composé de caractères * d'une hauteur définie
en paramètre.

```shell
default(4) retournera :

    *
   ***
  *****
 *******
```

Créer une route "sapin" dans l'un de vos controllers qui affichera le résultat
de la fonction default de votre service Sapin. La route prend un paramètre qui
définie la hauteur du sapin