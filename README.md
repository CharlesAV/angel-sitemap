Angel Sitemap
==============
This is a sitemap module for the [Angel CMS](https://github.com/CharlesAV/angel).

The module will create both a dynamic Sitemap page and XML file based upon what packages are loaded in your site.

Installation
------------
Add the following requirements to your `composer.json` file:
```javascript
"repositories":
[
	{
		"type": "vcs",
		"url": "https://github.com/CharlesAV/angel-sitemap"
	}
],
"require": {
	"angel/sitemap": "dev-master"
},
```

Issue a `composer update` to install the package.

Add the following service provider to your `providers` array in `app/config/app.php`:
```php
'Angel\Sitemap\SitemapServiceProvider'
```

Open up your `app/config/packages/angel/core/config.php` and add and the menu-linkable models to the `linkable_models` array:
```php
'linkable_models' => array(
	'Page'             => 'pages',
	'Sitemap'          => 'sitemap', // <--- Add this line
)
```
