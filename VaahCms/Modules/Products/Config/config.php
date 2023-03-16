<?php

return [
    "name"=> "Products",
    "title"=> " Product Managment ",
    "slug"=> "products",
    "thumbnail"=> "https://img.site/p/300/160",
    "excerpt"=> "Product Managment Module for Admin (or Seller)",
    "description"=> "Product Managment Module for Admin (or Seller)",
    "download_link"=> "",
    "author_name"=> "products",
    "author_website"=> "https://vaah.dev",
    "version"=> "0.0.1",
    "is_migratable"=> true,
    "is_sample_data_available"=> false,
    "db_table_prefix"=> "vh_products_",
    "providers"=> [
        "\\VaahCms\\Modules\\Products\\Providers\\ProductsServiceProvider"
    ],
    "aside-menu-order"=> null
];
