<section>

  @if (count($payments) > 0)
      <div class="payment-blocks">
      @foreach ($payments as $payment)
          <div class="payment-blocks--block">
            <h2><a href="/payments/{{ $payment->id }}">{{ $payment->date }}</a></h2>
            <div class="payment-blocks--block--menu">
              <form action="/payments/{{ $payment->id }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button class="payment-blocks--block--button__delete" type="submit" onClick="return confirm('Are you sure you want to delete this payment?')"></button>
              </form>
            </div>
          </div>
      @endforeach
      </div>
  @else
    <section class="none-yet">
      <p>No payments yet.</p>
    </section>
  @endif

</section>