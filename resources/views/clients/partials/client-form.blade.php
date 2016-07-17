{{ csrf_field() }}

<div>
  <label for="client-name">Client Name</label>
  <input type="text" id="client-name" name="name" value="{{ $client->name }}">
</div>

<div>
  <label for="client-main-contact">Main Contact</label>
  <input type="text" id="client-main-contact" name="main_contact" value="{{ $client->main_contact }}">
</div>

<div>
  <label for="client-email">Email</label>
  <input type="email" id="client-email" name="email" value="{{ $client->email }}">
</div>

<div>
  <label for="client-phone">Phone</label>
  <input type="text" id="client-phone" name="phone" value="{{ $client->phone }}">
</div>

<div>
  <label for="client-notes">Notes</label>
  <textarea id="client-notes" name="notes">{{ $client->notes }}</textarea>
</div>
