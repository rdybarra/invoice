<nav class="nav">
  <a class="nav__item {{{ (Request::is('clients') || Request::is('clients/*') ? 'active' : '') }}}" href="/clients">Clients</a>
  <a class="nav__item {{{ (Request::is('invoices') || Request::is('invoices/*') ? 'active' : '') }}}" href="/invoices">Invoices</a>
  <a class="nav__item--settings {{{ (Request::is('settings') ? 'active' : '') }}}" href="/settings"></a>
</nav>