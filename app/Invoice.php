<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['name', 'client_id', 'description', 'delivery_status', 'payment_status', 'amount_paid', 'notes'];

    public function scopeOutstanding($query)
    {
        return $query->where('payment_status', '!=', 'paid');
    }

    public function scopeWithPayments($query)
    {
        return $query->where('payment_status', '=', 'paid')
                     ->orWhere('payment_status', '=', 'partial');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function line_items()
    {
        return $this->hasMany('App\LineItem');
    }

    public function amount()
    {
        $total = 0;

        foreach ($this->line_items as $lineItem) {
            $total += $lineItem->total();
        }

        return $total;
    }

    public function amountDue()
    {
        $amountDue = 0;

        if (!$this->payment_status || $this->payment_status == 'unpaid') {
            $amountDue = $this->amount();
        } elseif ($this->payment_status == 'partial') {
            $amountDue = $this->amount() - $this->amount_paid;
        }

        return $amountDue;
    }

    public function delete()
    {
        foreach ($this->line_items as $lineItem) {
            $lineItem->delete();
        }

        parent::delete();
    }
}
