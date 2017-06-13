
##Chapitre 2
#Contenu


#HEADERS / FRONTMATTER

Les en-têtes (encore appelés frontmatter) situés en haut d'une page sont entièrement facultatifs, vous n'en avez pas besoin pour afficher une page dans Grav. Dans Grav il existe 3 types de pages principaux  (Standard , Liste  et Modulaire), chacun possédant des en-têtes pertinents.

Note
Les en-têtes sont également connus sous le nom de Frontmatter et sont communément appelés ainsi afin de ne pas être confondus avec les en-têtes HTTP.

##En-têtes de Page Standard

Une page standard est une page unique normale. Il existe un certain nombre d'en-têts standards disponibles en option. Ceux-ci sont **valables pour toutes les pages**.

#Titre

Si vous n'avez pas d'en-tête du tout, vous n'aurez aucun contrôle sur le titre de la page tel qu'il apparaît dans le navigateur et les moteurs de recherche. Pour cette raison, il est recommandé de placer *au moins* la variable de title dans l'en-tête de la page:

 
title: Title of my Page
 

Si la variable title n'est pas définie, Grav a une solution de secours et essaiera d'utiliser la variable de slug en majuscules:


Chemin (slug)

 
slug: my-page-slug
 

La variable slug vous permet de définir spécifiquement la partie de l'URL qui concerne la page. Par exemple: http://yoursite.com/my-page-slug serait l'URL si vous aviez choisi "slug" ci-dessus. Si le slug n'est pas défini sur la page, Grav va utiliser le nom du dossier (sans aucun préfixe numérique).

Les chemins sont en général en minuscules, les caractères accentués étant remplacés par des lettres de l'alphabet anglais et des caractères blancs remplacés par un tiret ou un trait de soulignement. Alors que les versions futures de Grav supporteront les espaces dans les chemins, les espaces vides ou les lettres capitales ne sont pas recommandés.

Par exemple: si le titre d'un blog est Blog Post Example, le slug recommandé serait blog-post-example.


#Menu

menu: My Page
 
La variable menu vous permet de définir le texte utilisé dans la barre de navigation. Il existe plusieurs niveaux de secours pour le menu, donc si aucune variable de menu n'est définie, Grav va tenter d'utiliser la variable title.

#Date

date: 01/01/2014 3:14pm

La variable de date vous permet de définir spécifiquement une date associée à cette page. Elle est souvent utilisée pour indiquer quand une publication a été créée et peut être utilisée à des fins d'affichage ou de tri. Si elle n'est pas définie, sa valeur par défaut est celle de la **dernière modification** de la page.


Note
Les formats de dates m/d/y ou d-m-y sont différenciables selon le séparateur entre les différents composants: si le séparateur est une barre oblique ( / ), l'américain m/d/y est attendu; alors que si le séparateur est un tiret ( - ) ou un point (. ), le format européen d-m-y est attendu.



#Publié (Published)

 
published: true
 

Par défaut, une page est publiée à moins que vous ne définissiez explicitement un état de non publication (published: false) ou  une date de publication future (publish_date), ou qu'une date d'arrêt de publication (unpublish_date) ait été définie pour une date déjà passée. Les valeurs valides sont true ou false.

#Date de publication
 
publish_date: 01/23/2015 13:00
 

Champ optionnel, mais qui peut déclencher automatiquement une date de publication. Les valeurs valides sont toutes les valeurs de chaines de date que strtotime() prend en charge.

 
#Date de non publication

unpublish_date: 05/17/2015 00:32
 
Champ optionnel, mais qui peut déclencher automatiquement l'arrêt de la publication. Les valeurs valides sont toutes les valeurs de date de chaîne que strtotime() prend en charge.

#Visible

visible: false
 
Par défaut, une page est **visible** dans le **barre de navigation** si le dossier qui l'entoure possède un préfixe numérique, par ex. /01.home, est visible, tandis que /error **n'est pas visible**. Ce comportement peut être forcé en définissant la variable visible dans l'en-tête. Les valeurs valides sont true ou false.

#SSL

ssl: true
 
A partir de Grav **1.0.9**, vous pouvez  activer ou désactiver une page spécifique avec SSL **on** ou **off**. Cela ne fonctionne qu'avec l'option absolute_urls: true configurée dans system.yaml. Vous devez utiliser des URL complètes avec le protocole et l'hôte inclus afin de pouvoir aller et venir entre des pages SSL et non SSL. 


