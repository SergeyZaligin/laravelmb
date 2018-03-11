<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    /**
     * Используем трейт
     */
    use Sluggable;

    /**
     * Одна категория имеет много постов
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     * Автоматически переводит поле тайтл в уникальный вид привет->privet
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
