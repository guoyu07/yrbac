<?php namespace Nidesky\Yrbac;

class Yrbac {

    public function checkAccess($access)
    {
        return $access == 'author' ?: false;
    }
}