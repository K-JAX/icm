/**
 * @file
 * Default JavaScript file for Modal Page.
 */

(function ($, Drupal, drupalSettings) {
  'use strict';

  Drupal.behaviors.modalPage = {
    attach: function (context, settings) {

      // Get Modals to Show.
      var modals = $('.js-modal-page-show', context);

      // Verify if there is Modal.
      if (!modals.length) {
        return false;
      }

      // Verify if this project should load Bootstrap automatically.
      var verify_load_bootstrap_automatically = true;
      if (typeof settings.modal_page != 'undefined' && settings.modal_page.verify_load_bootstrap_automatically != 'undefined') {
        verify_load_bootstrap_automatically = settings.modal_page.verify_load_bootstrap_automatically;
      }

      // If Bootstrap is automatic enable it only if its necessary.
      if (!$.fn.modal && verify_load_bootstrap_automatically) {
        $.ajax({url: "/modal-page/ajax/enable-bootstrap", success: function(result){
          location.reload();
        }});
      }

      // Foreach in all Modals.
      $(modals).each(function(index) {

        // Get default variables.
        var modal = $(this);
        var checkbox_please_do_not_show_again = $('.modal-page-please-do-not-show-again', modal);
        var id_modal = checkbox_please_do_not_show_again.val();
        var cookie_please_do_not_show_again = $.cookie('please_do_not_show_again_modal_id_' + id_modal);

        // Check don't show again option.
        if (cookie_please_do_not_show_again) {
          return false;
        }

        // Check auto-open.
        var auto_open = true;

        if (typeof modal.data("auto-open") != 'undefined' && typeof modal.data("auto-open") != 'undefined') {
          auto_open = modal.data("auto-open");
        }


        modal.on('shown.bs.modal', function() {
          $(this).find(".js-modal-page-ok-buttom").first().focus();
        });

        modal.on('keydown', function(e) {
          var keyCode = e.keyCode || e.which;
          var lastElement = $(this).find('.js-modal-page-ok-buttom').last().is(':focus');
          var firstElement = $(this).find(".js-modal-page-ok-buttom").first().is(':focus');

          if (keyCode === 9 && !e.shiftKey && lastElement) {
            e.preventDefault();
            $(this).find(".js-modal-page-ok-buttom").first().focus();
          } else if(keyCode === 9 && e.shiftKey && firstElement) {
            e.preventDefault();
            $(this).find(".js-modal-page-ok-buttom").last().focus();
          }
        });

        // Open Modal on Auto Open.
        if (auto_open == true) {

          // Verify if there is a delay to show Modal.
          var delay = $('#js-modal-page-show-modal #delay_display', modal).val() * 1000;

          setTimeout(function () {
            modal.modal();
          }, delay);
        }

        // Open Modal Page clicking on "open-modal-page" class.
        $('.open-modal-page', modal).on('click', function () {
          modal.modal();
        });

        // Open Modal Page clicking on user custom element.
        if (typeof modal.data( "open-modal-element-click") != 'undefined' && modal.data( "open-modal-element-click")) {

          var link_open_modal = modal.data( "open-modal-element-click");

          $(link_open_modal).on('click', function () {
            modal.modal();
          });
        }

        var ok_button = $('.js-modal-page-ok-button', modal);

        ok_button.on('click', function () {

          if (checkbox_please_do_not_show_again.is(':checked')) {

            $.cookie('please_do_not_show_again_modal_id_' + id_modal, true, {expires: 365 * 20, path: '/'});

          }
        });
      });
    }
  };
})(jQuery, Drupal, drupalSettings);
