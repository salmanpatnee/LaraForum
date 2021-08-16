<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    use Favoriteable;

    protected $guarded = [];
    
    protected $with = ['owner', 'favorites'];

    // protected static function boot(){
    //     parent::boot();

    //     static::addGlobalScope('favoriteCount', function($builder){
    //         $builder->withCount('favorites');
    //     });
    // }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
