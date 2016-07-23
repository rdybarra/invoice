<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['date', 'amount', 'client_id', 'invoice_id', 'payment_method', 'notes'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
}
