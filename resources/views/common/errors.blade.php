@if (count($errors) > 0)
    <section class="notification-box--error">
        <strong>Ooops. Something needs your attention.</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif