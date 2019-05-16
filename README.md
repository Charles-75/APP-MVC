APP MCV
=======

Framework MVC PHP pour notre APP informatique à l'ISEP année 2017-2018


Développement
-------------

Pour commencer à développer avec ce framework, servez le dossier `app` avec un serveur web, ou utilisez Docker

### Développer avec Docker

Pour développer avec Docker, vous devez installer Docker et Docker-Compose
Ensuite, utiliser `docker-compose up`.

Le site sera servi sur le port 8080.

### Développer avec Wamp

Aller dans le system tray, et naviguez dans le menu Wamp -> Apache -> httpd-vhosts.conf
Remplacer en lignes 6 et 7 `/www` par `/www/APPMVC/app/www`
Enregistrer, redémarrer le service Apache et se rendre à l'adresse `http://localhost:8080`
