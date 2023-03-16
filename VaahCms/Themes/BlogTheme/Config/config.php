<?php

return [
    "name"=> "BlogTheme",
    "title"=> "Blog Theme",
    "slug"=> "blogtheme",
    "thumbnail"=> "https://img.site/p/300/160",
    "excerpt"=> "Blog Theme with Auth Page",
    "description"=> "Blog Theme with Auth Page",
    "download_link"=> "",
    "author_name"=> "blogtheme",
    "author_website"=> "https://vaah.dev",
    "version"=> "v0.0.1",
    "is_migratable"=> true,
    "is_sample_data_available"=> false,
    "db_table_prefix"=> "vh_blogtheme_",
    "providers"=> [
        "\\VaahCms\\Themes\\BlogTheme\\Providers\\BlogThemeServiceProvider"
    ],
    "aside-menu-order"=> null
];
