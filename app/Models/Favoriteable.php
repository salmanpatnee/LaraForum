<?php

namespace App\Models;

trait Favoriteable 
{
    public function favorites(){
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite(){
        $attributes = ['user_id' => auth()->id()];

        if($this->favorites()->where($attributes)->exists()) return false;
        
        return $this->favorites()->create($attributes);
    }

    public function isFavorited(){
        return !! $this->favorites->where('user_id', auth()->id())->count();
    }

    public function getFavoritesCountAttribute(){
        return $this->favorites->count();
    }

}
