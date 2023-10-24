<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContentFormRequest;

class AjaxController extends Controller
{
    public function iletisimkaydet(ContentFormRequest $request)
{
   /* $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);*/

    $data = $request->all();
    $data['ip'] = request()->ip();

    $contact = Contact::create($data);

    return redirect()->back()->with('success', 'Mesaj Gönderildi.');

}
}
