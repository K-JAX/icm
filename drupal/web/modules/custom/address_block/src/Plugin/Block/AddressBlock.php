<?php

namespace Drupal\address_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an 'Address' Block.
 *
 * @Block(
 *   id = "address_block",
 *   admin_label = @Translation("Address block"),
 *   category = @Translation("Address"),
 * )
 */
class AddressBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
	$output = '<div class="card" style="width: 100%;">
	<iframe allowfullscreen="" frameborder="0" height="294" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5979.693349989609!2d-75.556883930764!3d41.46424068511971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c4da967325fcc3%3A0xe5c12cc581f4069b!2s50+Alberigi+Dr+%23114%2C+Jessup%2C+PA+18434!5e0!3m2!1sen!2sus!4v1542308930108" style="border:0" width="100%"></iframe>
	<div class="card-body bg-blueGrad text-white">
		<div class="row">
			<div class="col-2">
				<div class="map-icon fs-4 orange inset-bubble"><i class="fas fa-map-marker-alt"></i></div>
			</div>
			<div class="col-10">
				<h5 class="card-title">The TekRidge Center</h5>
				<address>
					<p class="mb-0">50 Alberigi Drive, Suite 114</p>
					<p class="mb-0">Jessup, PA 18434</p>
					<a class="mb-0" href="tel:570-344-0100">Tel: 888-ICM-INV9</a>
				</address>
			</div>
		</div>
	</div>
</div>';
    return [
      '#markup' => $this->t($output),
    ];
  }

}
