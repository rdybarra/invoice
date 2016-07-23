{{ csrf_field() }}

<div>
  <label for="payment-date">Date</label>
  <input type="date" id="payment-date" name="date" value="{{ $payment->date }}">
</div>

<div>
  <label for="payment-amount">Amount</label>
  <span class="field-prefix">$</span><input type="number" step="any" id="payment-amount" class="prefixed-field" name="amount" value="{{ $payment->amount }}">
</div>

<div>
  <label for="payment-client-id">Client Name</label>
  <select id="payment-client-id" name="client_id">
    @foreach ($clients as $client)
      <option value="{{ $client->id }}" {{ $payment->client && $payment->client->id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
    @endforeach
  </select>
</div>

<div>
  <label for="payment-invoice-id">Invoice</label>
  <select id="payment-invoice-id" name="invoice_id">
    @foreach ($invoices as $invoice)
      <option value="{{ $invoice->id }}" {{ $payment->invoice && $payment->invoice->id == $invoice->id ? 'selected' : '' }}>{{ $invoice->name }}</option>
    @endforeach
  </select>
</div>

<div>
  <label for="payment-method">Payment Method</label>
  <select id="payment-method" name="payment_method">
    @foreach ($paymentMethods as $paymentMethod)
      <option value="{{ $paymentMethod }}" {{ $payment->payment_method == $paymentMethod ? 'selected' : '' }}>{{ $paymentMethod }}</option>
    @endforeach
  </select>
</div>

<div>
  <label for="payment-notes">Notes</label>
  <textarea id="payment-notes" name="notes">{{ $payment->notes }}</textarea>
</div>
