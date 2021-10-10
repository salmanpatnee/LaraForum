<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadSubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($categoryId, Thread $thread){
        $thread->subscribe();
    }

    public function destroy($categoryId, Thread $thread){
        $thread->unsubscribe();
    }
}
