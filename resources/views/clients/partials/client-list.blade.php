<section>

  @if (count($clients) > 0)
      <div class="client-blocks">
      @foreach ($clients as $client)
          <div class="client-blocks--block">
            <h2><a href="clients/{{ $client->id }}">{{ $client->name }}</a></h2>
            <div class="client-blocks--block--menu">
              <form action="{{ url('clients/'.$client->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button class="client-blocks--block--button__delete" type="submit" onClick="return confirm('Are you sure you want to delete this client?')"></button>
              </form>
            </div>
          </div>
      @endforeach
      </div>
  @else
    <section class="none-yet">
      <p>No clients yet.</p>
    </section>
  @endif

</section>