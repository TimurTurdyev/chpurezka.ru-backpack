<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(ContactRequest $request) {
        $validated = $request->validated();
        return redirect()->back()->withSuccess('Сообщение успешно отправленно!');
    }
}
