<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth')->only('store', 'destroy');
    }
    
    public function store(Thread $thread, Request $request){

        $this->validate($request, [
            'body' => 'required'
        ]);

        $thread->addReply([
            'body' => request('body'), 
            'user_id' => auth()->id()
        ]);

        return back()->with('flash', 'Your reply has been added.');
    }

    public function update(Reply $reply){

        $this->authorize('update', $reply);

        $reply->update(request(['body']));
    }

    public function destroy(Reply $reply){
        
        $this->authorize('delete', $reply);
        
        $reply->delete();

        return back()->with('flash', 'Reply has been deleted.');
    }
}
