<?php


namespace App\Models;


trait Followable
{

    public function isFollowing(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');

        /*
         * Bouwt een many to many relation op, een user can have many users. Maar omdat t om 'follows' gaat, wordt het
         * opgeslagen in de pivot table follows. Dan moet ook expliciet de foreign id's aangegeven worden. Als je het
         * niet zo aangeeft, gaat Laravel zoeken in de table users_users.
         */

    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);

        /*
         * Omdat in de functie follows() een belongs to relatie is opgebouwd, kan je deze functie aanroepen om een
         * nieuwe aan te maken. Bijvoorbeeld
         * auth()->user()->follow($newFriend). In de follows tabel wordt dan een nieuwe pivot aangemaakt met de ID
         * van de huidig ingelogde gebruiker en de ID van $newFriend. Save is een onderliggende Laravel functie
         * die dit voor je opslaat.
         */
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);

        /*
         * Omdat in de functie follows() een belongs to relatie is opgebouwd, kan je deze functie aanroepen om een
         * nieuwe aan te maken. Bijvoorbeeld
         * auth()->user()->follow($newFriend). In de follows tabel wordt dan een nieuwe pivot aangemaakt met de ID
         * van de huidig ingelogde gebruiker en de ID van $newFriend. Save is een onderliggende Laravel functie
         * die dit voor je opslaat.
         * Detach verwijderd 'm weer.
         */
    }

    public function toggleFollow(User $user) {
        $this->follows()->toggle($user);
    }
}
