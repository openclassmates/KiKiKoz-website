---
title: Collections de Pages
taxonomy:
    category: docs
---

Le nombre de collections a considérablement augmenté depuis les débuts de Grav. Nous avons commencé avec un jeu très limité de collections basées sur des pages, mais avec l'aide de notre communauté, nous avons augmenté leurs capacités pour les rendre encore plus puissantes! À tel point qu'elles ont maintenant leur propre section dans la documentation.

## Fondamentaux au sujet des collections de Grav

Dans Grav, le type de collection le plus courant est une liste de pages qui peuvent être définies soit dans le l'en-tête de la page, soit dans le Twig lui-même. Le plus courant est de définir une collection dans l'en-tête. Une fois la collection définie, elle est disponible à la demande dans le modèle Twig de la page en cours. En utilisant des méthodes de collecte de page ou en bouclant sur chaque [objet page](https://learn.getgrav.org/themes/theme-vars#page-object) (TODO: mettre à jour avec le lien sur la doc en français) et en utilisant les méthodes ou les propriétés de la page, vous pouvez faire des choses puissantes. Des exemples classiques incluent l'affichage d'une liste de messages de blog ou l'affichage de sous-pages modulaires pour permettant la conception de pages complexes.

## Objet Collection

Lorsque vous définissez une collection dans l'en-tête de la page, vous créez dynamiquement une [collection Grav](https://github.com/getgrav/grav/blob/develop/system/src/Grav/Common/Page/Collection.php) (TODO: mettre à jour avec le lien en fr) qui sera disponible dans la page Twig. Cet objet Collection est **iterable** et peu être traité comme un **tableau**, ce qui permet de réaliser des opérations telles que: 

```
{{ dump(page.collection[page.path]) }}
```

## Example de définition d'une collection

Voici un exemple de collection définie dans l'en-tête de la page:

```
content:
    items: '@self.children'
    order:
        by: date
        dir: desc
    limit: 10
    pagination: true
```

Dans l'en-tête de la page, content.items indeique à Grav comment la collection doit être construite en rassemblant les éléments et informations qui ont été passés.

Cet exemple de définition crée une collection pour la page concernée, composée de toutes les **pages enfants** classées par **date décroissante** avec une **pagination** montrant **10 éléments** par page.

## Accès aux collections dans Twig

Lorsque cette collection est définie dans l'en-tête de la page, Grav crée une collection **page.collection** à laquelle vous pouvez accéder depuis un modèle Twig à l'aide du code suivant:

```
{% for p in page.collection %}
<h2>{{ p.title }}</h2>
{{ p.summary }}
{% endfor %}
```

Ce code boucle simplement sur les [pages](https://learn.getgrav.org/themes/theme-vars#page-object) (TODO: remplacer le lien avec la version fr) de la collection et affiche le titre de la page ainsi que le résumé.

## En-tête définissant la collection

Un certain nombre de variables peuvent être utilisées afin d'indiquer à Grav que la page spécifique doit être une page de listes et contenir des pages-enfants:

### Résumé des options pour une collection

Chaîne | Résultats 
-------|------------
'@root'| Obtenir l'enfants à la racine 
'@root.children' | Obtenir les enfants à la racine (alternative) 
'@root.descendants'| Obtenir récursivement tous les descendants à partir de la racine
       |                              
'@self.parent'| Obtenir le parent de la page courante 
'@self.siblings' | Obtenir une collection de toutes les autres pages au même niveau 
'@self.modular' | Obtenir tous les enfants modulaires 
'@self.children' | Obtenir tous les enfants non-modulaires 
'@self.descendants' | Obtenir récursivement tous les descendants non-modulaires
      |
'@page': '/fruit' | Obtenir tous les enfants de la page `/fruit`
'@page.children': '/fruit' | Alternative à l'entrée ci-dessus 
'@page.self': '/fruit' | Obtenir une collection avec la page fruit `/fruit` uniquement 
'@page.page': '/fruit' | Alternative à l'entrée ci-dessus 
'@page.descendants': '/fruit' | Obtenir et parcourir récursivement tous les descendants de la page `/fruit`
'@page.modular': '/fruit' | Obtenir une collection de toutes les sous-pages modulaires de `/fruit`
        |  
'@taxonomy.tag': photography | taxonomie avec tag=`photography`
'@taxonomy': {tag: birds, category: blog} | taxonomie avec tag=`birds` && category=`blog` 

! Ce document décrit l'utilisation de `@page`, `@taxonomy.category`, etc, mais un format alternatif plus sûr par rapport à YAML est `page@`, `taxonomy@.category`. Toutes les commandes @ peuvent être écrites soit au format préfixé ou postfixé.

Nous oborderons cela plus en détails.

## Collections partant de la racine (root)

##### @root - Enfants de premier niveau

Cette notation peut être utilisée pour récupérer les enfant non-modulaires **publiés** au premier niveau sous la racine du site. C'est particulièrement utile pour obtenir les éléments composant par exemple la navigation principale:

```ruby
content:
    items: '@root'
```

an alias is also valid:

```ruby
content:
    items: '@root.children'
```

##### @root - Enfants de premier niveau + tous leurs descendants

Cela permettra d'atteindre, par une navigation récursive, toutes les pages de votre site, en descendant à partir de la page racine, en créant une collection de **tous** les **enfants non-modulaires publiés**.

```ruby
content:
    items: '@root.descendants'
```

## Collections partant de la page courante (self)

##### @self.children - Enfants de la page courante

Permet d'énumérer les **enfants non-modulaires publiés** de la page courante:

```ruby
content:
    items: '@self.children'
```

##### @self.descendants - Enfants non-modulaires publiés de la page courante

À l'instar de `.children`, la collection `.descendants` permet de récupérer tous les **enfants non-modulaires publiés**, mais poursuit la récupération de manière récursive sur tous leurs enfants.

```ruby
content:
    items: '@self.descendants'
```

##### @self.modular - Enfants modulaires de la page courante

A l'inverse de `.childre`, cette méthode récupère uniquement les **enfants modulaires publiés** de la page actuelle (`_features`, `_showcase`, etc.)

```ruby
content:
    items: '@self.modular'
```

##### @self.parent - La page-parent de la page courante

Il s'agit d'une collection spéciale, car elle retournera toujous l'unique parent de la page courante.

```ruby
content:
    items: '@self.parent'
```

##### @self.siblings - Toutes les pages de même niveau

Cette collection rassemblera toutes les pages publiées au même niveau que celui de la page courante, à l'exclusion de la page courante elle-même.

```ruby
content:
    items: '@self.siblings'
```

## Collections partout d'une page spécifique

##### @page or @page.children - Collection d'enfants à partir d'une page spécifique

Cette collection prend en argument le slug d'une page et renvoit tous les enfants non-modulaires publiés de cette page.

```ruby
content:
    items:
      '@page': '/blog'
```

De manière alternative:

```ruby
content:
    items:
      '@page.children': '/blog'
```

##### @page.self or @page.page - Collection comprenant uniquement la page spécifique

Cette collection prend comme argument le slug d'une page et renvoie la collection contenant uniquement cette page (si elle est **publiée et non-modulaire**)

```ruby
content:
    items:
      '@page.self': '/blog'
```

##### @page.descendants - Collection des enfants + tous les descendants d'une page spécifique

Cette collection prend comme argument le slug d'une page et renvoit tous les enfants **non-modulaires publiés** et tous leurs descendants obtenus de manière récursive.

```ruby
content:
    items:
      '@page.descendants': '/blog'
```

##### @page.modular - Collection des enfants modulaires d'une page spécifique

Cette collection prend comme argument le slug d'une page et renvoit tous les enfants **modulaires publiés** de cette page.

```ruby
content:
    items:
      '@page.modular': '/blog'
```


## Collections relatives aux taxonomies

```ruby
content:
   items:
      '@taxonomy.tag': foo
```

En utilisant l'option `@taxonomy`, vous pouvez utiliser la puissance de la fonctionnalité de taxonomie de Grav. C'est là que la variable de `taxonomy` du [fichier de configuration du site](../../basics/grav-configuration#site-configuration) (TODO: mettre à jour le lien vers la version fr) entre en jeu. La taxonomie **doit** être définie dans ce fichier de configuration pour que Grav puisse interpréter une référence de page comme valide.

En configurant @taxonomy.tag: foo, Grav trouve toutes les **pages publiées** dans le dossier /user/pages qui comportent le tag: foo dans leur variable de taxonomie. 

```ruby
content:
    items:
       '@taxonomy.tag': [foo, bar]
```

La variable `content.items` peut prendre la forme d'un tableau de taxonomies et qui rassemble toutes les pages qui satisfont ces règles. Les pages publiées possédant **à la fois** lés étiquettes foo et bar seront collectées. Le chapitre sur la [Taxonomie](../taxonomie) (TODO: mettre à jour le lien) abordera plus en détails ce concept.
The `content.items` variable can take an array of taxonomies and it will gather up all pages that satisfy these rules. Published pages that have **both** `foo` **and** `bar` tags will be collected.  The [Taxonomy](../taxonomy) chapter will cover this concept in more detail.

!! If you wish to place multiple variables inline, you will need to separate sub-variables from their parents with `{}` brackets. You can then separate individual variables on that level with a comma. For example: `@taxonomy: {category: [blog, featured], tag: [foo, bar]}`. In this example, the `category` and `tag` sub-variables are placed under `@taxonomy` in the hierarchy, each with listed values placed within `[]` brackets. Pages must meet **all** these requirements to be found.

If you have multiple variables in a single parent to set, you can do this using the inline method, but for simplicity, we recommend using the standard method. Here is an example.

```ruby
content:
  items:
    '@taxonomy':
      category: [blog, featured]
      tag: [foo, bar]
```

Each level in the hierarchy adds two whitespaces before the variable. YAML will allow you to use as many spaces as you want here, but two is standard practice. In the above example, both the `category` and `tag` variables are set under `@taxonomy`.

### Complex Collections

With Grav **0.9.41** you can now provide multiple complex collection definitions and the resulting collection will be the sum of all the pages found from each of the collection definitions.

for example:

```ruby
content:
  items:
    - '@self.children'
    - '@taxonomy':
         category: [blog, featured]
```

### Ordering Options

```ruby
content:
    order:
        by: date
        dir: desc
    limit: 5
    pagination: true
```

Ordering of sub-pages follows the same rules as ordering of folders, the available options are:

| Ordering     | Details                                                                                                                                            |
| :----------  | :----------                                                                                                                                        |
| **default**    | The order based on the file system, i.e. `01.home` before `02.advark`                                                                              |
| **title**      | The order is based on the title as defined in each page                                                                                            |
| **basename**   | The order is based on the alphabetic folder name after it has been processed by the `basename()` PHP function                                      |
| **date**       | The order based on the date as defined in each page                                                                                                |
| **modified**   | The order based on the modified timestamp of the page                                                                                              |
| **folder**     | The order based on the folder name with any numerical prefix, i.e. `01.`, removed                                                                  |
| **header.x**   | The order based on any page header field. i.e. `header.taxonomy.year`. Also a default can be added via a pipe. i.e. `header.taxonomy.year|2015`    |
| **manual**     | The order based on the `order_manual` variable                                                                                                     |
| **random**     | The order is randomized                                                                                                                            |
| **custom**     | The order is based on the `content.order.custom` variable                                                                                                                             |
| **sort_flags** | Allow to override sorting flags for page header-based or default ordering. If the `intl` PHP extension is loaded, only [these flags](https://secure.php.net/manual/en/collator.asort.php) are available. Otherwise, you can use the PHP [standard sorting flags](https://secure.php.net/manual/en/array.constants.php). |

The `content.order.dir` variable controls which direction the ordering should be in. Valid values are either `desc` or `asc`.

```ruby
content:
    order:
        by: default
        custom:
            - _showcase
            - _highlights
            - _callout
            - _features
    limit: 5
    pagination: true
```

In the above configuration, you can see that `content.order.custom` is defining a **custom manual ordering** to ensure the page is constructed with the **showcase** first, **highlights** section second etc. Please note that if a page is not specified in the custom ordering list, then Grav falls back on the `content.order.by` for the unspecified pages.

If a page has a custom slug, you must use that slug in the `content.order.custom` list.

The `content.pagination` is a simple boolean flag to be used by plugins etc to know if **pagination** should be initialized for this collection. `content.limit` is the number of items displayed per-page when pagination is enabled.

### Date Range

New as of **Grav 0.9.13** is the ability to filter by a date range:

```
content:
    items: '@self.children'
    dateRange:
        start: 1/1/2014
        end: 1/1/2015
```

You can use any string date format supported by [strtotime()](http://php.net/manual/en/function.strtotime.php) such as `-6 weeks` or `last Monday` as well as more traditional dates such as `01/23/2014` or `23 January 2014`. The dateRange will filter out any pages that have a date outside the provided dateRange.  Both **start** and **end** dates are optional, but at least one should be provided.

### Multiple Collections

When you create a collection with `content: items:` in your YAML, you are defining a single collection based on a several conditions.  However, Grav does let you create an arbitrary set of collections per page, you just need to create another one:

```
content:
    items: '@self.children'
    order:
        by: date
        dir: desc
    limit: 10
    pagination: true

fruit:
    items:
       '@taxonomy.tag': [fruit]
```

This sets up **2 collections** for this page, the first uses the default `content` collection, but the second one defines a taxonomy-based collection called `fruit`.  To access these two collections via Twig you can use the following syntax:

```
{% set default_collection = page.collection %}

{% set fruit_collection = page.collection('fruit') %}
```

## Collection Object Methods

Standard methods Iterable methods include:

* `Collection::append($items)` - Add another collection or array
* `Collection::first()` - Get the first item in the collection
* `Collection::last()` - Get the last item in the collection
* `Collection::random($num)` - Pick `$num` random items from the collection
* `Collection::reverse()` - Reverse the order of the collection
* `Collection::shuffle()` - Randomize the entire collection
* `Collection::slice($offset, $length)` - Slice the list

Also has several useful Collection-specific methods:

* `Collection::addPage($page)` - You can append another page to this collection.
* `Collection::copy()` - Creates a copy of the current collection
* `Collection::current()` - gets the current item in the collection
* `Collection::key()` - Returns the current slug of the the current item
* `Collection::remove($path)` - Removes a specific page in the collection, or current if `$path = null`
* `Collection::order($by, $dir, $manual)` - Orders the current collection
* `Collection::isFirst($path)` - Determines if the page identified by path is first
* `Collection::isLast($path)` - Determines if the page identified by path is last
* `Collection::prevSibling($path)` - Returns the previous sibling page if possible
* `Collection::nextSibling($path)` - Returns the next sibling page if possible
* `Collection::currentPosition($path)` - Returns the current index
* `Collection::dateRange($startDate, $endDate, $field)` - Filters the current collection with dates
* `Collection::visible()` - Filters the current collection to include only visible pages
* `Collection::nonVisible()` - Filters the current collection to include only non-visible pages
* `Collection::modular()`  - Filters the current collection to include only modular pages
* `Collection::nonModular()` - Filters the current collection to include only non-modular pages
* `Collection::published()` - Filters the current collection to include only published pages
* `Collection::nonPublished()` - Filters the current collection to include only non-published pages
* `Collection::routable()` - Filters the current collection to include only routable pages
* `Collection::nonRoutable()` - Filters the current collection to include only non-routabe pages
* `Collection::ofType($type)` - Filters the current collection to include only pages where template = `$type`.
* `Collection::ofOneOfTheseTypes($types)` - Filters the current collection to include only pages where template is in the array `$types`.
* `Collection::ofOneOfTheseAccessLevels($levels)` - Filters the current collection to include only pages where page access is in the array of `$levels`

Here is an example taken from the **Learn2** theme's **docs.html.twig** that defines a collection based on taxonomy (and optionally tags if they exist) and uses the `Collection::isFirst` and `Collection::isLast` methods to conditionally add page navigation:

```ruby
{% set tags = page.taxonomy.tag %}
{% if tags %}
    {% set progress = page.collection({'items':{'@taxonomy':{'category': 'docs', 'tag': tags}},'order': {'by': 'default', 'dir': 'asc'}}) %}
{% else %}
    {% set progress = page.collection({'items':{'@taxonomy':{'category': 'docs'}},'order': {'by': 'default', 'dir': 'asc'}}) %}
{% endif %}

{% block navigation %}
        <div id="navigation">
        {% if not progress.isFirst(page.path) %}
            <a class="nav nav-prev" href="{{ progress.nextSibling(page.path).url }}"> <i class="fa fa-chevron-left"></i></a>
        {% endif %}

        {% if not progress.isLast(page.path) %}
            <a class="nav nav-next" href="{{ progress.prevSibling(page.path).url }}"><i class="fa fa-chevron-right"></i></a>
        {% endif %}
        </div>
{% endblock %}
```

`nextSibling()` is up the list and `prevSibling()` is down the list, this is how it works:
```
Assuming you have the pages:
    Project A
    Project B
    Project C
You are on Project A, the previous page is Project B.
If you are on Project B, the previous page is Project C and next is Project A
```

## Programmatic Collections

You can take full control of collections directly from PHP in Grav plugins, themes, or even from Twig.  This is a more hard-coded approach compared to defining them in your page frontmatter, but it also allows for more complex and flexible collections logic.

### PHP Collections

You can perform advanced collection logic with PHP, for example:

```
$collection = new Collection();
$collection->setParams(['taxonomies' => ['tag' => ['dog', 'cat']]])->dateRange('01/01/2016', '12/31/2016')->published()->ofType('blog-item')->order('date', 'desc');

$titles = [];

foreach ($collection as $page) {
    $titles[] = $page->title();
}
```

You can also use the same `evaluate()` method that the frontmatter-based page collections make use of:

```
$page = Grav::instance()['page'];
$collection = $page->evaluate(['@page.children' => '/blog', '@taxonomy.tag' => 'photography']);
$ordered_collection = $collection->order('date', 'desc');
```

You can also do similar directly in **Twig Templates**:

```
{% set collection = page.evaluate([{'@page.children':'/blog', '@taxonomy.tag':'photography'}]) %}
{% set ordered_collection = collection.order('date','desc') %}
```

#### Advanced Collections

By default when you call `page.collection()` in the Twig of a page that has a collection defined in the header, Grav looks for a collection called `content`.  This allows the ability to define [multiple collections](#multiple-collections), but you can even take this a step further.

If you need to programatically generate a collection, you can do so by calling `page.collection()` and passing in an array in the same format as the page header collection definition.  For example:

```
{% set options = { items: {'@page.children': '/my/pages'}, 'limit': 5, 'order': {'by': 'date', 'dir': 'desc'}, 'pagination': true } %}
{% set my_collection = page.collection(options) %}

<ul>
{% for p in my_collection %}
<li>{{ p.title }}</li>
{% endfor %}
</ul>
```

