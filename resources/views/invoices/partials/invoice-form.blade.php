
    {{ csrf_field() }}

    <div>
      <label for="invoice-name">Invoice Name</label>
      <input type="text" id="invoice-name" name="name" value="{{ $invoice->name }}" required>
    </div>

    <div>
      <label for="invoice-client-id">Client Name</label>
      <select id="invoice-client-id" name="client_id">
        @foreach ($clients as $client)
          <option value="{{ $client->id }}" {{ $invoice->client && $invoice->client->id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="invoice-description">Description</label>
      <input type="text" id="invoice-description" name="description" value="{{ $invoice->description }}">
    </div>

    <div>
      <label for="invoice-delivery-status">Delivery Status</label>
      <select id="invoice-delivery-status" name="delivery_status">
        <option value="unsent" {{ $invoice->delivery_status == 'unsent' ? 'selected' : '' }}>Not sent</option>
        <option value="sent" {{ $invoice->delivery_status == 'sent' ? 'selected' : '' }}>Sent</option>
      </select>
    </div>

    <div>
      <label for="invoice-payment-status">Payment Status</label>
      <select id="invoice-payment-status" name="payment_status">
        <option value="unpaid" {{ $invoice->payment_status == 'unpaid' ? 'selected' : '' }}>Not paid</option>
        <option value="partial" {{ $invoice->payment_status == 'partial' ? 'selected' : '' }}>Partially paid</option>
        <option value="paid" {{ $invoice->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
      </select>
    </div>

    <div class="subfield" data-watch="#invoice-payment-status" data-parent-value="partial">
      <label for="invoice-amount-paid">Amount Paid</label>
      <span class="field-prefix">$</span><input type="number" step="any" id="invoice-amount-paid" class="prefixed-field" name="amount_paid" value="{{ $invoice->amount_paid }}">
    </div>

    <div>
      <label for="invoice-notes">Notes</label>
      <textarea id="invoice-notes" name="notes">{{ $invoice->notes }}</textarea>
    </div>

