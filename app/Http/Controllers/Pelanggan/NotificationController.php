<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();

        Auth::user()->notifications()->whereNotNull('read_at')->delete();

        return redirect()->back();
    }
}
