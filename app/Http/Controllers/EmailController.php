<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ComposeEmailModel;
use App\Mail\ComposeEmailMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function EmailCompose(Request $request)
    {
        $data['getEmail'] = User::whereIn('role', ['agent', 'user'])->get();
        return view('admin.email.compose', $data);
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

        $getUserEmail = User::where('id', '=', $request->user_id)->first();
        Mail::to($getUserEmail->email)->cc($request->cc_email)->send(new ComposeEmailMail($save));

        return redirect('admin/email/compose')->with('success', 'Email Successfully Send !!..');
    }

    public function EmailSent(Request $request)
    {
        $data['getRecord'] = ComposeEmailModel::get();
        return view('admin.email.sent', $data);
    }

    public function AdminEmailSentDelete(Request $request)
    {
        if (!empty($request->id)) {
            $option = explode(',', $request->id);
            foreach ($option as $id) {
                if (!empty($id)) {
                    $getRecord = ComposeEmailModel::find($id);
                    $getRecord->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'Send Email Successfully Deleted!');
    }
}
