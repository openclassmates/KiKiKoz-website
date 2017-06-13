---
title: Contenu
---

##Chapitre 2
#Contenu

Dans **grav** , le contenu est la priorité **n ° 1**. Découvrez comment créer et organiser votre contenu rapidement et intuitivement. 


#Pages

Dans le langage de Grav, les **pages** sont les éléments fondamentaux de votre site. Elles servent de support au contenu et à la navigation dans le système Grav.

Combiner contenu et navigation garantit que le système est intuitif à utiliser même pour les auteurs de contenu les moins expérimentés. Cependant, ce système, conjugué à de puissantes capacités de taxonomie, est suffisament puissant pour gérer des exigences de contenu complexes.

Grav supporte nativement **3 types de pages** qui vous permettent de créer une riche sélection de contenus Web. Voici ces 3 types : 

##Page standard


Une page standard est généralement une page unique comme une publication de blog, un formulaire de **contact**, **une page d'erreur** etc. C'est le type de page le plus courant que vous allez créer. Par défaut, une page est considérée comme une page standard, à moins que vous en décidiez autrement.

Lorsque vous téléchargez et **installez** le paquet de **Base Grav** , vous êtes accueilli par une page standard. Nous avons traité de la création d'une page standard simple dans le *didacticiel de base.* 

##Page de liste

C'est vraiment une extension d'une page standard. Il s'agit d'une page standard qui fait référence à une collection de pages.

L'approche la plus simple pour configurer ceci est de créer des **pages enfants** en dessous de la page de sommaire. Un bon exemple de cela serait une page de listing de blog, où vous auriez une page affichant la liste récapitulative des messages publiés dans le blog qui existent en tant que pages d'enfant.

Il existe également des paramètres de configuration pour **contrôler l'ordre de la liste**, **limiter le nombre d'éléments**, indiquer si la **pagination** est activée ou non.

Info
Un exemple de Skeleton de Blog utilisant une page de listing est disponible dans Grav Downloads.

##Page modulaire

Une page modulaire est un type spécial de page d'inscription car elle crée réellement **une seule page** à partir de ses **pages enfants**. Cela permet de créer des mises en page très complexes d'une page à partir de pages de contenu modulaires plus petites. Ceci est réalisé en construisant la page modulaire à partir de plusieurs dossiers modulaires trouvés dans le dossier principal de la page.

Info
Un exemple de **One-Page Skeleton**, utilisant une page modulaire existe dans Grav Downloads .

Chacun de ces types de pages possède la même structure de base, alors avant d'entrer dans le détail de chacun des types, nous allons expliquer comment les pages en Grav sont construites.

Info
 Par ce qu'elle n'est destinée à faire partie d'une autre page, une page modulaire, n'est pas intrinsèquement directement accessible via une URL. Pour cette raison, toutes les pages modulaires sont par défaut définies comme non routables. 
 
 
#Dossiers

Toutes les pages de contenu sont situées dans le dossier /user/pages. Chaque page doit être placée dans son propre dossier.

Info
Les noms des dossiers doivent également avoir des dénominations valides. Les dénominations sont entièrement en minuscules, les caractères accentués sont remplacés par des lettres de l'alphabet anglais et les espaces remplacés par un tiret ou un trait de soulignement, afin d'éviter d'être encodés.

Grav comprend que toute valeur entière suivie d'une séquence est uniquement destinée à la hiérarchisation et la supprimera en interne dans le système. Par exemple, si vous avez un dossier nommé 01.home, Grav va considéré ce dossier comme étant la home, mais va s'assurer en raison de la numérotation par défaut, qu'il vienne bien avant 02.blog.
 
Votre site doit avoir un point d'entrée afin qu'il sache où aller lorsque vous pointez votre navigateur vers la racine de votre site. Par exemple, si vous devez entrer http://yoursite.com dans votre http://yoursite.com, par défaut, Grav s'attend à trouver un alias home/, mais vous pouvez passer outre en changeant l'emplacement du home.alias dans le *fichier de configuration Grav*.

