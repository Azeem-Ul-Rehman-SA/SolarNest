<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplates;
use Illuminate\Http\Request;


class EmailTemplatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $emails = EmailTemplates::all();

        return view('backend.emailtemplates.index', compact('emails'));
    }

    public function edit($id)
    {
        $email = EmailTemplates::find($id);
        return view('backend.emailtemplates.edit', compact('email'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'Title is required.',
            'content.required' => 'Content is required.'
        ]);
        $email = EmailTemplates::find($id);
        $email->title = $request->title;
        $email->content = $request->get('content');
        $email->save();
        return redirect()->route('admin.emailtemplates.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Template updated successfully.'
            ]);

    }

}
