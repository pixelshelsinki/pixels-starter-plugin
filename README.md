# Pixels Starter Plugin

This is the starter plugin for Pixels website projects that are built on WordPress.

## Issues, improvements and these instructions.

Please read the documentation below before using. **If things are not clear or you find a mistake, or simply a way to improve the theme, please submit an issue or pull request.**

## Tools and Technologies

This plugin uses the following:

* Composer for PHP dependencies
* PSR-4 autoloading

## Requirements

To install this plugin the server instance must have the following setup:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](http://php.net/manual/en/install.php) >= 7.1
* [Advanced Custom Fields](https://www.advancedcustomfields.com/) if you use meta fields.
* If you're using options pages, then [ACF Pro](https://www.advancedcustomfields.com/pro/)

To develop this theme you must also have the following:

* [Composer](https://getcomposer.org/download/)

## Plugin Installation

*Hopefully in a future update this will be automated in some way*

1. Download this repository as a ZIP (don't clone!).
2. Drop it into the plugins folder of your WordPress installation and rename the folder to `<client or project name>-plugin`.
3. Open the theme in your favourite text editor.
4. Search `pixels-starter-plugin`and replace with `<client or project>-plugin` through the entire theme directory. This should be the same as the theme folder name name from step 2.
5. Search `ProjectName`and replace with PascalCased name of project through the entire theme directory. This ensures your plugin is using correct PHP namespacing.
6. Run `composer install` in the folder. Even if you don't have Composer dependencies, this will handle Composer autoloading

## Plugin Development

To start developing do the following:

1. Remove the parts you don't need. If you don't have crons, remove Cron files from `/lib`. Same with RestAPI
2. Insert Custom Post Types, Taxonomies and custom meta in `/lib/Model.php`. There are folders / namespaces for each of them with examples. You might want to use examples as base and just replace them.
3. Create helpers and services you need. Avoid fat controllers in Rest & Cron. Instead implement Service classes that you can utilize for providing and editing data.

## Post Types and Taxonomies

Plugins contains examples on Post Type and Taxonomy creations. Both extend abstract parent classes that do all the heavy lifting.

- For Post Types, use `/lib/Model/PostTypes/Example.php` as starting point.
- For Taxonomies, use `/lib/Model/Taxonomies/ExampleTaxonomy.php` as starting point

Minimal implementation: just replace "Example" with your post type or taxonomy. The classes have couple of options for creating labels:

1. Default: just add CPT / Tax slug & name. Labels are automatically generated based on that. Uses Symony Inflector for handling singular / plural forms of name.
2. Semimanual: enable constant `TRANSLATE_LABELS`, manually insert gettext() wrapped singular and plural names of CPT / Tax. Labels will be geneted in translatable form using these two words.
3. Completely manual: use define_labels() method to write all labels by hand. Disable the label checks in constructor.
