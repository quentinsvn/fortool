# Fortool

> **⚠️ S'agissant d'un ancien projet, celui-ci est désormais obsolète. Je ne fournis aucun support ⚠️**

![capture d'écran du site](https://miro.medium.com/max/700/1*qGTbwz-KzPxsdnIhZeBOUA.png)

## Présentation

Fortool était un site de gambling lancé en janvier 2020, qui avaient pour objectif de récompenser les utilisateurs par le biais de diverses missions rémunérées (sondages, publicités, inscriptions...). Le site ferma un peu plus tard par manque d'utilisateur, raison pour lesquelles je rends désormais le projet Open Source (bien que certaines fonctionnalités soient obsolètes). 

![capture d'écran du site](https://miro.medium.com/max/700/1*5f3Y-jbfb-GAkWXdFI0HVg.png)

## Technologies

La plateforme est principalement développée en PHP et utilise MySQL comme base de données. Le site peut être hébergé depuis un serveur web sous Apache ou bien Nginx.

## Prestataires de récompenses

### Publicités
- [AdInPlay](https://adinplay.com) (nécessite une acceptation de la platorme)
- [TipeeeStream](https://www.tipeeestream.com/) (la plateforme ne propose plus de publicités vidéos désormais)

### OfferWalls

- [AdsendMedia](https://adscendmedia.com/)
- [AyeT-Studio](https://www.ayetstudios.com/)
- [Offerdaddy](https://www.offerdaddy.com/)
- [Offertoro](https://www.offertoro.com/)
- [Wannads](https://wannads.com/)

Tous les fichiers de configuration postback pour chacune de ces plateformes seront présents via le répertoire "**earn**" > "**[nom de plateforme souhaitée]**" > "**pb**".

## Installation

Les différentes étapes ci-dessous vous permettront, pas à pas, la mise en production du projet depuis votre serveur web.

### Etape 1 : importation du schéma SQL

Une fois votre base de données créer, importer le fichier SQL "**foortool.sql**" présent à la racine du projet afin d'y créer l'ensemble des tables nécessaires au bon fonctionnement de la plateforme.

### Etape 2 : connexion à la base de données

Depuis le répertoire "**includes**" ouvrez le fichier **config.php**

```php
<?php
    // ...
    $bdd = new PDO('mysql:host=HOST;dbname=DBNAME', 'USER', 'MDP');
?>
```

Par la suite, changer les informations de connexion inscrit en majuscules par celles de votre base de données et sauvegarder le fichier. 

| Variables  | Détails  |
|---|---|
| HOST  | IP de votre serveur SQL  |
| DBNAME  | Nom de votre base de données  | 
| USER  | Identifiant de votre base de données |
| MDP | Mot de passe de votre base de données | 

### Etape 3 : connexion Discord

Fortool proposait auparavant un système de connexion avec Discord afin que les différents utilisateurs puissent avoir leurs informations via notre ancien serveur afin d'y avoir une assistance en cas de problèmes. Pour cela, il sera nécessaire de modifier les informations OAuth 2.0 des APIs de Discord via le fichier "**discord.php**" présent dans le répertoires "**includes**".

Les différentes données nécessaires au bon fonctionnement de ce système sont disponibles via la doc développeur de discord.

Connexion OAUth 2.0 :
```php
<?php
    // ...
    define('OAUTH2_CLIENT_ID', 'DISCORD_OAUTH_ID_CLIENT');
    define('OAUTH2_CLIENT_SECRET', 'DISCORD_OAUTH_SECRET_CLIENT');
?>
```

Connexion au Bot :
```php
<?php
  // ...
  $json_options = [
    "http" => [
      "method" => "GET",
      "header" => "Authorization: Bot BOT_TOKEN"
    ]
  ];
  // ...
?>
```

| Variables  | Détails  |
|---|---|
| DISCORD_OAUTH_ID_CLIENT  | Identifiant OAuth de votre application Discord  |
| DISCORD_OAUTH_SECRET_CLIENT  | Identifiant secret OAuth de votre application Discord  | 
| BOT_TOKEN  | Token de votre bot discord afin de recevoir les infos des utilisateurs depuis votre serveur |


## Disclaimer

Ce projet est Open Source, son utilisation dans un but commercial est proscrite. De même, je ne fournirai aucun support et décline toutes responsabilités vis-à-vis de potentiels bugs ou au niveau de l'utilisation personnelle que vous en ferez.