#Rediriger

redirect: '/some/custom/route'

ou
 
redirect: 'http://someexternalsite.com'
 

A partir de Grav **0.9.41**, vous pouvez rediriger vers une autre page interne ou externe directement à partir d'un en-tête de page. Bien sûr, cela signifie que cette page ne sera pas affichée, mais la page peut toujours figurer dans une collection, un menu, etc., car elle existera en tant que page dans Grav.

A partir de Grav **1.0.0**, vous pouvez également ajouter un code de redirection à une URL en utilisant des crochets:

 
redirect: '/some/custom/route[303]'
 

#Routes

 
routes: default: '/my/example/page' canonical: '/canonical/url/alias' aliases: - '/some/other/route' - '/can-be-any-valid-slug'
 

Avec Grav **0.9.30**, vous pouvez maintenant fournir une **route par défaut** qui force la structure de route standard telle que définie par la structure du dossier.

Vous pouvez également spécifier une **route favorite** spécifique qui peut être utilisée dans les thèmes pour générer un lien favori:

 
<link rel="canonical" href="https://yoursite/dresses/green-dresses-are-awesome" />
 

Enfin, vous pouvez spécifier un ensemble d'**alias de route** qui peuvent être utilisés comme des itinéraires alternatifs pour une page particulière.

#Routable

routable: false
 

Par défaut, toutes les pages sont routables. Cela signifie qu'elles peuvent être atteintes en pointant votre navigateur sur l'URL de la page. Toutefois, vous serez peut-être amené à créer une page destinée à posséder un contenu spécifique, qui devra être appelée directement par un plugin, un autre contenu ou même directement un thème. Un bon exemple de cela est une page 404 Error.

Si une autre page ne peut pas être trouvée, Grav recherche automatiquement une page avec la route /error. Étant donné qu'il s'agit d'une véritable page dans Grav, vous avez un contrôle total sur ce à quoi cette page ressemble. Vous ne souhaitez probablement pas que les visiteurs accèdent à cette page directement depuis leur navigateur, cette page a donc  son paramètre routable généralement réglé sur false. Les valeurs valides sont true ou false.

#Redirection ici après login (Connexion Redirect Here)

login_redirect_here: false
 

L'en-tête login_redirect_here vous permet de déterminer si oui ou non quelqu'un reste sur cette page après avoir ouvert une session via le plugin Grav Login. Régler cet en-tête sur false renverra quelqu'un à la page précédente après une login réussi.

Un réglage sur true ici permettra à la personne de rester sur la page actuelle après un login réussi. C'est également le paramètrage par défaut s'appliquant lorsqu'il n'existe pas d'en tête login_redirect_here dans le frontmatter.

Vous pouvez forcer ce comportement par défaut en forçant un emplacement standard spécifié dans une option explicite dans votre YAML de configuration de connexion:

 
redirect_after_login: '/profile'
 

Cela vous conduira toujours à la route /profile après une login réussi.


#Résumé

 
summary: enabled: true format: short | long size: int
 

L'option de **résumé** sert à configurer ce que la méthode page.summary() retourne. Cela est le plus souvent utilisé dans un scénario de type de liste de blog, mais peut être utilisé chaque fois que vous avez besoin d'un synopsis ou d'un résumé du contenu de la page. Les scénarios sont les suivants:

    enabled: false - Désactive la page de résumé(le résumé renvoie le même contenu que la page)
    enabled: true :
        size: 0 - Aucune troncature de contenu ne se produit sauf si un délimiteur de résumé est trouvé.
        size: int - Le contenu dépassant la longueur **int** sera tronqué. Si un délimiteur de résumé est trouvé, le contenu sera tronqué jusqu'au délimiteur de résumé.
        format: long - Tout délimiteur de contenu du contenu sera ignoré.
            size: 0 - Le résumé équivaut à l'intégralité du contenu de la page.
            size: int - Le contenu sera tronqué après les caractères **int**, indépendamment de la position du délimiteur de résumé. 
        format: short - Détecte et tronque le contenu jusqu'à la position du délimiteur de résumé.
            size: 0 - Si aucun délimiteur de résumé est trouvé, le résumé équivaut au contenu de la page, sinon le contenu sera tronqué jusqu'à la position du délimiteur de résumé.
            size: int - Tronque toujours le contenu après les caractères **int**. Si un délimiteur de résumé a été trouvé, tronque le contenu jusqu'à la position du délimiteur de résumé. 

