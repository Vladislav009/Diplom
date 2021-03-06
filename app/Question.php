<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'slug',
    	'title',
        'name',
    	'body',
        'isPublished',
    	'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

}
