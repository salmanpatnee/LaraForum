<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory, RecordsActivity;

    protected $guarded = [];
    
    protected  $with = ['owner', 'category'];

    protected static function boot(){
        parent::boot();

        static::addGlobalScope('replyCount', function($builder){
            $builder->withCount('replies');
        });

        static::deleting(function($thread){
            $thread->replies->each->delete();
        });

    }

    
    
    public function path(){
        return route('threads.show', ['category' => $this->category->slug, 'thread' => $this]);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function addReply($reply){
        $this->replies()->create($reply);
    }

    //Filter class
    public function scopeFilter($query, $filters){
        return $filters->apply($query);
    }
}
