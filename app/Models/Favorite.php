<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded = [];
    
    use HasFactory, RecordsActivity;

    public function favorited(){
      return $this->morphTo();
    }
}
