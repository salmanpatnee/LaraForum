<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Spam;
use App\Models\Thread;
use App\Rules\SpamFree;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth')->only('store', 'destroy');
    }
    
    public function index($categoryId, Thread $thread){
        return $thread->replies()->paginate(10);
    }

    public function store(Thread $thread, Request $request){
        
        try {
            $this->authorize('create', new Reply);

            $this->validate(request(), [
                'body' => ['required', new SpamFree]
            ]);

            $reply = $thread->addReply([
                'body' => request('body'), 
                'user_id' => auth()->id()
            ]);

        } catch (\Exception $e) {
            return response('Sorry, your reply could not be saved at this time.', 422);
        }
        
        return $reply->load('owner');
    }

    public function update(Reply $reply, Spam $spam){

        $this->authorize('update', $reply);

        $this->validate(request(), [
            'body' => ['required', new SpamFree]
        ]);

        $reply->update(request(['body']));
    }

    public function destroy(Reply $reply){
        
        $this->authorize('delete', $reply);
        
        $reply->delete();

        if(request()->expectsJson()){
            return response(['status' => 'Reply deleted']);
        }

        return back()->with('flash', 'Reply has been deleted.');
    }
}
