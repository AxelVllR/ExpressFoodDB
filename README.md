# Bienvenue sur mon projet ExpressFood
*Dans le cadre de ma formation OpenClassrooms*

**Mettre en place le projet sûr votre machine :**

 1. Cloner le Repo en local (C'est un Symfony Project)
 2. Lancer la commande "composer install" afin d'installer toutes les dépendances du projet symfony, je sais que certaines ne servent à rien mais je les supprimerais plus tard
 3. Ajouter la lien (DATABASE_URL) vers votre DB locale dans le fichier .env du projet en oubliant pas d'ajouter le nom de la Base de donnée a la fin de celui-ci (Un exemple est présent dans le fichier .env)
 4. Lancer la commande "php bin/console d:d:c" qui va vous permettre de créer la base sûr votre base de données locale (Si vous l'avez déjà fais manuellement, sautez cette étape)
 5. Lancer la commande "php bin/console doctrine:migrations:migrate" afin de migrer les entités vers votre base de données locale à l'aide des fichiers de migrations prévus à cet effet
 6. Puis, pour finir, lancer la commande "php bin/console doctrine:fixtures:load" qui va générer une batterie de données de test très simple.

Voila, c'est terminé, votre DB "ExpressFood" est créée, plus qu'à tester.