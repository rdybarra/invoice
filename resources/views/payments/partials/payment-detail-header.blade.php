<section class="payment-detail__header__controls">
  <h1>${{ number_format($payment->amount, 2) }} / {{ $payment->date }}</h1>
  <nav>
    @if (Request::is('payments/*/edit'))
      <a class="payment-detail__header__controls__button" href="/payments/{{ $payment->id }}">View</a>
    @else
      <a class="payment-detail__header__controls__button" href="/payments/{{ $payment->id }}/edit">Edit</a>
    @endif
    <form class="payment-detail__header__controls__delete-form" action="/payments/{{ $payment->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="payment-detail__header__controls__button--delete" type="submit" onClick="return confirm('Are you sure you want to delete this payment?')">Delete</button>
    </form>
  </nav>
</section>
