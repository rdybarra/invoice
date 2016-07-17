<section class="invoice__header">
  <h1>Invoice #{{ $invoice->id }}</h1>

  <section class="invoice__header__meta">
    @if ($invoice->client)
      <div class="invoice__header__meta__item">
        <span class="invoice__header__meta__item__label">Prepared for</span>
        <span class="invoice__header__meta__item__value">{{ $invoice->client->name }}</span>
      </div>
    @endif

    @if ($invoice->description)
      <div class="invoice__header__meta__item">
        <span class="invoice__header__meta__item__label">Project</span>
        <span class="invoice__header__meta__item__value">{{ $invoice->description }}</span>
      </div>
    @endif

    <div class="invoice__header__meta__item">
      <span class="invoice__header__meta__item__label">By</span>
      <span class="invoice__header__meta__item__value">{{ $settings->name }}</span>
    </div>
  </section>
</section>