<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function displayChat(Request $request) {
        
        //login user's info
        $me = Auth::user();
        $you = $request->all();
        //get all messages
        $messages = Message::all();
        $conversation = array();
        
        foreach($messages as $message){
            //get messages I send and receive, then push to conversation array.
            if (($message['from_user_id'] == $me['id'] && $message['to_user_id'] == (int)$you['id']) || ($message['from_user_id'] == (int)$you['id'] && $message['to_user_id'] == $me['id'])) {
                $conversation[] = $message;
            }
        }
        return view ('messages.index', compact('conversation', 'me', 'you'));
    }
    
    //send message
    public function send(Request $request) {
        $me = Auth::user();
        
        //Why I need to change string to integer
        $you = (int)$request->receiverId;
        
        $message = new Message;
        $message->from_user_id = $me->id;
        $message->to_user_id = $you;
        $message->body = $request->body;
        $message->save();
        
        //go back to previous page with sent data.
        return back()->withInput();
    }
    
    //back to previous page
    public function back() {
        return redirect ('/users');
    }
    
    
}
