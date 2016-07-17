<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laravel Quickstart - Basic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
  </head>

  <body>
    <div id="body-inner">
    <header id="header">
      <div class="container">
        @include('common.nav')
      </div>
    </header>

    <main>
      <div class="container container--with-padding">
        @include('common.notifications')
        @yield('content')
      </div>
    </main>
    </div><!-- #body-inner -->

    <footer id="footer">
      <div class="container">
        // End of content.
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/vendor/subfield/build/subfield.jquery.js"></script>
    <script type="text/javascript" src="/vendor/placeholder-label/build/placeholder-label.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>

  </body>
</html>