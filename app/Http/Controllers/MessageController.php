<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user']);
    }

    public function send(Request $request)
    {
        $message = new Message();
        $from_user = Auth::user()->id;
        $message->chat_id = $request->chat_id;
        $message->message = $request->message;
        $message->sender = $from_user;

        $message->save();

        $user_image = asset('images/' . $message->user->image);
        if ($message->sender != $from_user) {
            $user_name = $message->user->first_name . ' ' . $message->user->last_name;
        } else {
            $user_name = 'Me';
        }
        $lastMessage = $message->message;

        return response(['status' => Response::HTTP_OK, 'user_image' => $user_image, 'user_name' => $user_name, 'message' => $lastMessage, 'time' => Carbon::parse($message->created_at)->setTimezone(config('app.localTimezone'))->format('d M h:i a')]);
    }

    public function faceMessage(Request $request)
    {
        $chat = $request->chat_id;
        $from_user = Auth::user()->id;
        $chats = Chat::where(['from_user' => $from_user])->orWhere(['to_user' => $from_user])->get();
        if ($chat != null) {
            $messages = Message::all()->where('chat_id', $chat);
        }

        $message_content = array();
        $chat_list = array();

        foreach ($chats as $chat) {
            if ($chat->to_user != $from_user) {
                $user = $chat->toUser;
            } else {
                $user = $chat->fromUser;
            }
            array_push($chat_list, ['name' => $user->first_name . ' ' . $user->last_name, 'chat_id' => $chat->id, 'image' => asset('images/' . $user->image)]);
        }

        foreach ($messages as $message) {
            $user_image = asset('images/' . $message->user->image);
            $user_name = $message->user->first_name . ' ' . $message->user->last_name;
            if ($from_user == $message->user->id) {
                $user_name = "Me";
            }
            $lastMessage = $message->message;
            array_push($message_content, ['name' => $user_name, 'image' => $user_image, 'message' => $lastMessage, 'time' => Carbon::parse($message->created_at)->setTimezone(config('app.localTimezone'))->format('d M h:i a')]);
        }


        return response(['status' => Response::HTTP_OK, 'chats' => $chat_list, 'messages' => $message_content]);
    }

}
