<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token', 
        'email'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function threads(){
        return $this->hasMany(Thread::class);
    }

    public function lastReply(){
      return $this->hasOne(Reply::class)->latest();
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function read($thread){
        cache()->forever($this->visitedThreadCacheKey($thread), \Carbon\Carbon::now());
    }

    public function visitedThreadCacheKey($thread){
        return sprintf("user.%s.visits.%s", $this->id, $thread->id);
    }
}
