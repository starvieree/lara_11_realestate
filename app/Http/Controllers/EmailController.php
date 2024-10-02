<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmailController extends Controller
{
    public function EmailCompose(Request $request)
    {
        $data['getEmail'] = User::whereIn('role', ['agent', 'user'])->get();
        return view('admin.email.composer', $data);
    }

    public function EmailComposePost(Request $request)
    {
        dd($request->all);
    }
}