Les **dossiers modulaires** sont identifiés par un underscore ( _ ) précédant le nom du dossier. Il s'agit d'un type de dossier spécial destiné à être utilisé uniquement avec un **contenu modulaire** . Ceux-ci ne sont **pas routables** et ne sont **pas visibles** dans la navigation. L'exemple d'un dossier modulaire serait user/pages/01.home/_header. Home est en fait configuré en tant que page modulaire et serait construite à partir des _header , _features et _body des pages modulaires .

Le nom textuel de chaque dossier est par défaut la dénomination utilisée par le système dans le cadre de l'URL. Par exemple, si vous avez un dossier tel que /user/pages/02.blog , le dénomination pour cette page serait par défaut le blog , et l'URL complète serait http://yoursite.com/blog . Une page d'article de blog, située dans /user/pages/02.blog/blog-item-5 serait accessible via http://yoursite.com/blog/blog-item-5 .

Si aucun numéro ne figure comme préfixe du nom du dossier, la page est considérée comme **invisible** et ne s'affichera pas dans la navigation. Un exemple de ceci serait la page **error** dans la structure de dossier ci-dessus. 
 
 Info
 Cela peut effectivement être contourné dans la page elle-même en réglant le *paramètre visible* dans le header.
 
 
 
#Ordre
Lorsqu'il s'agit de collections, plusieurs options sont disponibles pour contrôler comment les dossiers sont ordonnés. L'option la plus importante est définie dans le content.order.by de la page de configurtaion de réglages. Les options sont les suivantes:

Classement 	Détails
défaut 		Ordre basé sur le système de fichiers, c'est-à-dire 01.home avant 02.advark

titre 		Ordre est basé sur le titre tel que défini dans chaque page

nom de base Ordre est basé sur le dossier alphabétique sans ordre numérique

date		Ordre basé sur la date telle que définie dans chaque page

modifié 	Ordre basé sur le timestamp modifié de la page

dossier 	Ordre basé sur le nom du dossier avec n'importe quel préfixe numérique, 
			c'est-à-dire par exemple en enlevant le 01.

header.x 	Ordre basé sur n'importe quel champ d'en-tête de page, par ex. header.taxonomy.year. 				Cependant, un défaut peut être ajouté via un chemin, ex. header.taxonomy.year|2015

manuel 		Ordre basé sur la variable order_manual

aléatoire 	Ordre randomisé

Dans le réglage de configuration, vous pouvez définir spécifiquement un ordre manuel en configurant une liste d'options dans le fichier content.order.custom. Cela fonctionnera en conjonction avec le content.order.by.Les pages sont d'abord recherchées dans l'ordre manuel, mais toutes les pages qui n'y sont pas non spécifiées seront interrompues et chargées selon par le content.order.by fourni.

Info
Vous pouvez modifier le comportement **par défaut** de l'ordre des dossiers et le sens du classement en configurant les options dans pages.order.dir au niveau de la configuration du système Grav .

#Fichier de Page

##Fichier de page

Dans le dossier page, nous pouvons créer le fichier de page réel. Le nom de fichier doit se terminer par .md pour indiquer qu'il s'agit d'un fichier formaté Markdown. Techniquement, c'est un marquage avec YAML frontmatter, qui semble impressionnant mais n'est vraiment pas compliqué. Nous allons bientôt aborder les détails de la structure du fichier.

La chose importante à comprendre est que le nom du fichier sert directement de référence au nom du fichier modèle du thème qui sera utilisé pour le rendu. Par défaut,le nom standard du fichier modèle principal est **default**, donc le fichier sera nommé default.md.

Vous pouvez bien sûr nommer votre fichier comme vous souhaitez, par ex.: document.md, ce qui fera rechercher à Grav un fichier template correspondant, comme le template **document**.

Info
Ce comportement peut être annulé dans la page en réglant le *template parameter* dans les headers.

Un exemple de fichier de page peut ressembler à ceci: 
---
title: Page Title
taxonomy:
    category: blog
