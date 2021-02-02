<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactSend;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(ContactRequest $request)
    {
        $validated = $request->validated();
        Mail::to(env('MAIL_FROM_ADDRESS'))
            ->send(new ContactSend($validated));
        return redirect()->back()->withSuccess('Сообщение успешно отправленно!');
    }
}
