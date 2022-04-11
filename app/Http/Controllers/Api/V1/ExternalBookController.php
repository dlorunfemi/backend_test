<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ExternalBookController extends Controller
{
    public function externalBook()
    {
        $nameOfABook = request()->name;

        $req = Http::get('https://www.anapioficeandfire.com/api/books/?name='.$nameOfABook);

        if ($req->ok() && $req->status() === 200) {
            if ($req->json() == [] || $req->body() == "[]") {
                return $this->error(['data' => $req->json()], 404, 'not found');
            }
        }
        return $this->success(['data' => $req->json()]);
    }
}
