<?php

namespace App\Models;

use App\Notifications\ThreadWasUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory, RecordsActivity;

    protected $guarded = [];
    
    protected  $with = ['owner', 'category'];

    protected $appends = ['isSubscribedTo'];

    protected static function boot(){
        parent::boot();

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
        $reply = $this->replies()->create($reply);

        foreach($this->subscriptions as $subscription){

            if($subscription->user_id == $reply->user_id) return;
            
            $subscription->user->notify(new ThreadWasUpdated($this, $reply));
            
        }

        return $reply;
    }

    //Filter class
    public function scopeFilter($query, $filters){
        return $filters->apply($query);
    }
    
    public function subscribe($userId = null){

        return $this->subscriptions()
        ->create(['user_id' => $userId ?: auth()->id()]);

        
    }

    public function unsubscribe($userId = null){

        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())
            ->delete();
    }

    public function subscriptions(){
        return $this->hasMany(ThreadSubscriptions::class);
    }

    public function getIsSubscribedToAttribute() {
        return $this->subscriptions()
            ->where('user_id', auth()->id())
            ->exists();
    }


}
