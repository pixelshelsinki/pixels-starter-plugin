# Pixels Starter Plugin

This is the starter plugin for Pixels website projects that are built on WordPress.


## Tools and Technologies

This plugin uses the following:

* Composer for PHP dependencies
* PSR-4 autoloading

## Requirements

To install this plugin the server instance must have the following setup:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](http://php.net/manual/en/install.php) >= 7.1

To develop this theme you must also have the following:

* [Composer](https://getcomposer.org/download/)

## Plugin Installation

*Hopefully in a future update this will be automated in some way*

1. Download this repository as a ZIP (don't clone!).
2. Drop it into the theme folder of your WordPress installation and rename the folder to `<client or project name>-plugin`.
3. Open the theme in your favourite text editor.
4. Search `pixels-starter-plugin`and replace with `<client or project>-plugin` through the entire theme directory. This should be the same as the theme folder name name from step 2.
5. Search `ProjectName`and replace with PascalCased name of project through the entire theme directory. This ensures your plugin is using correct PHP namespacing.

## Plugin Development

To start developing do the following:

1. Run `composer install` in the folder. Even if you don't have Composer dependencies, this will handle Composer autoloading
2. Remove the parts you don't need. If you don't have crons, remove Cron files from `/lib`. Same with RestAPI
3. Insert Custom Post Types, Taxonomies and custom meta in `/lib/Model.php`. There are folders / namespaces for each of them with examples. You might want to use examples as base and just replace them.
4. Avoid fat controllers in Rest & Cron. Instead implement Service classes that you can utilize for providing and editing data.