#Modèle

template: custom
 

Comme expliqué dans le chapitre précédent, le modèle du thème utilisé pour le rendu d'une page est basé sur le nom de fichier du fichier .md.

Ainsi, un fichier appelé default.md, utilisera le modèle(template) default du thème actif. Vous pouvez évidemment forcer ce comportement simplement en configurant la variable template dans l'en-tête et en choisissant un modèle(template) différent.

Dans l'exemple ci-dessus, la page utilisera le modèle personnalisé à partir du thème. Cette variable existe car il est possible que vous souhaitiez vous modifier le modèle d'une page en le codant à partir d'un plugin.


#Format du template (modèle)

 
template_format: xml
 

Traditionnellement, si vous voulez qu'une page affiche un format spécifique (c-à-d : Xml, json, etc.), vous devez ajouter le format à l'url. Par exemple, la saisie de http://example.com/sitemap.xml indique au navigateur de traiter le contenu à l'aide du template .xml.twig. Cela est bien, car nous aimons faire les choses simplement dans Grav.

À l'aide de l'en-tête de la page template_format, nous pouvons indiquer au navigateur de traiter la page sans aucun besoin d'extension de l'URL. En indiquant template_format: xml dans notre page sitemap, nous pouvons faire fonctionner http://example.com/sitemap sans avoir à ajouter .xml à la fin de celui-ci.

Nous avons utilisé cette méthode avec le plug-in Grav Sitemap.


#Taxonomie

 
taxonomy: category: blog tag: [sample, demo, grav]
 

Une variable d'en-tête très utile, taxonomy  vous permet d'attribuer des valeurs aux types de **taxonomie** que vous définissez comme  valides dans le fichier de configuration du site (fichier Site Configuration).

Si la taxonomie n'est pas définie dans ce fichier, elle sera ignorée. Dans cet exemple, la page est définie comme étant dans la catégorie blog et possède des balises: sample, demo et grav. Ces taxonomies peuvent être utilisées pour trouver ces pages à partir d'autres pages, de plugins et même de thèmes. Le chapitre sur la taxonomie couvrira plus en détail ce concept.


#Activation du Cache

 
cache_enable: false
 

Par défaut, Grav met en cache le contenu du fichier de la page afin de s'assurer d'un déroulement le plus rapide possible. Il existe des scénarios avancés où vous ne souhaitez pas que la page soit mise en cache.

Un exemple de ceci est lorsque vous utilisez des variables Twig dynamiques dans votre contenu. La variable cache_enable permet de forcer ce comportement. Nous aborderons les variables de Twig Content dans un chapitre ultérieur. Les valeurs valides sont true ou false.


#Ne jamais mettre Twig en cache (Never Cache Twig)

 
never_cache_twig: true
 

L'activation de cette option vous permettra d'ajouter une logique de traitement qui pourra changer dynamiquement lors du chargement de chaque page plutôt que de mettre en cache les résultats et de les stocker pour chaque chargement de page. Cela peut être activé / désactivé pour l' ensemble du site dans system.yaml ou pour une page spécifique. Les valeurs possibles sont true ou false.

Il s'agit d'un changement subtil, mais particulièrement utile dans les pages modulaires, car il évite de devoir désactiver constamment la mise en cache lorsque l'on travaille avec elles. La page est toujours mise en cache, mais pas le Twig. Le Twig est traité après la récupération du contenu mis en cache. Pour les formulaires modulaires, on utilise ce paramètre plutôt que d'avoir à désactiver le cache de page modulaire.

Info
Cela n'est pas actuellement compatible avec twig_first: true  car tout le traitement se déroule dans l'appel Twig.


#Processus

 
process: markdown: false twig: true
 

Le traitement de la page est une autre fonctionnalité avancée. Par défaut, Grav traite le markdown mais ne traitera **pas** les twigs dans une page. Ce choix de ne pas traiter Twig par défaut est uniquement lié à des raisons de performance, car ce n'est pas une fonctionnalité habituellement requise. La variable process vous permet de forcer ce comportement.

Vous voudrez peut-être désactiver markdown sur une page particulière si vous souhaitez utiliser 100% de HTML dans votre page et ne voulez pas que le markdown soit exécuté. De plus, cela vous permet d'utiliser un plugin afin de traiter complètement le contenu d'une page d'une autre manière. Les valeurs valides sont true ou false.

