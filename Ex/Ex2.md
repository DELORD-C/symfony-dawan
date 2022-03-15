# Exercice 2

1. Mettre en place un système de navigation (une navbar) dans la header de toutes nos pages

2. La page active doit être en gras

3. Créer les pages et méthodes pour avoir un CRUD complet sur l'objet auteur
   1. list (liste des auteurs avec boutons d'action éditer, supprimer & bouton pour ajouter un nouvel auteur après la liste)
   2. add (page formulaire pour ajouter un auteur)
   3. delete (pas besoin de template ici, juste une méthode qui supprime l'auteur passé en paramètre puis redirige vers la liste)
   4. edit (page formulaire pour modifier un auteur)

4. Créer un CRUD pour les posts. Il faut qu'à la création ou à l'édition d'un post, on puisse choisir dans une liste (select) un auteur existant.

5. Lier bootstrap css et js sur TOUTES les pages du projet (indice : regardez la doc)

6. Mettre à jour la navbar pour avoir (les sous menu doivent être en dropdown) :
```shell
Home
Jour de chance
Nombre chance
Auteurs
  Liste
  Créer
Posts
  Liste
  Créer
```