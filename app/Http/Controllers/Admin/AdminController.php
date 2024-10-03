<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Broadcast;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function notify() {
        $user = User::findOrFail(1);
        $user->notify(new TestNotification());
        return redirect()->back();
    }


}
