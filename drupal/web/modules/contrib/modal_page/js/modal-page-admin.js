/**
 * @file
 * Admin JavaScript file for Modal Page.
 */

(function ($, Drupal) {
  'use strict';

  Drupal.behaviors.modalPage = {
    attach: function (context, settings) {

      var modal_type = $(context).find('#edit-type');

      function modal_by_page_parameter_focus() {

        var modal_type_value = modal_type.val();

        if (modal_type_value && modal_type_value === 'page') {
          location.href = "#";
          location.href = "#edit-parameters";
          return ;
        }

        if (modal_type_value && modal_type_value === 'parameter') {
          location.href = "#";
          location.href = "#edit-pages";
          return ;
        }
      }

      $(modal_type).on('change', function () {
        modal_by_page_parameter_focus();
      });
    }
  };
})(jQuery, Drupal);
