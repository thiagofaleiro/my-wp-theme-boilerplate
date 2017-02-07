## My Wordpress Theme Boilerplate

This is just the boilerplate I have used to code my Wordpress projects.

Usually my workflow is to code all the project interfaces in the folder `_html`. When I finish I split up the HTML common parts on the template base files `header.php`, `footer.php` and `index.php`.

You will notice it doesn't contain all the Wordpress template files like `archive.php`, `search.php` and etc. You can add them as you need.

### Why do I use this boilerplate?

I use it because the following features:

* **Task runner** to easily compile assets. Today is [Grunt](https://gruntjs.com/) but I'll change to [Gulp](https://gulpjs.com/) soon.
* **Live reload**: the task runner also starts a server and watch assets changes to auto reload the page when I'm coding. Read more [here](#browser-reload).
* [SASS](http://sass-lang.com/) to speed up and organize your CSS styles. It also creates sprite automatically if you want.
* [Foundation for sites](http://foundation.zurb.com/sites.html) also is here to help, but usually I just use the grid system.
* **Javascript split up in diferent files**
  * By using **ES6 syntax and modules** which is transpiled as ES5 by [Babel](https://babeljs.io/);
  * [JShint](http://jshint.com/) to avoid compiling JS with syntax errors or even unused variables.
  * Gives better code maintainability.
* [Bower](https://bower.io/) to keep third party libs organized and updated. (Should be changed to Yarn)
* **Template functions.php** file split up in several files. This one is also very important to maintainability, especially when you have many custom functions and API endpoints, for example. Read more [here](#theme-functions).


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

The command `grunt` will start the server on `localhost:9001` and open it in a new tab on your browser showing the theme root folder. You can click on `_html` folder and select any HTML file. The task runner is watching the folders `_html` and `assets/dev`, so the HTML page will be reloaded whenever you change a file on these folders.

When you start to code your PHP template files you can also get the brower reload using the [live reload chrome plugin](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=en), just click on the icon and the page will refresh when an asset has been changed.


## SASS

All files are using the sass syntax cause I prefer that instead of scss.

I'm using more and more fonts of icons (using [IconMoon App](https://icomoon.io/app/) to easily create it) instead of sprites. But if you want to use sprites, compass is configured to generate it for you. Just uncomment the **line 26** of the file `assets/sass/style.sass` and add some png icons in the folder `assets/images/icons`. Finally, use in your HTML (or sass files with `@extend`) the class `icon-my-png-file-name`.

> Note: If you uncomment this line and leave your icons folder empty your sass will stop compiling.


## Javascript

> I'll write here some explanations and tips about javascript soon.


## Theme Functions

The theme functions are split up on seveal files and a few folders.

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
