<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    /**
     * Используем трейт
     */
    use Sluggable;

    /**
     * Пост имеет связь один к одному с категорией
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    /**
     * Пост имеет связь один к одному с автором(таблица юзер)
     */
    public function author()
    {
        $this->hasOne(User::class);
    }

    /**
     * Связь многие ко многим
     * Params
     * 1. Таблица связи
     * 2. Текущий ид
     * 3. Связываемый ид
     * Связь позволит обращаться $posts->category->title 
     * и тп с (author,tags)
     */
    public function tags()
    {
        $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
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
