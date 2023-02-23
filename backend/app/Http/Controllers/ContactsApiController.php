<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactsApiController extends Controller
{
    public function index(){
        return Contact::all();
    }

    public function store(){
        request()->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);
        return Contact::create([
            'nome' => request('nome'),
            'email' => request('email'),
            'telefone' => request('telefone'),
            'img' => request('img'),
        ]);
    }

    public function update($id){
        $post = Contact::findOrFail($id);
        request()->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);

    $success = $post->update([
        'nome' => request('nome'),
        'email' => request('email'),
        'telefone' => request('telefone'),
        'img' => request('img'),
    ]);

    return [
        'success' => $success
    ];
    }

    public function delete($id){
        $post = Contact::findOrFail($id);
        $success = $post->delete();

        return [
            'success' => $success
        ];
    }

    public function getOne($id){
        $post = Contact::findOrFail($id);
        $user = Contact::where('id', $id)->first();

        return [
            $user
        ];
    }
}
