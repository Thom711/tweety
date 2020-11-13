<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value) {
        if(isset($value)) {
            return asset('storage/' . $value);
        }

        return "https://avatars.dicebear.com/api/bottts/" . $this->email . ".svg?options[width]=200&options[height]=200";
        //return asset('/images/default-avatar.png');
        /*
         * get???Attribute is een onderliggende functie van Laravel, welk ervoor zorgt dat als je in de code
         * bijvoorbeeld $user->avatar roept deze code gepakt wordt.
         */
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline() {
        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()->paginate(50);

        /*
         * SELECT * FROM tweets
         * WHERE user_id = id van ingelogde gebruiker (in dit geval 2)
         * SORT BY created_at DESCENDING;
         */
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)->latest();

        // Registeert een hasmany relatie tussen de gebruiker en tweets
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function path($append = '') {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }
}
