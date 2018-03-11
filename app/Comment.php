<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Связь комментария с пользователем
     */
    public function user()
    {
       return $this->hasOne(User::class);
    }

    /**
     * Связь комментария с постом
     */
    public function post()
    {
       return $this->hasOne(Post::class);
    }
}
