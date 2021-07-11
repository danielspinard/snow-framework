<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var string
     */
    protected $primaryKey = 'post_id';

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'content'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
