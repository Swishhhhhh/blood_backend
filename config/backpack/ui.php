<?php

return [

    // IMPORTANT NOTE: The configurations here get overriden by theme config files.
    //
    // Eg. If you're using theme-tabler and config/backpack/theme-tabler.php
    // has "breadcrumbs" set as false, then THAT value will be used instead
    // of the value in this file.

    /*
    |--------------------------------------------------------------------------
    | Theme (User Interface)
    |--------------------------------------------------------------------------
    */
    // Change the view namespace in order to load a different theme than the one Backpack provides.
    // You can create child themes yourself, by creating a view folder anywhere in your resources/views
    // and choosing that view_namespace instead of the default one. Backpack will load a file from there
    // if it exists, otherwise it will load it from the fallback namespace.

    'view_namespace' => 'backpack.theme-coreuiv2::',
    'view_namespace_fallback' => 'backpack.theme-coreuiv2::',

    /*
    |--------------------------------------------------------------------------
    | Look & feel customizations
    |--------------------------------------------------------------------------
    |
    | To make the UI feel yours.
    |
    | Note that values set here might be overriden by theme config files
    | (eg. config/backpack/theme-tabler.php) when that theme is in use.
    |
    */

    // Date & Datetime Format Syntax: https://carbon.nesbot.com/docs/#api-localization
    'default_date_format' => 'D MMM YYYY',
    'default_datetime_format' => 'D MMM YYYY, HH:mm',

    // Direction, according to language
    // (left-to-right vs right-to-left)
    'html_direction' => 'ltr',

    'classes' => [

        'header' => 'app-header bg-dark border-0 navbar',
        // For background colors use: bg-dark, bg-primary, bg-secondary, bg-danger, bg-warning, bg-success, bg-info, bg-blue, bg-light-blue, bg-indigo, bg-purple, bg-pink, bg-red, bg-orange, bg-yellow, bg-green, bg-teal, bg-cyan, bg-white
        // For links to be visible on different background colors use: "navbar-dark", "navbar-light", "navbar-color"

        'body' => 'app aside-menu-fixed sidebar-lg-show',
        // Try sidebar-hidden, sidebar-fixed, sidebar-compact, sidebar-lg-show

        'sidebar' => 'sidebar sidebar-pills bg-dark',
        // Remove "sidebar-transparent" for standard sidebar look
        // Try "sidebar-light" or "sidebar-dark" for dark/light links
        // You can also add a background class like bg-dark, bg-primary, bg-secondary, bg-danger, bg-warning, bg-success, bg-info, bg-blue, bg-light-blue, bg-indigo, bg-purple, bg-pink, bg-red, bg-orange, bg-yellow, bg-green, bg-teal, bg-cyan

        'footer' => 'app-footer bg-dark',
        // hide it with d-none
        // change background color with bg-dark, bg-primary, bg-secondary, bg-danger, bg-warning, bg-success, bg-info, bg-blue, bg-light-blue, bg-indigo, bg-purple, bg-pink, bg-red, bg-orange, bg-yellow, bg-green, bg-teal, bg-cyan, bg-white

    ],

    // ----
    // HEAD
    // ----

    // Project name - shown in the window title
    'project_name' => 'UnlimitedBlood',

    // Content of the HTML meta robots tag to prevent indexing and link following
    'meta_robots_content' => 'noindex, nofollow',

    // ------
    // HEADER
    // ------

    // When clicking on the admin panel's top-left logo/name,
    // where should the user be redirected?
    // The string below will be passed through the url() helper.
    // - default: '' (project root)
    // - alternative: 'admin' (the admin's dashboard)
    'home_link' => '',

    // Menu logo. You can replace this with an <img> tag if you have a logo.
    // src is in resources/img/logo.png
    //'project_logo' => '<img src="images/logo.png" alt="Logo" style="width: auto; height: auto;">',
    'project_logo' => '<b>Unlimited</b>Blood',

    // Show / hide breadcrumbs on admin panel pages.
    'breadcrumbs' => false,

    // ------
    // FOOTER
    // ------

    // Developer or company name. Shown in footer.
    'developer_name' => 'Siddhartha Tulahar',

    // Developer website. Link in footer. Type false if you want to hide it.
    'developer_link' => 'https://github.com/sidtuladhar',

    // Show powered by Laravel Backpack in the footer? true/false
    'show_powered_by' => false,

    // ---------
    // DASHBOARD
    // ---------

    // Show "Getting Started with Backpack" info block?
    'show_getting_started' => env('APP_ENV') == 'false',

    // -------------
    // GLOBAL STYLES
    // -------------

    // CSS files that are loaded in all pages, using Laravel's asset() helper
    'styles' => [
        // 'styles/example.css',
        // 'https://some-cdn.com/example.css',
    ],

    // CSS files that are loaded in all pages, using Laravel's mix() helper
    'mix_styles' => [ // file_path => manifest_directory_path
        // 'css/app.css' => '',
    ],

    // CSS files that are loaded in all pages, using Laravel's @vite() helper
    // Please note that support for Vite was added in Laravel 9.19. Earlier versions are not able to use this feature.
    'vite_styles' => [ // resource file_path
        // 'resources/css/app.css' => '',
    ],

    // --------------
    // GLOBAL SCRIPTS
    // --------------

    // JS files that are loaded in all pages, using Laravel's asset() helper
    'scripts' => [
        // 'js/example.js',
        // 'https://unpkg.com/vue@2.4.4/dist/vue.min.js',
        // 'https://unpkg.com/react@16/umd/react.production.min.js',
        // 'https://unpkg.com/react-dom@16/umd/react-dom.production.min.js',
    ],

    // JS files that are loaded in all pages, using Laravel's mix() helper
    'mix_scripts' => [ // file_path => manifest_directory_path
        // 'js/app.js' => '',
    ],

    // JS files that are loaded in all pages, using Laravel's @vite() helper
    'vite_scripts' => [ // resource file_path
        // 'resources/js/app.js',
    ],

];
