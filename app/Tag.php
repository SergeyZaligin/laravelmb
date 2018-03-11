<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    /**
     * Используем трейт
     */
    use Sluggable;

    /**
     * Связь многие ко многим
     * Params
     * 1. Таблица связи
     * 2. Текущий ид
     * 3. Связываемый ид
     * Связь позволит обращаться $tags->category->title 
     * и тп с (author,tags)
     */
    public function posts()
    {
        $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
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