---
# Page Title

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porttitor eu
felis sed ornare. Sed a mauris venenatis, pulvinar velit vel, dictum enim. Phasellus
ac rutrum velit. **Nunc lorem** purus, hendrerit sit amet augue aliquet, iaculis
ultricies nisl. Suspendisse tincidunt euismod risus, _quis feugiat_ arcu tincidunt
eget. Nulla eros mi, commodo vel ipsum vel, aliquet congue odio. Class aptent taciti
sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque
velit orci, laoreet at adipiscing eu, interdum quis nibh. Nunc a accumsan purus.

Les paramètres entre la paire de marqueurs --- sont connus comme étant le  YAML frontmatter et  constituent les paramètres YAML basiques de la page.

Dans cet exemple, nous définissons explicitement le titre, ainsi que la taxonomie sur le **blog** afin que nous puissions le filtrer plus tard. Le contenu après le second --- est le contenu réel qui sera compilé et affiché comme HTML sur votre site. Il est écrit dans Markdown, qui sera traité en détail dans un futur chapitre. Sachez simplement que les marqueurs # , ** et _ signifient respectivement les emphases titre 1, gras et italique.

Info
Assurez-vous d'enregistre vos fichiers .md en tant que fichiers UTF8. Cela garantira leur fonctionnement avec des caractères spéciaux spécifiques à la langue. 


#Résumé Taille et séparateur

Il existe un paramétrage dans le fichier site.yaml permettant de définir une taille par défaut du résumé (en caractères) pouvant être utilisé via page.summary() afin d'afficher un résumé ou un synopsis de la page. Ceci est particulièrement utile pour les blogs où vous souhaitez avoir une liste contenant uniquement des informations récapitulatives et non le contenu de la page complète.

Par défaut, cette valeur est de 300 caractères. Vous le modifier dans votre fichier user/config/site.yaml, mais une approche encore plus utile consiste à utiliser le **séparateur de résumé manuel** également appelé **délimiteur de résumé** : === .

Il suffit de mettre dans votre contenu des lignes vierges au-dessus et au-dessous. Par exemple: 


Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat.

===

Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

Le texte situé au-dessus du séparateur sera utilisé lorsqu'il est référencé par page.summary() et le contenu de la page complète lorsqu'il est référencé par page.content().

Info
Lorsque vous utilisez page.summary(), la taille de résumé paramétrée sera utilisée si le séparateur n'est pas trouvé dans le contenu de la page. 


#Trouver d'autres pages

Grav dispose d'une fonctionnalité utile qui vous permet de trouver une autre page et d'effectuer des actions sur cette page. Cela peut être réalisé avec la méthode find() qui prend simplement la **route** et renvoie un nouvel objet page.

Cela vous permet d'effectuer une grande variété de fonctionnalités à partir de n'importe quelle page sur votre site Grav. Par exemple, vous voudrez peut-être fournir une liste de tous les projets en cours sur une page de détail particulière du projet: 



		# All Projects <ul> {% for p in page.find('/projects').children if p != page %} <li><a href=">{{p.url}}">{{ p.title }}</a></li> {% endfor %} </ul>


Dans la section suivante, nous continuerons à parcourir et approfondir les détails d'une page.


#ContentMeta

Le fait de référencer des pages et du contenu est simple, mais qu'en est-il du contenu qui n'est pas affiché en front-end avec le reste de la page?

Lorsque Grav lit le contenu de la page, il stocke ce contenu en cache. De cette façon, lorsque la page est à nouveau affichée, il n'est pas nécessaire de lire tout le contenu du fichier .md. Généralement, ce contenu est entièrement affiché en front-end. Cependant, il existe des cas où des données supplémentaires stockées aux côtés de la page du cache sont utiles.

C'est là que contentMeta() entre en jeu. Nous utilisons ContentMeta dans notre plugin *Shortcode* pour *récupérer des sections* à partir d'autres pages en utilisant des codes courts. Par exemple :

	<div id="author">{{ page.find('/my/custom/page').contentMeta.shortcodeMeta.shortcode.section.author }}</div>
	
Nous l'avons utilisé dans le Shortcode Core pour stocker les éléments CSS et JS nécessaires au shortcode de la page, mais cette fonctionnalité peut être utilisée pour stocker des données d'à peu près n'importe quelle structure dont vous avez besoin.