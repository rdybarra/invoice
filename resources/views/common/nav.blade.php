<nav class="nav">
  <a class="nav__item--icon--home {{{ (Request::is('/') ? 'active' : '') }}}" href="/"></a>
  <a class="nav__item {{{ (Request::is('clients') || Request::is('clients/*') ? 'active' : '') }}}" href="/clients">Clients</a>
  <a class="nav__item {{{ (Request::is('invoices') || Request::is('invoices/*') ? 'active' : '') }}}" href="/invoices">Invoices</a>
  <a class="nav__item {{{ (Request::is('payments') || Request::is('payments/*') ? 'active' : '') }}}" href="/payments">Payments</a>
  <a class="nav__item--icon--settings {{{ (Request::is('settings') ? 'active' : '') }}}" href="/settings"></a>
</nav>