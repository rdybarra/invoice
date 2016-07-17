<table class="table">
  <thead>
    <tr>
      <th>Description</th>
      <th>Hours</th>
      <th>Rate</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($invoice->line_items as $lineItem)
    <tr class="line-item">
        <td class="table__cell">
          <div class="line-item__value">{{ $lineItem->description }}</div>
        <td class="table__cell">
          <div class="line-item__value">{{ $lineItem->quantity }}</div>
        <td class="table__cell">
          <div class="line-item__value">${{ number_format($lineItem->unit_price, 2) }}</div>
        <td class="table__cell">
          <div class="line-item__value">${{ number_format($lineItem->total(), 2) }}</div>
      </form>
    </tr>
    @endforeach

    <tr>
      <td class="table__cell"></td>
      <td class="table__cell"></td>
      <td class="table__cell--label">Grand Total</td>
      <td class="table__cell--value">${{ number_format($invoice->amount(), 2) }}</td>
    </tr>
  </tbody>
</table>
