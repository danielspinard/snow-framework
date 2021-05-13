<?php

namespace App\Models;

use Exception;
use CoffeeCode\DataLayer\DataLayer;
use Snow\Validator;

class PostModel extends DataLayer
{
    /**
     * DataLayer constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'posts',
            [
                'title', 'content'
            ], 
            'post_id',
            false
        );
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (
            !$this->validateTitle() 
            || !$this->validateContent() 
            || !parent::save()
        ) {
            return false;
        }
            
        return true;
    }

    /**
     * @return bool
     */
    private function validateTitle(): bool
    {
        $rules = ['min' => 5, 'max' => 50];

        if (!Validator::length($this->title, $rules['min'], $rules['max'])) {
            $this->fail = new Exception('The title of the post must contain between ' . $rules['min'] . ' and ' . $rules['max'] . ' characters!');
            return false;
        }

        if (!Validator::alphanum($this->title)) {
            $this->fail = new Exception('The title cannot contain special characters!');
            return false;
        }
        
        return true;
    }

    /**
     * @return bool
     */
    private function validateContent(): bool
    {
        $rules = ['min' => 5, 'max' => 255];

        if (!Validator::length($this->content, $rules['min'], $rules['max'])) {
            $this->fail = new Exception('The content of the post must contain between ' . $rules['min'] . ' and ' . $rules['max'] . ' characters!');
            return false;
        }

        return true;
    }
}
