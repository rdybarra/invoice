<section class="invoice__payment-terms">
  <h3>Payment Terms</h3>
  <p>To be made payable to {{ $settings->pay_to }}</p>
</section>

<section class="invoice__contact-info">
  <div class="invoice__contact-info__item">
    <span class="invoice__contact-info__item__label">Address</span>
    <span class="invoice__contact-info__item__value">{{ $settings->address }}</span>
  </div>

  <div class="invoice__contact-info__item">
    <span class="invoice__contact-info__item__label">Phone</span>
    <span class="invoice__contact-info__item__value">{{ $settings->phone }}</span>
  </div>

  <div class="invoice__contact-info__item">
    <span class="invoice__contact-info__item__label">Email</span>
    <span class="invoice__contact-info__item__value">{{ $settings->email }}</span>
  </div>
</section>