<section>

  @if (count($clients) > 0)
      <table>
      @foreach ($clients as $client)
          <tr>
            <td><a href="clients/{{ $client->id }}">{{ $client->name }}</a></td>
          </tr>
      @endforeach
      </table>
  @else
    <section class="none-yet">
      <p>No clients yet.</p>
    </section>
  @endif

</section>