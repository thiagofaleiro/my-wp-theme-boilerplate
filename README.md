## My Wordpress Theme Boilerplate

This is just the boilerplate I have used to code my wordpress projects.

Usually my workflow is to code all the project interfaces in the folder `_html`. When I finish all I split up the HTML base parts to the template base files like `header.php` and `footer.php`.

You will notice it doesn't contain all the wordpress template files like `archive.php`, `search.php` and etc. You can add them as you need.

The template uses [Grunt](https://gruntjs.com/) to compile the assets (but will use [Gulp](https://gulpjs.com/) soon) and has some PHP helper methods that I often use on projects.

Currently the theme uses:
* [SASS](http://sass-lang.com/) to build CSS;
* [Foundation for sites](http://foundation.zurb.com/sites.html) - usually I just use the grid.
* Javascript with **ES6 syntax and modules** which is transpiled as ES5 by [Babel](https://babeljs.io/); Also using [JShint](http://jshint.com/) to avoid compile JS with errors of syntax or event unused variables.
* [Bower](https://bower.io/) to install the libraries. (Should be changed to Yarn)


**Contents**

* [How to use](#how-to-use)
  * [Browser reload](#browser-reload)
* [SASS](#sass)
* [Javascript](#javascript)
* [Theme Functions](#theme-functions)


## How to use

First clone the repo inside your `themes` folder, rename to your theme name and go to the renamed folder:

```
git clone https://github.com/thiagofaleiro/my-wp-theme-boilerplate.git
mv my-wp-theme-boilerplate <theme-name>
cd <theme-name>
```

Now install the dependencies and libraries running:

```
npm instal
bower install
```

Finally run the server to compile the assets and watch your changes:
```
grunt
```

You can just compile the assets running `grunt build`.


### Browser reload

The command `grunt` will start the server on `localhost:9001` and open it in a new tab on your browser showing the theme root folder. You can click on `_html` folder and select the HTML file to show and it'll be reloaded on every change on files in the folders: `_html` and `assets/dev`.

When you start to code your PHP template files you can also get the brower reload using the [live reload chrome plugin](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=en), just click on the icon and the page will refresh when an asset has been changed.


## SASS

All files are using the sass syntax cause I prefer that instead of scss.

I'm using more and more fonts of icons (using [IconMoon App](https://icomoon.io/app/) to easily create it) instead of sprites. But if you want to use sprites, compass is configured to generate it for you. Just uncomment the **line 26** of the file `assets/sass/style.sass` and add some png icons in the folder `assets/images/icons`. Finally, use in your HTML (or sass files with `@extend`) the class `icon-my-png-file-name`.

> Note: If you uncomment this line and leave your icons folder empty your sass will stop compiling.


## Javascript

> I'll write here some explanations and tips about javascript soon.


## Theme Functions

The theme functions are splited on seveal files and a few folders.

### Folders and Base Files

**functions/_config**

Where you configure your `post_types` and `taxonomies`.

**functions/_endpoints**

Where you add your custom endpoints to fetch data via ajax calls.

**functions/_helpers**

All helper methods stored at the global object `$utils`.

**functions/basic_setup.php**

All theme setup to add some basic features (eg. post-thumbnails), register menus, allow editor users manage menus and more.

**functions/customize_admin.php**

Some editions on admin interface like styles of the login page and removing widgets on welcome page, just to get a cleaner interface to new users.

### Helper methods

All helper methods are accessed through the global object `$utils`.

**$utils->date_format**

Format date to given format and on a specific language. Use a valid format string accepted by the php method [strftime](http://php.net/manual/en/function.strftime.php)

```php
<?php
  // For the day August 19, 2017
  echo $utils->date_format( get_the_date(), , '%d de %B de %Y', 'pt_BR' );
  // prints: 19 de Agosto de 2017
?>
```


**$utils->body_classes**

Used on the `<body>` tag of the template. Today it returns only 2 classes `is-home` and `is-user-loged`.


**$utils->site_title**

Returns a rich title for `<title>` HTML tag. On pages the title will contain its ancestors, for example.

> More functions explanations soon.


## License

MIT