Il existe des situations où vous souhaitez utiliser la fonctionnalité de modélisation Twig dans votre contenu, cela s'effectue en définissant la variable twig sur true.



#Exécutez Twig en premier

 
twig_first: false
 

S'il est paramétré sur true le processus Twig se déroule avant le traitement de Markdown. Cela peut être particulièrement utile si votre Twig génère du markdown devant être disponible pour être traité par le compilateur Markdown. Une chose à noter, en cas de paramétrage cache_enable: false **et** twig_first: true, la mise en cache de la page est désactivée.

#Markdown 

 
 markdown: extra: false auto_line_breaks: false auto_url_links: false escape_markup: false special_chars: '>': 'gt' '<': 'lt'
 

    extra : active le Markdown Support supplémentaire (GFM par défaut)
    auto_line_breaks : Active les sauts de lignes automatiques
    auto_url_links : Active les liens HTML automatiques
    escape_markup : Echappe les balises en entités
    special_chars : Liste de caractères spéciaux à convertir automatiquement

Ces paramètres de Markdown sont une nouvelle fonctionnalité que nous avons ajoutée dans **v0.9.14**. Vous pouvez les activez glogalement via votre fichier de configuration user/config/system.yaml, ou vous pouvez forcer ce paramétage global en paramétrant page-à-page à l'aide de l'option d'en-tête markdown.



"Boite à lumière (Ligthbox)

 
lightbox: true
 

Bien que strictement parlant il ne s'agisse pas d'un en-tête de page standard, il est habituel de permettre le chargement d'une fenêtre standard JavaScript et CSS pour une page. Par défaut, le thème antimatter ne charge pas les éléments prérequis à l'activation des fonctionnalités de la lightbox qui concernent les images, assurez-vous d'installer un plug-in Lightbox tel que **Featherlight** , disponible via GPM.

#Code de réponse HTTP

 
http_response_code: 404
 

Permet le paramètre dynamique d'un code de réponse HTTP.


#ETag

 
etag: true
 

Active ou désactive selon un niveau page, l'affichage ou non d'une variable d'en-tête ETag avec une valeur unique. Paramétré par défaut sur false, sauf si vous le forcez dans system.yaml.


#Dernière Modification (LastModified)

 
last_modified: true
 
Active ou désactive selon un niveau page, l'affichage ou non d'une variable d'en-tête de dernière modification avec date modifiée. Paramétré par défaut sur false, sauf si vous le forcez dans system.yaml.

#En-tête de la Meta-page

Les en-têtes Meta vous permettent de définir le set standard des **balises** HTML pour chaque page, comme OpenGraph, Facebook et Twitter.


#Exemples de méta-balises standards (standard metatag)

 
metadata: refresh: 30 generator: 'Grav' description: 'Your page description goes here' keywords: 'HTML, CSS, XML, JavaScript' author: 'John Smith' robots: 'noindex, nofollow' my_key: 'my_value'
 

Cela générera le HTML:

 
<meta name="generator" content="Grav" /> <meta name="description" content="Your page description goes here" /> <meta http-equiv="refresh" content="30" /> <meta name="keywords" content="HTML, CSS, XML, JavaScript" /> <meta name="author" content="John Smith" /> <meta name="robots" content="noindex, nofollow" /> <meta name="my_key" content="my_value" />
 

Toutes les métabalises HTML5 sont prises en charge.


#Exemples de méta-balises OpenGraph ( penGraph Metatag)

 
metadata: 'og:title': The Rock 'og:type': video.movie 'og:url': http://www.imdb.com/title/tt0117500/ 'og:image': http://ia.media-imdb.com/images/rock.jpg
 

Cela générera le HTML:

 
<meta name="og:title" property="og:title" content="The Rock" /> <meta name="og:type" property="og:type" content="video.movie" /> <meta name="og:url" property="og:url" content="http://www.imdb.com/title/tt0117500/" /> <meta name="og:image" property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" />
 

Pour un aperçu complet de toutes les métabalises OpenGraph pouvant être utilisées, veuillez consulter la documentation officielle.


#Exemples de méta-balises Facebook (Facebook Metatag)

 
metadata: 'fb:app_id': your_facebook_app_id
 

