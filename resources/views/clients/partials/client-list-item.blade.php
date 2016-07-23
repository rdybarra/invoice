<div class="client-blocks--block">
  <h2><a href="/clients/{{ $client->id }}">{{ $client->name }}</a></h2>
  <div class="client-blocks--block--menu">
    <form action="/clients/{{ $client->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="client-blocks--block--button__delete" type="submit" onClick="return confirm('Are you sure you want to delete this client?')"></button>
    </form>
  </div>
</div>
