# Projet_Collectif
# Plateforme-micro-blogging


Equipe de 3 personnes / 8 jours de travail (installation incluse)


Début de projet via la documentation d'install de Laravel 8 :
https://laravel.com/docs/8.x/installation#getting-started-on-linux <br>
Ce qui permet également de commencer à utiliser Docker <br>
-> attention donc à bien stopper les serveurs Apache et Mysql <br>


* * * 
N'apparaissent dans ce repo que les fichiers modifiés pour la création de nouvelles vues et fonctionnalités. <br>
-> dossier vendor exclu du git, les personnes qui clonent le projet doivent récupérer Sail, lancer npm et effectuer les migrations avec l’option --seed <br>
Quelques lignes de commandes utiles : <br>
$ ./vendor/bin/sail up <br>
$ alias sail='bash vendor/bin/sail' <br>
$ sail artisan migrate --seed <br>
$ sail artisan storage:link (The [/var/www/html/public/storage] link has been connected to [/var/www/html/storage/app/public]) <br>
* * *
