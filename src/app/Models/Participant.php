<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname', 'birthdate', 'report_subject', 'country', 'phone', 'email', 'company', 'position', 'about_me', 'photo'];
    protected $dates = ['deleted_at'];
}
