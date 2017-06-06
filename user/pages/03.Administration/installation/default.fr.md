---
title: 'Installation du module administration'
visible: true
---

D'abord, assurez-vous d'exécuter la dernière version Grav, 1.3.0-rc.3 ou ultérieure . 
Ceci est nécessaire pour que le plugin administrateur s'exécute correctement. 
Vérifiez et mettez à niveau vers de nouvelles versions Grav comme celle-ci ( -f force un rafraîchissement de l'index GPM):
```
$ bin/gpm version -f
$ bin/gpm selfupgrade
```
Pour fonctionner, le plugin admin nécessite l'installation de 3 autres plugins :
1. vous devez d'abord installer les identifiants de connexion , 
2. de formulaires et 
3. de courrier électronique. 

Ceux-ci sont disponibles via GPM qui vous proposera d'installer les dépendances du plugins Administration :

```
$ bin/gpm install admin
```
Vous pouvez également installer le plugin manuellement si vous ne parvenez pas à utiliser GPM sur votre système.

Les plugins sont installés dans le dossier user/plugins.

