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
        return view ('messages.index', compact('conversation','me'));
    }
}
