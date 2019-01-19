<?php

namespace App\Helpers;

class Help
{
    function displayMessage()
    {
        if(Session::has('message')){
            list($type,$message)=explode('|',Session::get('message'));
            // $type=$type=="error":"danger";
        }
    }

    static function bob()
    {
        return 'success';
    }
}