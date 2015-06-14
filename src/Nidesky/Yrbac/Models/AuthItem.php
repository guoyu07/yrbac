<?php namespace Nidesky\Yrbac\Models;

use Illuminate\Database\Eloquent\Model;

class AuthItem extends Model
{
    protected $guarded = ['id'];
    protected $table   = 'auth_item';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
/*
    public function setDataAttribute()
    {
        return !is_array($this->data) || $this->data == false ? null : $this->data;
    }

    public function getDataAttribute()
    {
        return $data = @unserialize($this->data) === false ?: null;
    }*/

    public function authAssignment()
    {
        return $this->hasMany('Nidesky\Yrbac\Models\AuthAssignment', 'itemname', 'name');
    }

}