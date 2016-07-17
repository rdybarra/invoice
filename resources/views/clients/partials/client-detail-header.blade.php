<section class="client-detail__header__controls">
  <h1>{{ $client->name }}</h1>
  <nav>
    @if (Request::is('clients/*/edit'))
      <a class="client-detail__header__controls__button" href="/clients/{{ $client->id }}">View</a>
    @else
      <a class="client-detail__header__controls__button" href="/clients/{{ $client->id }}/edit">Edit</a>
    @endif
    <form class="client-detail__header__controls__delete-form" action="clients/{{ $client->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="client-detail__header__controls__button--delete" type="submit" onClick="return confirm('Are you sure you want to delete this client?')">Delete</button>
    </form>
  </nav>
</section>

<section class="client-detail__header__info">
  <div class="client-detail__header__info__item">
    <span class="client-detail__header__info__item__label">Main Contact</span>
    <span class="client-detail__header__info__item__value">{{ $client->main_contact }}</span>
  </div>
  <div class="client-detail__header__info__item">
    <span class="client-detail__header__info__item__label">Email</span>
    <span class="client-detail__header__info__item__value">{{ $client->email }}</span>
  </div>
  <div class="client-detail__header__info__item">
    <span class="client-detail__header__info__item__label">Phone</span>
    <span class="client-detail__header__info__item__value">{{ $client->phone }}</span>
  </div>
  <div class="client-detail__header__info__item">
    <span class="client-detail__header__info__item__label">Notes</span>
    <span class="client-detail__header__info__item__value">{{ $client->notes }}</span>
  </div>
</section>