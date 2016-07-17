/* globals $, placeholderLabel */

import invoice from './invoice';
invoice.init();

$(document).ready(function() {
  $('.subfield').subfield();
});


placeholderLabel('.placeholder-label');