Cela générera le HTML:

 
<meta name="fb:app_id" property="fb:app_id" content="your_facebook_app_id" />
 

Facebook utilise principalement des métabalises OpenGraph, mais il existe des tags spécifiques à Facebook et ceux-ci sont automatiquement pris en charge par Grav.


#Exemples de méta-balises Twitter (Twitter Metatag)

 
metadata: 'twitter:card' : summary 'twitter:site' : @flickr 'twitter:title' : Your Page Title 'twitter:description' : Your page description can contain summary information 'twitter:image' : https://farm6.staticflickr.com/5510/14338202952_93595258ff_z.jpg
 

Cela générera le HTML:

 
<meta name="twitter:card" property="twitter:card" content="summary" /> <meta name="twitter:site" property="twitter:site" content="@flickr" /> <meta name="twitter:title" property="twitter:title" content="Your Page Title" /> <meta name="twitter:description" property="twitter:description" content="Your page description can contain summary information" /> <meta name="twitter:image" property="twitter:image" content="https://farm6.staticflickr.com/5510/14338202952_93595258ff_z.jpg" />
 

Pour un aperçu complet de toutes les méta-balises Twitter pouvant être utilisées, veuillez consulter la documentation officielle.


#Débogueur

Lorsque vous activez le débogueur via le fichier system.yaml, le débogueur s'affiche sur chaque page. Il existe des cas où cela peut ne pas être souhaitable ou peut provoquer des conflits avec la sortie. C'est le cas lorsque vous demandez une page dont l'HTML est destiné à être retourné à un appel Ajax. Il ne faut pas que le débogueur soit injecté dans les données obtenues. Pour désactiver le débogueur sur cette page, vous pouvez utiliser l'en-tête de page debugger:

 
debugger: false
 

#En-têtes de page personnalisés

Bien sûr, vous pouvez créer vos propres en-têtes de pages personnalisés en utilisant une syntaxe YAML valide. Ceux-ci sont page-spécifiques et disponibles pour une utilisation par tout plugin ou thème. Un bon exemple de cela serait de définir une variable spécifique à un plugin de sitemap, telle que :

 
sitemap: changefreq: monthly priority: 1.03
 

L'importance de ces en-têtes est que Grav ne les utilise pas par défaut. Ils sont uniquement lus par le **sitemap plugin** pour déterminer la fréquence à laquelle cette page spécifique est modifiée et quelle est sa priorité.

Tout en-tête de page comme celui-ci devrait être documenté, et il y aura généralement une valeur par défaut qui sera utilisée si la page ne la fournit pas.

Un autre exemple serait de stocker des données spécifiques d'une page donnée qui pourraient ensuite être utilisées par Twig dans le contenu de la page.

Par exemple, vous pourriez vouloir associer une référence d'auteur à la page. Si vous avez ajouté ces paramètres YAML à l'en-tête de la page:

 
author: name: Sandy Johnson twitter: @sandyjohnson bio: Sandy is a freelance journalist and author of several publications on open source CMS platforms.
 

Vous pourriez alors y accéder depuis Twig:

 
<section id="author-details"> <h2>{{ page.header.author.name }}</h2> <p>{{ page.header.author.bio }}</p> <span>Contact: <a href="https://twitter.com/{{ page.header.author.twitter }}"><i class="fa fa-twitter"></i></a></span> </section>
 

Cela offre vraiment beaucoup de flexibilité et de puissance.

##En-têtes de collection

Les collections ont grandi! Toutes les informations sur l'En-tête de collection (Collection Header) sont maintenant situées dans leur propre section.


#Frontmatter.yaml

Une fonctionnalité avancée pouvant être utile pour certains utilisateurs ayant besoin de puissance est la possibilité d'utiliser des valeurs communes via un fichier frontmatter.yaml situé dans le dossier de la page. Ceci est particulièrement utile lorsque vous travaillez avec des sites multilingues où vous souhaitez partager une partie de l'interface de référence avec toutes les versions linguistiques d'une page donnée.

Pour en profiter, il suffit de créer un fichier frontmatter.yaml au sein des fichiers.md de votre page et d'ajoutez des valeurs de frontmatter valides. Par exemple:

 
metadata: generator: 'Super Grav' description: Give your page a powerup with Grav!
 
Attention
L'utilisation de frontmatter.yaml est une fonctionnalité 'fichier' et n'est pas prise en charge par le plugin administrateur. 