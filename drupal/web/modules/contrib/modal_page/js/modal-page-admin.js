/**
 * @file
 * Admin JavaScript file for Modal Page.
 */

(function ($, Drupal) {
  'use strict';

  Drupal.behaviors.modalPage = {
    attach: function (context, settings) {

      var modal_type = $(context).find('#edit-type');

      if (!$.fn.modal) {
        $('#image-modal').hide();
      }

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

      //  Show Modal with Image to Help.
      $('.modal-image-example').on('click', function(event) {

        if (!$.fn.modal) {
          return;
        }

        // Prevent Default.
        event.preventDefault();

        // Get URL of this image.
        var urlImage = $(this).attr("href");

        $('.image-preview').attr('src', urlImage);
        $('#image-modal').modal('show');

      });

      // Enable option if necessary.
      $('.js-enable-modal-footer').on('click', function(event) {
        event.preventDefault();
        if ($('#edit-enable-modal-footer').is(":checked") == false) {
          $('#edit-enable-modal-footer').trigger('click');
        }
      });
    }
  };
})(jQuery, Drupal);
