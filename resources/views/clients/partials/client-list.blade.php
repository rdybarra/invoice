<section>

  @if (count($clients) > 0)
      <div class="client-blocks">
      @foreach ($clients as $client)
        @include('clients.partials.client-list-item')
      @endforeach
      </div>
  @else
    <section class="none-yet">
      <p>No clients yet.</p>
    </section>
  @endif

</section>