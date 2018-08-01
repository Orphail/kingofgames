<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Mail;


class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'email', 'password', 'commerce_id', 'disabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = [
        'nickname' => 'required|max:255',
        'email' => 'required|email|unique:admins',
        'password' => 'required|confirmed|min:8|max:16|alpha_dash'];

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->send(new PasswordReset($token));
    }
}
