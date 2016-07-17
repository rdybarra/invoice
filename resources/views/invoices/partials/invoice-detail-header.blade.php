<div class="invoice-detail__header__controls">
  <h1>{{ $invoice->name }}</h1>
  <nav>
    @if (Request::is('invoices/*/edit'))
      <a class="invoice-detail__header__controls__button" href="/invoices/{{ $invoice->id }}">View</a>
    @else
      <a class="invoice-detail__header__controls__button" href="/invoices/{{ $invoice->id }}/edit">Edit Basic Info</a>
    @endif
    <a class="invoice-detail__header__controls__button" href="/invoices/{{ $invoice->id }}/line-items#line-items">Manage Line Items</a>
    <a class="invoice-detail__header__controls__button" href="/invoices/{{ $invoice->id }}/print" target="_blank">Go to print view</a>
    <form class="invoice-detail__header__controls__delete-form" action="/invoices/{{ $invoice->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="invoice-detail__header__controls__button--delete" type="submit" onClick="return confirm('Are you sure you want to delete this invoice?')">Delete</button>
    </form>
  </nav>
</div>

