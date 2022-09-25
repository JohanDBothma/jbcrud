<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // attribute to get the language in readable format
    public function languageName(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => Language::where('id', $attributes['language'])->pluck('name')->first()
        );
    }
    // attribute to get the interests in a readable, comma seperated, format
    public function interestsList(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                $interests = explode(',', $attributes['interests']);
                $interests_string = "";

                foreach ($interests as $i) {
                    if ($interests_string) {
                        $interests_string .= ", ";
                    }

                    $interests_string .= Interest::where('id', $i)->pluck('name')->first();
                }

                return $interests_string;
            }
        );
    }
}
