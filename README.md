
  Entrée de l'application : http://localhost/leboncoin_jmi/web/app_dev.php/leboncoin

  Fait : Accueil
         Ajouter une annonces
         Voir offres
         Voir demandes
         Responsive

  Reste à faire : Connexion
                  Carte france intéractive
                  'Mes annonces'
                  'Boutiques'
                  Géolocalisation

  Étape 1 :
  ---------
    Faire un "git clone https://github.com/jjny/leboncoin_jmi.git" dans votre dossier  "[wamp|xamp|ampps|...]/www/"

    Tester sur le navigateur l'adresse : http://localhost[:port]/leboncoin_jmi/web/app_dev.php
    http://localhost/leboncoin_jmi/web/app_dev.php/leboncoin
    Le numéro de port n'est pas forcément nécessaire.


    Pour créer la base de donnée, ouvrir une console et aller dans le dossier leboncoin_jmi/, et lancez la commande :
    php bin/console doctrine:database:create

    La commande va lire le fichier "parameters.yml", donc elle va créer une base de donnée dans votre serveur local appelée "leboncoin_jmi".

  Étape 2 :
  ---------
    Le bundle FOSUserBundle est installé et configuré. Ce bundle permet de créer des utilisateurs et de gérer leur connexion.
    Si vous allez sur l'adresse "http://localhost/leboncoin_jmi/web/app_dev.php/login", vous ouvrez la page de connexion. Inutile d'essayer de se connecter car, premièrement, vous n'avez pas de compte utilisateur.



Procédure Symfony (créer une page) :
====================================

  Tout d'abord, essayons de travailler chacun sur son Bundle. Si quelqu'un à besoin d'intervenir sur un autre Bundle (par exemple Jennifer avec les notifications), prévenez tout le monde (sur slack par exemple) pour éviter d'écraser les modifications des autres.

  Le fichier base.html.twig
  -------------------------
    Sachez que toutes les pages du site auront des parties de code html identiques. Le DOCTYPE, le charset, les <link> CSS, les <script> JS, les balises <html> et <body>, le menu du haut (même s'il change en fonction du user.groups), le bouton "connexion/déconnexion", la date et heure, le footer, etc...
    Pour se simplifier la vie, tout ce code qu'on va retrouver dans toutes les pages sera dans le fichier "app/Resources/views/base.html.twig".

    Lorsqu'on crée une page html.twig dans un Bundle (dans le dossier Resources/views/Default/ en général), il suffit d'écrire en haut {% extends "base.html.twig" %} (c'est assez parlant, on étend le fichier base).

    Attention, un fichier qui "extends" un autre fichier ne peut pas avoir de code qui se balade dans le vide. Dans le fichier base, vous pouvez voir des {% block %}. Celà permet de délimiter des zones dans lesquels on va intégrer du code provenant des autres fichiers. Donc dans vos fichiers html.twig, il faut respécter ces block.


  Les routes
  ----------
    (même si c'est faux, considérez que url = route = chemin)
    Le fichier app/config/routing.yml contient les routes globales du site internet. Ce fichier indique quel fichier route utiliser à telle ou telle url.

    Les fichiers route des Bundle sont dans "[NomDuBundle]/Resources/config/" et doivent s'appeler "routing.yml" (comme le fichier route global).
    La différence est que le fichier route dans le Bundle indique quel Controller utiliser (modèle MVC).

  Les Controllers :
  -----------------
    Une route appelle un Controller. Le rôle du Controller est de réaliser des fonctions, calculs, créations, suppressions, etc... pour ensuite envoyer les résultats dans une Vue.


  Les Vues :
  ----------
    C'est la partie la plus simple. L'url appelle un Controller, le Controller manipule des données à partir des entités (entité = Model, donc on a bien un rapport Modèle -> Controller). Le Controller renvoie ces données dans une Vue (un fichier html.twig). Et paf ! ça fait du MVC.

    Rapidement, la Vue contient du code html et du code twig (logique). Le html, tout le monde connait, le twig est ce qui va permettre de manipuler les données envoyées par le Controller.

