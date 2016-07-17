<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingGroup extends Model
{
    protected $fillable = ['name', 'pay_to', 'email', 'phone', 'address'];
}
