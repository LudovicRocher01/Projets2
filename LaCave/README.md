# ProjetISI2

Notre site web sur les vins français : 


_Auteur : Mélinda FABIEN -- Ludovic ROCHER


# Comment installer notre projet? 

## Clonage du dossier 

Pour installer notre projet, vous devez tout d'abord le cloner, appuyez sur le bouton cloner en haut à droite. Vous pouvez également cloner le git qui se trouve à l'adresse suivante : 

https://forge.univ-lyon1.fr/p2108846/projetisi2.git 

## Installation des dépendances 

Ensuite, il faut installer les dépendances dans le projet, pour cela faite la commande : 

```bash
composer install
```
Cette commande permet d'ajouter le dossier vendor essentiel pour exécuter le projet, n'oubliez pas de bien remplir le .env avec vos identifiants de connection à la base de données.

## Les droits 
 N'oubliez pas d'ajouter les droits : 
```bash
sudo chown -R $user :www-data storage
sudo chown -R $user :www-data bootstrap/cache 
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

## Migration et remplissage de la base 

Il faut maintenant créer les migrations et remplir la base de données avec cette commande: 

```bash
php artisan migrate --seed
```

**Vous pouvez désormais naviguer sur notre site. Bonne visite !**

## Authentification 

Vous pouvez vous authentifier à l’aide des identifiants suivant qui ont été préalablement créer par nos soins :

Username : userpassword@gmail.com
Mot de passe :  userpassword

Si vous voulez créer un compte, il faut ajouter register dans l’url, comme l’exemple ci-dessous :  https://localhost/web/projetisi2/wine_project/public/register


## License
[MIT](https://choosealicense.com/licenses/mit/)
