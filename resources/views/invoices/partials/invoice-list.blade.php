<section>

  @if (count($invoices) > 0)
    <div class="invoice-blocks">
      @foreach ($invoices as $invoice)
          <div class="invoice-blocks--block">
            <h2><a href="/invoices/{{ $invoice->id }}">{{ $invoice->name }}</a></h2>
            <div class="invoice-blocks--block--menu">
              <form action="{{ url('invoices/'.$invoice->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button class="invoice-blocks--block--button__delete" type="submit" onClick="return confirm('Are you sure you want to delete this invoice?')"></button>
              </form>
            </div>
          </div>
      @endforeach
    </div>
  @else
    <section class="none-yet">
      <p>No invoices yet.</p>
    </section>
  @endif

</section>