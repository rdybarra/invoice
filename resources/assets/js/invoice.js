import $ from 'jquery';

let lineItems = {

  showEditFields: function($element) {
    $element.parents('.line-item').find('.line-item__value').hide();
    $element.parents('.line-item').find('.line-item__input').show();

    $element.parents('.line-item').find('.line-item__control--cancel').show();
    $element.parents('.line-item').find('.line-item__control--update').show();
    $element.parents('.line-item').find('.line-item__control--edit').hide();
  },

  hideEditFields: function($element) {
    $element.parents('.line-item').find('.line-item__value').show();
    $element.parents('.line-item').find('.line-item__input').hide();

    $element.parents('.line-item').find('.line-item__control--cancel').hide();
    $element.parents('.line-item').find('.line-item__control--update').hide();
    $element.parents('.line-item').find('.line-item__control--edit').show();
  },

  init: function() {
    let _this = this;

    $('.line-item__control--edit').click(function(e) {
      _this.showEditFields($(this));
      return false;
    });

    $('.line-item__control--cancel').on('click', function(e) {
      _this.hideEditFields($(this));
      return false;
    });
  }

};

let invoice = {
  init: function() {
    lineItems.init();
  }
};

module.exports = invoice;
