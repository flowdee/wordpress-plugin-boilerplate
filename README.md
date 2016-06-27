# WordPress Plugin Boilerplate

Here you can find the boilerplate I created and personally use in order to develop Open Source and premium WordPress plugins.

## Features

* Solid and tested base for plugin development 
* Integrated grunt workflow supporting LESS and JS compiling, text-domain checker (optional)
* Scripts: Loading CSS & JS files on your admin settings page & frontend
* Settings: Prepared settings page including a handful example fields
* Plugin Links: Prepared link to settings page and a custom URL via the plugins overview page
* Ready for translations

## Setup

### Placeholders

Due to the fact that I used placeholder names, prefixes and labels, you update some text strings and file names. Let's assume your plugin will be called "Jumping Donut":

* Search for: `Plugin Name` and replace with: `Jumping Donut`
* Search for: `Plugin_Name` and replace with: `Jumping_Donut`
* Search for: `PLUGIN_NAME` and replace with: `JUMPING_DONUT`
* Search for: `plugin_name` and replace with: `jumping_donut`
* Search for: `plugin-name` and replace with: `jumping-donut`
* Search for: `plugin_prefix` and replace with: `jd_` _(This will be used for prefixing functions and I suggest using an unique and shorter one)_

Additionally please take a look into the plugin files and replace those as well:
* Search for: `plugin-name` and replace with: `jumping-donut`

_In case I missed some placeholders, please gimme a shout._

### Assets (CSS & Javascript)

#### Variant 1: Grunt (LESS, Uglify etc.)
In case you want to use the grunt workflow simply execute the following commands via your console:

``` php
// Installing dependencies
npm install

// Run watcher while developing and updating less/js files
grunt watch

// Finish the work and generating the zip file of the plugin
grunt finish
```

#### Variant 2: Default editing
If you don't want to use grunt, just edit the CSS/JS files under `/plugin-name/assets/...` on your own.

### Credits

This WordPress Plugin Boilerplate was developed by [flowdee](http://flowdee.de/). 

You like my work? [Support me](https://donate.flowdee.de/) or not. I don't mind, as long as I was able to help you :wink:
