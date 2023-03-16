<?php

return [
    "name"=> "BLog",
    "title"=> "Blog Managment",
    "slug"=> "blog",
    "thumbnail"=> "https://img.site/p/300/160",
    "excerpt"=> "Blog Managment for Admin",
    "description"=> "Blog Managment for Admin",
    "download_link"=> "",
    "author_name"=> "blog",
    "author_website"=> "https://vaah.dev",
    "version"=> "0.0.1",
    "is_migratable"=> true,
    "is_sample_data_available"=> false,
    "db_table_prefix"=> "vh_blog_",
    "providers"=> [
        "\\VaahCms\\Modules\\BLog\\Providers\\BLogServiceProvider"
    ],
    "aside-menu-order"=> null
];
