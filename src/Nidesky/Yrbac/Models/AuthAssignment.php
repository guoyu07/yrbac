<?php namespace Nidesky\Yrbac\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AuthAssignment extends Eloquent
{
    protected $guarded = ['id'];
    protected $table   = 'auth_assignment';
}