<table class="table">
  <thead>
    <tr>
      <th>Description</th>
      <th>Hours</th>
      <th>Rate</th>
      <th>Total</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($invoice->line_items as $lineItem)
    <tr class="line-item">
      <form action="/invoices/{{ $invoice->id }}/line-items/{{ $lineItem->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
        <td class="table__cell">
          <div class="line-item__value">{{ $lineItem->description }}</div>
          <div class="line-item__input"><input type="text" name="description" placeholder="Description" value="{{ $lineItem->description }}" required></div></td>
        <td class="table__cell">
          <div class="line-item__value">{{ $lineItem->quantity }}</div>
          <div class="line-item__input"><input type="number" step="all" name="quantity" value="{{ $lineItem->quantity }}" placeholder="Hours"></div></td>
        <td class="table__cell">
          <div class="line-item__value">${{ number_format($lineItem->unit_price, 2) }}</div>
          <div class="line-item__input"><span class="field-prefix">$</span><input class="prefixed-field" type="number" step="all" name="unit_price" value="{{ $lineItem->unit_price }}" placeholder="Rate"></div></td>
        <td class="table__cell">
          <div class="line-item__value">${{ number_format($lineItem->total(), 2) }}</div>
          <div class="line-item__input"><span class="field-prefix">$</span><input class="prefixed-field" type="number" step="all" name="amount" value="{{ $lineItem->amount > 0 ? $lineItem->amount : '' }}" placeholder="Leave blank to calculate"></div></td>
        <td class="table__cell--has-controls">
          <a href class="line-item__control--edit">Edit</a>
          <button type="submit" class='line-item__control--update'>Save</button>
          <a href class="line-item__control--cancel">Cancel</a>
          <a href="/invoices/{{ $invoice->id }}/line-items/{{ $lineItem->id }}/delete" class="line-item__control--delete">Delete</a>
        </td>
      </form>
    </tr>
    @endforeach

    <tr class="new-line-item-row">
      <form action="/invoices/{{ $invoice->id }}/line-items" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
        <td class="table__cell"><input type="text" name="description" placeholder="Description" required></td>
        <td class="table__cell"><input type="number" step="all" name="quantity" placeholder="Hours"></td>
        <td class="table__cell"><input type="number" step="all" name="unit_price" placeholder="Rate"></td>
        <td class="table__cell"><input type="number" step="all" name="amount" placeholder="Leave blank to calculate"></td>
        <td class="table__cell--has-controls"><button type="submit" value="Save" class="line-item__control--create">Save</button></td>
      </form>
    </tr>
    <tr>
      <td class="table__cell"></td>
      <td class="table__cell"></td>
      <td class="table__cell--label">Grand Total</td>
      <td class="table__cell--value">${{ number_format($invoice->amount(), 2) }}</td>
    </tr>
  </tbody>
</table>
