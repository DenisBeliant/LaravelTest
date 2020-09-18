<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
 
class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
 
    public function store(ContactRequest $request)
    {
        for($i = 0; $i < 10; $i++) {
            Mail::to('ulys.chambard@le-campus-numerique.fr')
            ->send(new Contact($request->except('_token')));
        }

        return view('confirm');
    }
}