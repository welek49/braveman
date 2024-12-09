# Startplate

## Table of contents

-   [Configuration](#configuration)
-   [Theme structure](#theme-structure)
-   [Conventions](#conventions)
    -   [Coding](#coding)
    -   [Repository](#repository)
-   [Website links](#website-links)
-   [Theme blocks](#theme-blocks)
    -   [archive-posts](#archive-posts)
    -   [button](#button)
    -   [buttons](#buttons)
    -   [columns](#columns)
    -   [column icon text](#column-icon-text)
    -   [column image text](#column-image-text)
    -   [container](#container)
    -   [faq](#faq)
    -   [hero page](#hero-page)
    -   [image slider](#image-slider)
    -   [img](#img)
    -   [link](#link)
    -   [partners list](#partners-list)
    -   [post columns](#post-columns)
    -   [row](#row)
    -   [section](#section)
    -   [testimonial slider](#testimonial-slider)
    -   [text](#text)
    -   [title](#title)
    -   [gallery](#gallery)
    -   [search custom post](#search-custom-post)
    -   [number tiles](#number-tiles)
    -   [services slider](#services-slider)
    -   [google map](#google-map)
    -   [person tile](#person-tile)
    -   [person slider](#person-slider)
    -   [hero slider](#hero-slider)
    -   [contact-list](#contact-list)
-   [Instructions for creating a demo](#instructions-for-creating-a-demo)
-   [TODO](#todo)
-   [Changelog](#useful-snippets-in-vsc)
## Configuration

- Set proper path in .github/workflows, create secret variables for CI/CD
- `npm i` - for installing all needed packages. (created on node version : v17.8.0)
- `npm run dev` - for running live server (on port: 3000), SCSS,JS compiler and images minifier.

## Theme structure

```
|                                # → Root of your theme
├── assets/                      # → Just assets
│   ├── font/                    # → Additional fonts, if needed
|   ├── img/                     # → Images before minification and conversion
├── dist/                        # → Built theme assets,styles and scripts - DO NOT EDIT
|   ├── css/                     # → Built css files
|   ├── img/                     # → Images after minification and conversion
|   ├── js/                      # → Built js files
├── github-templates/            # → Folder with useful github templates
|   ├── workflows/               # → ...
|   |   ├── main.yml             # → Template workflow to help you get started with actions - need to customization for the theme
├── inc/                         # → All PHP files used in fucnion.php
|   ├── blocks/                  # → Gutenberg blocks declarations
|   |   ├── blocks.php           # → Blocks registration - DO NOT EDIT
|   ├── blocks-unused/           # → Gutenberg blocks that are not used in current website
|   ├── config/                  # → Configuration of the theme
|   |   ├── acf-json/            # → Saved acf fields - DO NOT EDIT
|   |   ├── acf-setup.php        # → Advanced Custom Fields setup file - DO NOT EDIT
|   |   ├── assets.php           # → All assets enqueues - DO NOT EDIT
|   |   ├── theme-support.php    # → Theme setup with menus, widgets and other stuff - need to customization for the theme
|   ├── cpt/                     # → All custom posts and custom taxonomies
|   ├── custom/                  # → Helpers used in theme files
|   ├── shortcodes/              # → Shortcodes declarations
├── src/                         # → Dev scss and js files
|   ├── js/                      # → Dev js (one main JS file with modules)
|   |   ├── modules/             # → All js files imported into the main file
|   |   ├── main.js              # → Main js file
|   ├── scss/                    # → Dev scss (one separate SCSS file for front,admin panel and login page with multiple iported parts)
|   |   ├── custom/              # → All styles for custom elements
|   |   ├── navigation/          # → Parts of the navigation styles
|   |   ├── theme-pres/          # → Parts of demos, REMOVE if using for a client project
|   |   ├── _animations.scss     # → Bunch of animations used in the theme
|   |   ├── _buttons.scss        # → Styles for buttons - need to customization for the theme
|   |   ├── _custom-classes.scss # → Reusable classes, only used with this particular theme - empty at the start
|   |   ├── _extend-rules.scss   # → Styles that extend other classes - need to customization for the theme
|   |   ├── _footer.scss         # → Styles for footer - need to customization for the theme
|   |   ├── _grid.scss           # → Styles for grid - DO NOT EDIT
|   |   ├── _header.scss         # → Styles for header and navigation - need to customization for the theme
|   |   ├── _normalize.scss      # → Code normalization for basic elements on the website - DO NOT EDIT
|   |   ├── _responsive.scss     # → Mixins and breakpoints for responsive - DO NOT EDIT
|   |   ├── _shared-classes.scss # → Reusable classes, used between projects - RATHER DO NOT EDIT  if you really don't need to
|   |   ├── _typography.scss     # → Typography declaration - DO NOT EDIT
|   |   ├── _variables.scss      # → Variable declarations that are used everywhere else - need to customization for the theme
|   |   ├── admin-login.scss     # → Out BN styles for WP admin login - edit only if you need to change the appearance of the login panel
|   |   ├── editor-styles.scss   # → Styles for admin panel and Gutenberg blocks - edit only if you need add someting to admin panel by adding @import.
|   |   ├── main.scss            # → This is where all the needed scss files are imported - edit if you need add new custom SCSS files
├── tmp/                         # → Templates - all PHP files imported in other files
|   ├── admin-pages/             # → All pages included in admin panel
|   |   ├── instructions.php     # → Template usage instructions
|   ├── shared/                  # → All PHP files imported in other files BUT constant for all themes
|   |   ├── bn-popup.php         # → Popup window with cookies mechanism
|   |   ├── navigation.php       # → Navigation - need to customization for the theme
|   |   ├── pagination.php       # → Pagination for posts and custom posts
|   |   ├── symbols.php          # → Bunch of symbols(svg icons) - need to customization for the theme
├── screenshot.png               # → Theme cover - need to customization for the theme
├── style.css                    # → Theme information - need to customization for the theme
├── theme.json                   # → Theme information - set the colors palette to see them in ACF colorpicker, WP will generate presets from those colors which should be added to _variables.css
├── THE REST IS JUST CLASSIC WP THEME WITH GULP ETC.
```

## Conventions

### Coding

* CSS classes: **BEM**.
* SCSS variables: **snake_case**.
* PHP variables: **snake_case**.
* JS variables: **camelCase**.
* Comment your code - I recommend using a plugin - **Better Comments** with Visual Studio Code.
* Get data from acf fields at the **beginning of the file** - if possible
* Break code into small chunks, in **separate files**

### Repository

* Develop branch - integrated with the staging server (website address: [https://dev.bravenew.pl/website-name/](https://dev.bravenew.pl/website-name/)). After pushing changes to this branch, the changes will also be automatically implemented on the server. We do NOT push unfinished functionalities/views to this branch. After finishing work on a given topic, we send a pull request and report it to the person currently responsible for the project.
* To work on individual blocks/views/functionalities, we open separate branches, named after the given functionality we are currently working on. Only after we complete work on a particular topic and test it, we submit a pull request to the develop branch.

## Website links

> The project is based on Gutenberg.
* [Declaring blocks + using acf](https://www.advancedcustomfields.com/resources/blocks/)


> The theme saving acfs to json files, which, after adding changes to the develop branch, will appear in the dashboard. After they are synchronized, they will be available as active fields. Thanks to this, you do not have to add fields manually a second time on the server and we always have the current state of the fields in the repository.
* [Description of functionality](https://www.advancedcustomfields.com/resources/local-json/)


## Theme blocks

### archive posts
Add a list of posts or other custom posts in the form of columns with pagination.
### button
Add a single button to the page. You can use a buttons block where you can put multiple buttons.
### buttons
Add a container for your buttons.
### column
Use this block to add a column on the page that is used to lay out the content.
### container (wrapper)
Add a wrapper for other layout elements that you can later style together.
### faq
Add block with frequently asked questions.
### image slider
Add a slider with images.
### img
Add image to your website.
### link
Add a single link to the page.
### logotypes list
Add your logotypes in the form of a list with logos. Each logotype can be a link.
### post columns
Add a list of posts or other custom posts in the form of columns. Can also be added as a slider.
### row
Use this block to add a row on the page that is used to lay out the content.
### section
Use this block to add a section on the page that is used to lay out the content.
### testimonial slider
Add testimonials slider to your website.
### text
Add a advanced text block to your page.
### gallery
Add a gallery to your page.
### video
Add a embed video to your page.
### search custom post
Use this block to add an alphabetical list of custom posts elements. With search.
### number tiles
Use this block to add a couting numbers to your page.
### services slider
Use this block to add a slider with services(or something else).
### google map
Use this block to add a google map to your page.
### person tile
Use this block to add a person tile to  your page.
### person slider
Use this block to add a person slider to your page(need special custom post).
### hero slider
Use this block to add a hero slider to your page.
### contact list
Use this block to add a contact list to your page.

## Instructions for creating a demo
* Duplicate the scss/theme-press/build-template folder.Rename.
* Change the path to the demo in scss/main.scss
* Add demo styles.
## TODO
* add some demos
* find a better solution to manage js
* find a solution for adding blocks within a block, acting as repeaters (tabs with gallery case)
* divide styles into smaller chunks, for better reusability

## Useful snippets in VSC
Go to Code > Preferences > User Snippets > choose SCSS
"color shorthand": {
    "prefix": "color",
    "body": [
        "map-get(\\$colors, '$1');"
    ]
}

# Changelog
## Changes after Falcon project - 16.02.2024
1. [change] Title block deleted - we will use only text block to make it easier for enduser to edit texts styles
2. [new] Instructions in WP added, needs new images
3. [new] Styles and scripts for better columns displaying in editor added
4. [new] Admin styles added
5. [change] Colors logic changed - from now on we first add colors to theme.json, then we set those in variables.scss and then we use it to generate background and border classes automatically in every project
6. [fix] Section block fixed
7. [change] All blocks links in editor disabled
8. [change] A lot of smaller formatting changes added
9. [new] Map with indicators and locations added
# Changes during TTMS project - 04.03.2024
1. [new] Colors and background classes based on colors variable, check above usefull SCSS snippet
2. [new] List of blocks with previews added to instructions - it takes titles and descriptions from block.json and shows preview image
# Changes in the end of TTMS and 7rsa projects - 04.03.2024
1. [change] Instructions in WP developed, a lot of new content added, new screenshots added, blocks library finished
2. [deletion] Blocks deleted cause they are not used, problematic, not meeting our requirements:
- Title,
- Column with icon and text,
- Column with image and text,
- Hero page
3. New directiories:
- /inc/blocks-unused/ - move unused blocks here
- /assets/block-previews/ - add screenshots here, filename is based on block's "name" from block.json without prefix 'bn/', 
ex. "name": "bn/video" so filename is "video"
- /assets/img/instructions/ - screenshots for specific sections in instructions.php