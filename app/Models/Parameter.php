<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable =
    [
        'type',
        'value',
        'key'
    ];


    public $rules =
    [
            'type' => 'required_with:text,file',
            'value_file' => 'required|file',
            'value_text' => 'required',
            'key' => 'required|unique:parameters',
    ];

    static public function getValue($key)
    {
        $Param = Parameter::whereRaw("`key` like '".$key."'");
        if ($Param->count())
        {
            return $Param->first()->value;
        } else {
            return null;
        }
    }

}
