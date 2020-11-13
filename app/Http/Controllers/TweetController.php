<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        /*
         * auth() pakt samen met de UI scaffolding de huidg ingeolgde gebruiker. Hieronder wordt dus de
         * huidig ingelogde gebruiker pakt, geplaatst in het user model zodat de timeline functie aangeroepen
         * kan worden. Die retourneert tweets.
         */
        return view('tweets.index', [
            'tweets' => current_user()->timeline()
        ]);
    }

    public function store() {
        $attributes = request()->validate([
            'body' => 'required|max:255'
        ]);

        /*
        * Een request->validate wordt terug gegeven als een array, wat het erg geschikt maakt om
        * op te slaan in een nieuwe variabel
        */

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect()->route('home');
    }
}
