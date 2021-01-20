<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class PostModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct(
            "posts", //string "TABLE_NAME"
            [
                "title", "content" // array "REQUIRED_FIELD"
            ], 
            "post_id", // string "PRIMARY_KEY"
            false // bool "TIMESTAMPS"
        );
    }
}
