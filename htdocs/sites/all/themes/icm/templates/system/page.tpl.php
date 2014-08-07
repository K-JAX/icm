<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['branding']: Items for the branding region.
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see omega_preprocess_page()
 */
?>
<script type="text/javascript" src="//use.typekit.net/gsy3ilq.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<div class="l-page">
  <div class="l-header" role="banner">
    <div class="l-branding">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <?php if ($site_name): ?>
          <h1 class="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      <?php endif; ?>

      <?php print render($page['branding']); ?>
    </div>

    <?php print render($page['header']); ?>
    <?php print render($page['navigation']); ?>
  </div>

  <div class="l-main">
    <div class="l-content" role="main">
      <?php print render($page['highlighted']); ?>
      <?php // print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1><?php print $title; ?></h1>
        <span class="border"></span>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
     
      <?php if ($is_front): ?>
<div id="skrollr-body">
<div id="pagelimiter">

<div id="matrix">
<object class="svgobject">
<svg class="blur" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2400 1677" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%">

<image filter="url(#filter6)" id="topimage" xlink:href="/sites/all/themes/icm/images/clearmatrix.jpg" width="100%" height="100%"/></image>

   <filter id="filter1">
		<feGaussianBlur stdDeviation="25" />
	</filter>
	
	   <filter id="filter2">
		<feGaussianBlur stdDeviation="20" />
	</filter>
	
	   <filter id="filter3">
		<feGaussianBlur stdDeviation="18" />
	</filter>
	
	
	   <filter id="filter4">
		<feGaussianBlur stdDeviation="17" />
	</filter>
	   <filter id="filter5">
		<feGaussianBlur stdDeviation="15" />
	</filter>
	   <filter id="filter6">
		<feGaussianBlur stdDeviation="13" />
	</filter>
	   <filter id="filter7">
		<feGaussianBlur stdDeviation="10" />
	</filter>
	   <filter id="filter8">
		<feGaussianBlur stdDeviation="7" />
	</filter>
	   <filter id="filter9">
		<feGaussianBlur stdDeviation="4" />
	</filter>
	
	   <filter id="filter10">
		<feGaussianBlur stdDeviation="3" />
	</filter>
	
	
	   <filter id="filter11">
		<feGaussianBlur stdDeviation="1" />
	</filter>
	
	
	
	<mask id="mask1">
	<circle cx="35.5%" cy="78%" r="80" fill="white" id="circle1" class="bottomleft" filter="url(#filter2)" />
	<circle cx="29.5%" cy="73%" r="80" fill="white" id="circle2" class="bottomleft" filter="url(#filter2)" />
	
	<circle cx="29.5%" cy="83%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="29.5%" cy="64%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="23.5%" cy="68.5%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="23.5%" cy="78%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="34.5%" cy="68.3%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="34.5%" cy="86.3%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="40.5%" cy="83.3%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="40.5%" cy="73.3%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	

	<circle cx="29.5%" cy="44%" r="80" fill="white" id="circle3" class="topleft" filter="url(#filter2)" />
	<circle cx="34.5%" cy="42%" r="80" fill="white" id="circle4" class="topleft" filter="url(#filter2)" />
	<circle cx="34.5%" cy="59.3%" r="80" fill="white" id="circle5" class="topleft" filter="url(#filter2)" />
	<circle cx="46%" cy="50.5%" r="80" fill="white" id="circle6" class="topleft" filter="url(#filter2)" />
	<circle cx="52%" cy="46%" r="80" fill="white" id="circle7" class="topleft" filter="url(#filter2)" />
	<circle cx="52%" cy="55%" r="80" fill="white" id="circle8" class="topleft" filter="url(#filter2)" />
	
	<circle cx="41%" cy="64.5%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	<circle cx="40.5%" cy="56%" r="80" fill="white" class="phase2" filter="url(#filter2)" />
	
	<circle cx="40.5%" cy="45%" r="80" fill="white" class="phase3" filter="url(#filter2)" />
	<circle cx="40.5%" cy="36%" r="80" fill="white" class="phase3" filter="url(#filter2)" />
	<circle cx="40.5%" cy="27%" r="80" fill="white" class="phase3" filter="url(#filter2)" />
	<circle cx="46.5%" cy="41%" r="80" fill="white" class="phase3" filter="url(#filter2)" />
	<circle cx="52%" cy="36%" r="80" fill="white" class="phase3" filter="url(#filter2)" />
	
	
	<circle cx="63%" cy="43.5%" r="80" fill="white" id="circle9" class="topright" filter="url(#filter2)" />
	<circle cx="63%" cy="55.5%" r="80" fill="white" id="circle10" class="topright" filter="url(#filter2)" />
	<circle cx="74%" cy="44.5%" r="80" fill="white" id="circle11" class="topright" filter="url(#filter2)" />
	
	<circle cx="57%" cy="42%" r="80" fill="white" class="phase4" filter="url(#filter2)" />
	<circle cx="68%" cy="51%" r="80" fill="white" class="phase4" filter="url(#filter2)" />
	<circle cx="57%" cy="51%" r="80" fill="white" class="phase4" filter="url(#filter2)" />
	<circle cx="57%" cy="61%" r="80" fill="white" class="phase4" filter="url(#filter2)" />
	<circle cx="46.5%" cy="59.5%" r="80" fill="white" class="phase4" filter="url(#filter2)" />
	<circle cx="46.5%" cy="30.5%" r="80" fill="white" class="phase4" filter="url(#filter2)" />
	<circle cx="46.5%" cy="59.5%" r="80" fill="white" class="phase4" filter="url(#filter2)" />

	<circle cx="58%" cy="69.5%" r="80" fill="white" id="circle12" class="bottomright" filter="url(#filter2)" />
	<circle cx="63%" cy="73.5%" r="80" fill="white" id="circle13" class="bottomright" filter="url(#filter2)" />
	<circle cx="69%" cy="78.5%" r="80" fill="white" id="circle14" class="bottomright" filter="url(#filter2)" />
	
	
	<circle cx="51.5%" cy="64.5%" r="80" fill="white" class="phase5" filter="url(#filter2)" />
	<circle cx="51.5%" cy="73.5%" r="80" fill="white" class="phase5" filter="url(#filter2)" />
	<circle cx="51.5%" cy="82.5%" r="80" fill="white" class="phase5" filter="url(#filter2)" />
	<circle cx="57.5%" cy="78.5%" r="80" fill="white" class="phase5" filter="url(#filter2)" />
	<circle cx="29.5%" cy="55.5%" r="80" fill="white" class="phase5" filter="url(#filter2)" />
	<circle cx="34.5%" cy="51.5%" r="80" fill="white" class="phase5" filter="url(#filter2)" />
	
	</mask>
	
    <image xlink:href="/sites/all/themes/icm/images/clearmatrix.jpg" width="100%" height="100%" mask="url(#mask1)"></image>
	<text filter="url(#filter1)" x="400" y="200">We Bring Life Into Focus</text>
    </svg>
</object>
<object class="svgobject" id="ontop">
<svg version="1.1" id="topcluster"viewBox="0 0 1100 700 " >

<!-- Main Path -->  

<path id="path4" stroke-miterlimit="10" d = "M 430.4 495.88 L 463.09 552.43 L 528.38 552.43 L 561.02 495.88 L 528.37 439.33 L 561.02 382.78 L 626.5 382.78 L 658.96 439.33 L 626.5 495.88 L 561.02 495.88 M 626.5 495.88 L 659.15 552.43 L 724.38 552.43 L 757.03 495.88 L 724.45 439.33 L 658.96 439.33 M 724.38 552.43 L 757.03 608.98 L 822.33 608.98 L 854.97 552.43 L 822.33 495.88 L 757.03 495.88" />

<path id="path3" stroke-miterlimit="10"  d = "M 724.45 439.33 L 757.1 382.78 L 724.45 326.23 L 758.03 269.68 L 725.38 213.14 L 758.03 156.59 L 823.33 156.59 L 855.97 213.14 L 922.04 213.14 L 954.69 156.59 L 922.04 100.04 L 856.74 100.04 L 823.33 156.59 L 758.03 156.59 L 724.45 100.04 L 659.15 100.04 L 626.5 156.59 L 658.96 213.14 L 725.38 213.14 L 658.96 213.14 L 626.5 269.68 L 658.96 326.23 L 724.45 326.23 M 430.44 382.78 L 463.09 326.23 L 528.38 326.23 L 561.03 269.68 L 528.38 213.14 L 561.03 156.59 L 528.38 100.04 L 463.09 100.04 L 430.44 156.59 L 366.07 156.59 L 333.42 213.14 L 366.05 269.68 L 430.44 269.68 L 463.09 326.23  M 430.44 269.68 L 463.09 213.14 L 430.44 156.59 L 463.09 213.14 L 528.38 213.14" />

<path id="path2" stroke-miterlimit="10" d = "M 333.42 213.14 L 268.12 213.14 L 235.35 156.59 L 268 100.04 L 235.35 43.49 L 170.05 43.49 L 137.4 100.04 L 72.12 100.04 L 39.47 156.59 L 72.12 213.14 L 137.42 213.14 L 170.05 156.59 L 137.4 100.04 L 170.05 156.59 L 235.35 156.59 L 268.12 213.14 L 235.35 269.68 L 268 326.23 L 235.35 382.78 L 170.05 382.78 L 137.4 326.23 L 170.05 269.68 L 235.35 269.68 " />

<path id="path1" stroke-sasharray="0,0" stroke-miterlimit="10" d = "M 366.07 495.88 L 333.42 552.43 L 268.12 552.43 L 235.35 608.98 L 170.05 608.98 L 137.42 552.43 L 170.07 495.88 L 137.42 439.33 L 72.12 439.33 L 39.47 495.88 L 72.12 552.43 L 137.42 552.43 L 170.07 495.88 L 235.35 495.88 L 268.12 552.43" />

</svg>
</object>

<p id="more"><span></span></p>
<img src="/sites/all/themes/icm/images/engage.png" id="engage" alt="Click to Engage with ICM" title="Click to Engage with ICM" />
</div>

<div id="spacer"></div>

<div class="seemore cf">
<?php endif; ?>
<object class="pathobject">
<svg version="1.1" id="startpath1" width="960px" height="1500px" viewBox="0 0 960 1500 " >

<!-- Main Path -->
<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:0;" stroke-miterlimit="10" data-200-bottom="stroke-dashoffset:6000;" d = "M 485 1 L 501.5 9 L 501.5 28 L 484.5 37 L 468.5 28 L 468.5 9 L 485 1 M 496.98 16.2 L 485.48 22.45 L 473.98 16.13 M 484.5 37 L 484.98 295.17 L 501.31 285.74 L 517.64 295.17 L 517.54 314.03 L 501.31 323.43 L 484.98 314.03 L 484.98 295.17" /> 

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--800-center="stroke-dashoffset:0;" d = "M 487.81 296.81 L 487.81 312.39 M 501.31 320.19 L 514.81 312.39 M 514.81 296.81 L 501.31 289.01 " /> 

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 501.31 323.43 L 501.31 342.29 L 517.64 351.72 L 533.98 342.29 L 533.98 323.43 L 517.64 314 M 533.98 342.29 L 550.31 351.76 L 566.64 342.29 L 566.64 323.43 L 550.31 314 L 533.98 323.43 M 550.31 351.76 L 550.31 408.34 L 566.64 417.81 L 582.97 408.38 L 582.97 389.48 L 566.64 380.05 L 550.31 389.48" />  

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 504.14 325.07 L 504.14 340.65 M 517.64 348.45 L 531.14 340.65 M 550.31 348.45 L 563.81 340.65 M 563.81 325.07 L 550.31 317.27 M 531.14 325.07 L 517.64 317.27 M 566.64 383.32 L 580.14 391.12 M 580.14 406.7 L 566.64 414.5 M 553.14 406.7 L 553.14 391.12 " /> 

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 582.97 408.34 L 599.31 417.81 L 615.64 408.38 L 631.97 417.81 L 631.97 436.67 L 615.64 446.1 L 599.31 436.67 L 599.31 417.81 " /> 

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 602.14 419.45 L 602.14 435.04 M 615.64 442.83 L 629.14 435.04 M 629.14 419.45 L 615.64 411.66" /> 

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 602.14 581.65 L 602.14 566.07 M 615.64 558.27 L 629.14 566.07 M 629.14 581.65 L 615.64 589.45 " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 615.64 446.1 L 615.64 555 L 599.31 564.43 L 599.31 583.29 L 615.64 592.72 L 631.97 583.29 L 631.97 564.43 L 615.64 555" /> 

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 631.97 564.43 L 648.3 555 L 664.63 564.43 L 680.97 555 L 697.3 564.43 L 697.29 583.29 L 680.97 592.43 L 664.63 583 L 664.63 564.43 M 631.97 583.29 L 648.3 592.43 L 648.3 611.29 L 664.63 620.72 L 680.97 611.29 L 680.97 592.43 L 664.63 583 L 648.3 592.43  " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 648.3 558.27 L 661.8 566.07 M 680.97 558.27 L 694.47 566.07 M 694.47 581.65 L 680.97 589.45 M 678.13 609.65 L 664.63 617.45 M 651.14 609.65 L 651.14 594.07 M 661.8 581.65 L 648.3 589.45  " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 680.97 611.29 L 832.81 698.8 L 832.81 717.66 L 849.14 727.09 L 849.14 745.96 L 865.48 755.39 L 881.81 745.96 L 881.81 727.1 L 865.48 717.66 M 832.81 698.8 L 849.14 689.37 L 865.48 698.8 L 865.48 717.66 L 849.14 727.09 " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 835.65 716.02 L 835.65 700.44 M 849.14 692.64 L 862.64 700.44 M 865.48 720.94 L 878.98 728.73 M 878.98 744.32 L 865.48 752.12 M 851.98 744.32 L 851.98 728.73 M 849.14 723.82 L 862.64 716.02" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 865.48 755.39 L 865.48 819.17 L 849.14 828.6 L 849.14 847.46 L 865.48 856.77 M 865.48 819.17 L 881.81 828.6 L 881.81 847.46 L 865.48 856.77 L 865.48 875.63 1017.32 962.68" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--2400-center="stroke-dashoffset:0;" d = "M 865.48 822.44 L 878.98 830.23 M 878.98 845.82 L 865.48 853.62 M 851.98 845.82 L 851.98 830.23" />
</svg>
</object>
<object id="endpath" class="pathobject">
<svg version="1.1" id="startpath2" width="960px" height="2000px" viewBox="0 0 960 2000 " >

<!-- Main Path -->
<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M -57.32 844.53 L 94.52 929.68 L 110.86 920.17 L 127.19 929.6 L 127.19 948.46 L 110.86 957.89 L 94.52 948.46 L 94.52 929.68 " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 97.36 931.23 L 97.36 946.82 M 110.86 954.62 L 124.35 946.82 M 124.35 931.23 L 110.86 923.44 " /> 

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 110.86 957.89 L 110.86 1058 L 94.52 1067.43 L 94.52 1086.29 L 78.19 1095.76 L 78.19 1114.62 L 94.52 1124.05 L 110.86 1114.62 L 110.86 1095.72 L 94.52 1086.29 L 110.86 1095.72 L 127.19 1086.29 L 127.19 1067.43 L 110.86 1058 L 127.19 1067.43 L 127.19 1086.29 L 143.52 1095.76 L 143.52 1114.62 L 127.19 1124.05 L 110.86 1114.62" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 110.86 1061.27 L 124.35 1069.07 M 124.35 1084.65 L 110.86 1092.45 M 140.69 1112.99 L 127.19 1120.78 M 108.02 1112.99 L 94.52 1120.78 M 81.02 1112.99 L 81.02 1097.4 M 97.36 1084.65 L 97.36 1069.07" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 143.52 1114.62 L 159.85 1124.1 L 159.85 1142.67 L 143.52 1152.1 L 143.52 1170.96 L 159.85 1180.38 L 176.19 1170.96 L 192.52 1180.38 L 208.85 1170.96 L 225.18 1180.38 L 225.18 1199.38 L 241.51 1208.81 L 257.85 1199.38 L 257.85 1180.38 L 274.18 1170.96 L 274.18 1152.1 L 257.85 1142.67 L 241.51 1152.1 L 225.18 1142.96 L 225.18 1124.1 L 208.85 1114.67 L 192.52 1124.1 M 192.52 1142.96 L 176.19 1152.1 L 159.85 1142.67 " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 176.19 1152.1 L 176.19 1170.96 M 192.52 1142.96 L 208.85 1152.1 L 225.18 1142.96 M 208.85 1152.1 L 208.85 1170.96 M 225.18 1180.38 L 241.51 1170.96 L 241.51 1152.1 L 241.51 1170.96 L 257.85 1180.38 M 192.52 1124.1 L 192.52 1142.96" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 146.35 1153.73 L 146.35 1169.32 M 159.85 1177.11 L 173.35 1169.32 M 173.35 1153.73 L 159.85 1145.94 M 192.52 1177.11 L 206.02 1169.32 M 206.02 1153.73 L 192.52 1145.94 M 195.35 1141.32 L 195.35 1125.73 M 208.85 1117.94 L 222.35 1125.73 M 222.35 1141.32 L 208.85 1149.11 M 225.18 1145.94 L 238.68 1153.73 M 257.85 1145.94 L 271.35 1153.73 M 271.35 1169.32 L 257.85 1177.11 M 255.01 1197.74 L 241.51 1205.54 M 228.02 1197.74 L 228.02 1182.16 M 238.68 1169.32 L 225.18 1177.11 " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 274.18 1152.1 L 290.51 1142.67 L 357.63 1180.52 L 373.96 1171.09 L 390.29 1180.52 L 390.29 1199.38 L 373.96 1208.81 L 357.63 1199.38 L 357.63 1180.52 " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 360.46 1197.74 L 360.46 1182.16 M 373.96 1174.36 L 387.46 1182.16 M 387.46 1197.74 L 373.96 1205.54" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 390.29 1199.38 L 485.48 1253.95 L 501.81 1263.38 L 501.81 1282.23 L 485.48 1291.66 L 469.15 1282.23 L 469.15 1263.38 L 485.48 1253.95" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--4000-center="stroke-dashoffset:0;" d = "M 485.48 1257.22 L 498.98 1265.01 M 498.98 1280.6 L 485.48 1288.39 M 471.98 1280.6 L 471.98 1265.01" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--100-bottom="stroke-dashoffset:0;" d = "M 485.48 1291.66 L 485.48 1652.61 L 501.81 1662.04 L 501.81 1680.9 L 485.48 1690.33 L 469.15 1680.9 L 469.15 1662.04 L 485.48 1652.61 " />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--5000-bottom="stroke-dashoffset:0;" d = "M 485.48 1655.88 L 498.98 1663.68 M 498.98 1679.26 L 485.48 1687.06 M 471.98 1679.26 L 471.98 1663.68"/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--5000-bottom="stroke-dashoffset:0;" d = "M 485.48 1690.33 L 485.48 1734.26 L 447.48 1755.32 L 431.15 1745.89 L 414.81 1755.32 L 414.81 1774.25 L 398.48 1783.68 L 398.48 1802.58 L 382.15 1812.01 L 382.15 1830.87 L 398.48 1840.3 L 414.81 1830.87 L 414.81 1812.01 L 431.15 1802.54 L 431.15 1783.68 L 447.48 1774.18 L 447.48 1755.32" />

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--1000-bottom="stroke-dashoffset:0;" d = "M 444.65 1756.96 L 431.15 1749.17 M 431.15 1783.68 L 414.81 1774.25 M 414.81 1812.01 L 398.48 1802.58 M 444.65 1772.55 L 431.15 1780.15 M 417.65 1756.96 L 417.65 1772.55 M 401.31 1785.32 L 401.31 1800.9 M 428.31 1800.9 L 414.81 1808.7 M 411.98 1829.24 L 398.48 1837.03 M 384.98 1829.24 L 384.98 1813.65 "/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--1000-bottom="stroke-dashoffset:0;" d = "M 485.48 1734.26 L 485.48 1764.33 L 537.56 1790.66 L 553.9 1781.23 L 570.23 1790.66 L 586.56 1781.23 L 602.89 1790.66 L 602.89 1809.52 L 586.56 1818.91 L 586.56 1837.82 L 570.23 1847.25 L 553.9 1837.77 L 553.9 1818.91 L 537.56 1809.52 L 537.56 1790.66"/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--1000-bottom="stroke-dashoffset:0;" d = "M 540.4 1792.3 L 540.4 1807.89 M 553.9 1815.68 L 567.4 1807.89 M 567.4 1792.3 L 553.9 1784.51 M 570.23 1843.93 L 583.73 1836.14 M 586.56 1815.68 L 600.06 1807.89 M 600.06 1792.3 L 586.56 1784.51 M 570.23 1809.48 L 553.9 1818.91 M 570.23 1809.48 L 570.23 1790.66  M 570.23 1809.48 L 586.56 1818.91 M 556.73 1820.55 L 556.73 1836.14 "/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--1000-bottom="stroke-dashoffset:0;" d = "M 382.15 1830.87 L 365.82 1840.35 L 349.48 1830.92 L 349.48 1812.01 L 333.15 1802.58 L 316.82 1812.01 L 316.82 1830.87 L 333.15 1840.35 L 333.15 1859.21 L 349.48 1868.63 L 365.82 1859.21 L 365.82 1840.3 L 349.48 1830.87 L 333.15 1840.3 "/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--1000-bottom="stroke-dashoffset:0;" d = "M 346.65 1813.65 L 333.15 1805.85 M 319.65 1813.65 L 319.65 1829.24 M 335.98 1841.98 L 335.98 1857.57 M 349.48 1865.36 L 362.98 1857.57 M 362.98 1841.98 L 349.48 1834.19"/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--5000-bottom="stroke-dashoffset:0;" d = "M 586.56 1837.77 L 602.89 1847.25 L 619.23 1837.82 L 635.56 1847.25 L 635.56 1866.11 L 651.89 1875.58 L 651.89 1894.44 L 635.56 1903.87 L 619.23 1894.44 L 619.23 1875.53 L 602.89 1866.11 L 602.89 1847.25 "/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--5000-bottom="stroke-dashoffset:0;" d = "M 605.73 1848.88 L 605.73 1864.47 M 619.23 1841.09 L 632.72 1848.88 M 635.56 1866.11 L 619.23 1875.53 M 622.06 1877.22 L 622.06 1892.8 M 635.56 1900.6 L 649.06 1892.8 M 649.06 1877.22 L 635.56 1869.42"/>

<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-bottom="stroke-dashoffset:10000;" stroke-miterlimit="10" data--3000-bottom="stroke-dashoffset:0;" d = "M 635.56 1903.87 L 635.47 1986.5 M 349.48 1868.63 L 349.23 1986.25 "/>


</svg>
</object>
<img src="/sites/all/themes/icm/images/start.png" id="startbutton" alt="start" />
      <?php print render($page['content']); ?>

<?php if ($is_front): ?>

<h3>Scientific Investing. Bringing Life into Focus.</h3>

<div class="leftside">
<img src="/sites/all/themes/icm/images/looks.jpg" width="374" />
<h4>WHAT IT <br />
<span>LOOKS</span><br />
LIKE TO WORKW ITH ICM</h4>

<a href="/left-brain" id="leftbrain">
<svg version="1.1" id="leftgears" viewBox="0 0 319.7 276" width="319.7" height="276">
	<polygon fill="#9FB7B3" points="79.9,276 0,138 79.9,0 239.8,0 319.7,138 239.8,276 	"/>

	<polygon fill="#9FB7B3" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" points="92.4,255.5 25,139.5 92.4,23.5 227.3,23.5 294.7,139.5 227.3,255.5 	"/>

	<path fill="#FFFFFF" class="gears" id="gear1" d="M175.8,145.9l0.2-18.4l-10.9-0.1c-0.9-4.1-2.5-8-4.7-11.7l7.8-7.6L155.4,95l-7.8,7.6	c-3.6-2.3-7.5-3.9-11.6-4.9l0.1-10.9l-18.4-0.2l-0.1,10.9c-4.1,0.9-8.1,2.5-11.7,4.7l-7.6-7.8l-13.2,12.9l7.6,7.8		c-2.3,3.7-4,7.6-5,11.6l-10.9-0.1l-0.2,18.4l10.9,0.1c0.9,4.1,2.5,8,4.7,11.7l-7.8,7.6l12.9,13.2l7.8-7.6c3.6,2.3,7.5,3.9,11.6,4.9	l-0.1,10.9l18.4,0.2l0.1-10.9c4.1-0.9,8-2.5,11.7-4.7l7.6,7.8l13.2-12.9l-7.6-7.8c2.3-3.7,4-7.6,5-11.6L175.8,145.9z M111.1,151.1c-7-7.1-8.1-18-2.8-26.4c0.9-1.4,1.9-2.7,3.1-3.8c4.1-4,9.5-6.1,15.2-6.1c5.7,0.1,11,2.3,15,6.4c7,7.1,8.1,18,2.8,26.4
c-0.9,1.4-1.9,2.7-3.1,3.8c-4.1,4-9.5,6.1-15.2,6.1C120.4,157.5,115.1,155.2,111.1,151.1z">
		 <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 125.86 137.25" to="360 125.86 137.25" dur="5s"  repeatCount="indefinite"/></path>

	<path id="gear2" fill="#FFFFFF" class="gears" d="M233.3,109.8l0.1-10.4l-6.2-0.1c-0.5-2.3-1.4-4.5-2.7-6.6l4.4-4.3l-7.3-7.4l-4.4,4.3 c-2-1.3-4.2-2.2-6.5-2.8l0.1-6.2l-10.4-0.1l-0.1,6.2c-2.3,0.5-4.6,1.4-6.6,2.7l-4.3-4.4l-7.4,7.3l4.3,4.4c-1.3,2.1-2.2,4.3-2.8,6.6 l-6.2-0.1l-0.1,10.4l6.2,0.1c0.5,2.3,1.4,4.5,2.7,6.6l-4.4,4.3l7.3,7.4l4.4-4.3c2,1.3,4.2,2.2,6.5,2.8l-0.1,6.2l10.4,0.1l0.1-6.2 c2.3-0.5,4.5-1.4,6.6-2.7l4.3,4.4l7.4-7.3l-4.3-4.4c1.3-2.1,2.2-4.3,2.8-6.6L233.3,109.8z M196.7,112.8c-3.9-4-4.6-10.2-1.6-14.9 c0.5-0.8,1.1-1.5,1.8-2.2c2.3-2.3,5.4-3.5,8.6-3.5c3.2,0,6.2,1.3,8.5,3.6c3.9,4,4.6,10.2,1.6,14.9c-0.5,0.8-1.1,1.5-1.8,2.2 c-2.3,2.3-5.3,3.5-8.6,3.5C202,116.4,198.9,115.1,196.7,112.8z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 204.86 105" to="360 204.86 105" dur="5s"  repeatCount="indefinite"/></path>

	<path id="gear3" class="gears" d="M238.3,192.1l5.7-13.4l-8-3.4c0.6-3.3,0.6-6.6,0.1-10l8-3.2l-5.4-13.5l-8,3.2c-1.9-2.7-4.3-5.1-7-7.1l3.4-8
l-13.4-5.7l-3.4,8c-3.3-0.6-6.7-0.6-10-0.1l-3.2-8l-13.6,5.4l3.2,8c-2.8,2-5.2,4.4-7.2,7l-7.9-3.4l-5.7,13.4l7.9,3.4
c-0.6,3.3-0.6,6.6-0.1,10l-8,3.2l5.4,13.6l8.1-3.2c1.9,2.7,4.3,5.1,7,7.1l-3.4,8l13.4,5.7l3.4-8c3.3,0.6,6.7,0.6,10,0.1l3.2,8.1 l13.6-5.4l-3.2-8c2.8-2,5.2-4.4,7.2-7L238.3,192.1z M189.3,176.2c-2.9-7.3-0.5-15.6,6-20.2c1.1-0.7,2.2-1.4,3.4-1.9

c4.2-1.7,8.8-1.6,13,0.1c4.2,1.8,7.4,5.1,9.1,9.3c2.9,7.3,0.5,15.6-6,20.2c-1.1,0.7-2.2,1.4-3.4,1.9c-4.2,1.7-8.8,1.6-13-0.1 C194.2,183.7,191,180.4,189.3,176.2z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="360 204.86 171.25" to="0 204.86 171.25" dur="5s" repeatCount="indefinite"/></path>
</svg>
</a>

</div>


<div class="rightside">
<img src="/sites/all/themes/icm/images/feels.jpg" width="370" />
<h4>WHAT IT <br />
<span>FEELS</span><br />
LIKE TO WORKW ITH ICM</h4>

<a href="/right-brain" id="rightbrain"><svg version="1.1" id="rightbrian" width="319.7px" height="276px"

	 viewBox="0 0 319.7 276" enable-background="new 0 0 319.7 276" xml:space="preserve">



	<polygon id="border" fill="#9FB7B3" points="79.9,276 0,138 79.9,0 239.8,0 319.7,138 239.8,276 	"/>
	<polygon fill="#9FB7B3" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" points="92.4,255.5 25,139.5 92.4,23.5 227.3,23.5 294.7,139.5 227.3,255.5 	"/>

		





<path fill="#FFFFFF" d="M219.6,94.5c-6-14.5-19.2-27.2-42.1-32.6c-50.2-11.7-88.2,40-68.7,79.5c18.3,37,47.6,27.6,55.5,9.8

	c3.3-7.4,8.4-12.7,16.9-1.8c5.3,6.8,18.6,12.5,32.2-5C225,127.6,225.6,109,219.6,94.5z M146.5,82.6c5.4,2.2,8,8.4,5.8,13.8

	c-2.2,5.4-8.4,8-13.8,5.8c-5.4-2.2-8-8.4-5.8-13.8C135,83,141.1,80.4,146.5,82.6z M122.7,125.1c-5.4-2.2-8-8.4-5.8-13.8

	c2.2-5.4,8.4-8,13.8-5.8c5.4,2.2,8,8.4,5.8,13.8C134.2,124.7,128.1,127.3,122.7,125.1z M133.8,152.4c-5.4-2.2-8-8.4-5.8-13.8

	c2.2-5.4,8.4-8,13.8-5.8c5.4,2.2,8,8.4,5.8,13.8C145.4,152,139.2,154.6,133.8,152.4z M166.9,94c-5.4-2.2-8-8.4-5.8-13.8

	c2.2-5.4,8.4-8,13.8-5.8c5.4,2.2,8,8.4,5.8,13.8C178.5,93.6,172.3,96.2,166.9,94z M197.9,130.4c-6.6-2.7-10.6-7.9-9.1-11.6

	c1.5-3.7,8.1-4.4,14.6-1.7c6.6,2.7,10.6,7.9,9.1,11.6C211,132.4,204.5,133.1,197.9,130.4z"/>

<path id="brush" fill="#FFFFFF" stroke="#9FB7B3" stroke-width="3" stroke-miterlimit="10" d="M126.9,169.1c-8,10.3,1.1,18.5-9.3,34

	c-4.7,7,23.3,1.2,35.5-14.4c5.1-6.6,2.3-14.9-4.9-20.3S132.1,162.4,126.9,169.1z M218.3,76.7c-5.4-4-52,45-65.5,62.5

	c-6.7,8.7-8.7,13.1-10.7,16.4c-0.9,1.5,0.6,1.7,1.2,1.9c3.3,1.1,5.6,2.3,8.8,4.6c3.1,2.3,4.9,4.2,6.9,7c0.4,0.6,1,1.8,2.2,0.6

	c2.8-2.8,6.6-5.9,13.3-14.5C188,138,223.7,80.7,218.3,76.7z"/>


	<path id="standarddrop" fill="#FFFFFF" d="M139,184c-0.5-0.7-0.9-1.2-0.9-1.5c0-0.1-0.1-0.1-0.1-0.1c-0.1,0-0.1,0-0.1,0.1c-0.1,0.3-0.5,0.8-0.9,1.4

		c-1,1.4-2.4,3.4-2.4,4.7c0,1.9,1.5,3.4,3.4,3.4s3.4-1.5,3.4-3.4C141.3,187.4,139.9,185.4,139,184z">

<animate attributeName="d" values="M139,184c-0.5-0.7-0.9-1.2-0.9-1.5c0-0.1-0.1-0.1-0.1-0.1c-0.1,0-0.1,0-0.1,0.1c-0.1,0.3-0.5,0.8-0.9,1.4

		c-1,1.4-2.4,3.4-2.4,4.7c0,1.9,1.5,3.4,3.4,3.4s3.4-1.5,3.4-3.4C141.3,187.4,139.9,185.4,139,184z;
		
		M119.7,214c-1.1-1.6-2.1-3.1-2.4-3.7c-0.1-0.1-0.2-0.2-0.4-0.3c-0.1,0-0.3,0.1-0.4,0.2

		c-0.2,0.6-1.2,2-2.3,3.5c-2.5,3.6-5.9,8.5-5.9,11.6c0,4.7,3.8,8.5,8.5,8.5s8.5-3.8,8.5-8.5C125.5,222.3,122.1,217.5,119.7,214z;

M123.2,271.5c-1.1-1.6-1.5-1.2-2.1-1.7c-0.1-0.1-3.1-0.6-3.2-0.6c-0.1,0-2.5-0.5-2.6-0.3

		c-0.9,0.3-2.3,0.3-3.4,1.8c-2.4,3.5-2.7,3.8-2.7,6.9c0,4.6,3.7,5.5,8.3,5.5s8.3-0.9,8.3-5.5C125.8,274.6,125.5,274.9,123.2,271.5z;"
    dur="1s" repeatCount="indefinite" />
	
	
	<g>

	<path fill="#FFFFFF" d=""/>

</g>

<g>

	<path fill="#FFFFFF" d=""/>

</g>

<g>

	<path fill="#FFFFFF" d=""/>

</g>
	
		
		
</path>

	<polygon id="border" fill="#9FB7B3" points="82.07,276 93.71,257 220.29,257 221.93,276 "/>

</svg></a>

</div>
</div>

</div>
	

</div>

  <script type="text/javascript">
//  skrollr.init({forceHeight: false});
		jQuery('#more').click(function() {
 		setTimeout(function(){
			skrollr.init({forceHeight: false});
			jQuery('.pathobject svg path').css('stroke','#333');

			}, 4000);
		});
</script>     


 <?php endif; ?>
      
      
      <?php print $feed_icons; ?>
    </div>

    <?php print render($page['sidebar_first']); ?>
    <?php print render($page['sidebar_second']); ?>
  </div>

  <div class="l-footer" role="contentinfo">
    <?php print render($page['footer']); ?>
  </div>
</div>

