<section>

  @if (count($invoices) > 0)
    <div class="invoice-blocks">
      @foreach ($invoices as $invoice)
        @include('invoices.partials.invoice-list-item')
      @endforeach
    </div>
  @else
    <section class="none-yet">
      <p>No invoices yet.</p>
    </section>
  @endif

</section>