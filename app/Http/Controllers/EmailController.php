<?php

namespace App\Http\Controllers;

use App\Models\ComposeEmailModel;
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
        // dd($request->all);
        $save = new ComposeEmailModel();
        $save->user_id = $request->user_id;
        $save->cc_email = trim($request->cc_email);
        $save->subject = trim($request->subject);
        $save->descriptions = trim($request->descriptions);
        $save->save();

        return redirect('admin/email/compose')->with('success', 'Email Successfully Send !!..');
    }
}
