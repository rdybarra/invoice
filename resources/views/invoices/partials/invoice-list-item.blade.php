<div class="invoice-blocks--block">
  <h2><a href="/invoices/{{ $invoice->id }}">{{ $invoice->name }}</a></h2>
  <div class="invoice-blocks--block--menu">
    <form action="/invoices/{{ $invoice->id }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button class="invoice-blocks--block--button__delete" type="submit" onClick="return confirm('Are you sure you want to delete this invoice?')"></button>
    </form>
  </div>
</div>
