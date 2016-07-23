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

    public function lastInvoiceTime()
    {
        $lastInvoiceTime = 0;

        foreach($this->invoices() as $invoice) {
            $lastInvoiceTime = $invoice->update_at > $lastInvoiceTime ? $invoice->updated_at : $lastInvoiceTime;
        }

        return $lastInvoiceTime;
    }
}
