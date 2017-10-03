<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'user_employee',
        'user_web_admin',
        'user_quote_edit',
        'user_quote_view',
        'user_job_edit',
        'user_job_view',
        'user_invoice_edit',
        'user_invoice_view',
        'user_reciept_add',
        'user_reciept_view',
        'user_schedule_edit',
        'user_schedule_view',
        'user_created_by',
        'user_modified_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
