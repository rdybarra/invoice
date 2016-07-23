<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    protected $fillable = ['invoice_id', 'description', 'quantity', 'unit_price', 'amount'];

    public function total()
    {
        return $this->amount > 0 ? $this->amount : $this->quantity * $this->unit_price;
    }
}
