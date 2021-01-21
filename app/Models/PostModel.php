<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class PostModel extends DataLayer
{
    public function __construct()
    {
        parent::__construct(
            "posts",
            [
                "title", "content"
            ], 
            "post_id",
            false
        );
    }

    public function save(): bool
    {
        if(
            !$this->validateTitle() 
            or !$this->validateContent() 
            or !parent::save()
        )

        return true;
    }

    private function validateTitle(): bool
    {
        if(
            strlen($this->title) > 5
            and strlen($this->title) < 50
        )
            return true;

        $this->fail = new Exception("The title of the post must contain between 5 and 50 characters!");
        return false;
    }

    private function validateContent(): bool
    {
        if(
            strlen($this->content) > 5
            and strlen($this->title) < 255
        )
            return true;

        $this->fail = new Exception("The content of the post must contain between 5 and 255 characters!");
        return false;
    }
}
