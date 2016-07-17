<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'main_contact', 'email', 'phone', 'notes'];

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function delete() {
        foreach($this->invoices as $invoice) {
            $invoice->delete();
        }

        parent::delete();
    }
}
