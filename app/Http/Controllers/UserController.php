<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\AccountStatus;
use App\Models\Chat;
use App\Models\Message;
use App\Models\MicroJob;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user']);
    }

    public function dashboard()
    {
        $pageTitle = "Dashboard";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'home')
        ];
        $title = "Dashboard";
        $jobs = MicroJob::all();
        $users = User::all();
        return view('user.dashboard', compact('title', 'breadCrumb', 'pageTitle', 'jobs', 'users'));
    }

    public function profile()
    {
        $pageTitle = "Profile";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'dashboard'),
            array('title' => 'Profile', 'route' => 'profile')
        ];
        $user = Auth::user();
        return view('user.profile', compact('user', 'pageTitle', 'breadCrumb'));
    }

    public function profileUpdate(UpdateEmployeeRequest $request)
    {
        $image = $request->oldImage;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                if (File::exists(public_path('images/' . $image))) {
                    if ($image != 'profile.png') {
                        File::delete(public_path('images/' . $image));
                    }
                }
                $image = time() . '-user.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
            }
        }
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->about_me = $request->about_me;
        $user->image = $image;
        $user->nid_num = $request->nid_num;
        $user->qualification = $request->qualification;
        $user->contact_no = $request->contact_no;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->country = $request->country;
        $user->district = $request->district;
        $user->village = $request->village;

        $user->save();
        return redirect()->back()->with('alert-success', 'User Saved Successfully');
    }

    public function insertChat($user)
    {
        $from_user = Auth::user()->id;
        if ($user != null) {
            if ($user == $from_user) {
                return redirect()->back()->with('alert-warning', "Same user can't join chat");
            }
            $chat = DB::select("SELECT * FROM chats WHERE (to_user='$user' AND from_user='$from_user') OR (to_user='$from_user' AND from_user='$user') ");

            if (!$chat) {
                $chat = new Chat();
                $chat->from_user = $from_user;
                $chat->to_user = $user;
                $chat->save();
                return redirect()->route('inbox', $chat->id);
            } else {
                return redirect()->route('inbox', $chat[0]->id);
            }
        } else {
            return redirect()->back();
        }
    }

    public function inbox($chat = null)
    {
        $from_user = Auth::user()->id;
        $pageTitle = "Inbox";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'dashboard'),
        ];
        $title = "Inbox";
        $receiver = null;
        $messages = [];
        $chats = Chat::where(['from_user' => $from_user])->orWhere(['to_user' => $from_user])->get();
        if ($chat != null) {
            $messages = Message::all()->where('chat_id', $chat);
        }
        $chat_id = $chat;
        return view('user.chat', compact('pageTitle', 'breadCrumb', 'title', 'chats', 'messages', 'chat_id'));
    }

    public function order()
    {
        $orders = Order::all();
        $pageTitle = "All Orders";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'dashboard'),
        ];
        $title = "All Orders";

        return view('user.orders', compact('orders', 'title', 'pageTitle', 'breadCrumb'));
    }


    public function orderDetails($order)
    {
        $order = Order::where('id', $order)->get()->first();
        if ($order == null) {
            return redirect()->back();
        }
        $pageTitle = "Order Details";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'dashboard'),
        ];
        $title = $order->job->job_title;
        return view('user.single-order', compact('order', 'title', 'pageTitle', 'breadCrumb'));
    }

    public function deliver($order)
    {
        //
    }

    public function orderCompleted($order)
    {
        $order = Order::find($order);
        $order->status = 4;
        $order->save();
        return redirect()->back()->with('alert-success', 'Order is completed');
    }

    public function deactivate()
    {
        $user = Auth::user();
        $user->acc_status = AccountStatus::where('nickname', 'deactivated')->first()->id;
        $user->save();
        Auth('user')->logout();
        return redirect()->route('login')->with('alert-danger', 'Your account is deactivated');
    }
}
