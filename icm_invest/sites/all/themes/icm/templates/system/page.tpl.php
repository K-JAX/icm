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

<?php drupal_add_js('https://code.jquery.com/jquery-1.10.2.js', 'external'); ?>
<?php drupal_add_js('https://code.jquery.com/ui/1.11.2/jquery-ui.min.js', 'external'); ?>
<?php drupal_add_js('sites/all/themes/icm/js/jquery.dialogOptions.js'); ?>
<?php drupal_add_css('https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css', 'external'); ?>
<?php drupal_add_css(drupal_get_path('theme', 'icm') . '/css/font-awesome.min.css'); ?>
  
<?php

function hex2rgb($hex) {
    $hex = str_replace('#', '', $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    
    return implode(',', $rgb); // returns the rgb values separated by commas
}

$bg = array(
    array(
        'color' => '#fff',
        'image' => 'handsraising.jpg'
    ),
    array(
        'color' => '#a5b2af',
        'image' => 'driverkid.jpg'
    ),
    array(
        'color' => '#9caca2',
        'image' => 'shortpainter.jpg'
    ),
    array(
        'color' => '#9ba4a1',
        'image' => 'rockwall.jpg'
    ),
    array(
        'color' => '#fff',
        'image' => 'Sunset.jpg'
    )
);

$i = rand(0, count($bg)-1); // generate random number size of the array

if (isset($node->nid) && count($node->nid) > 0){
    if ($node->nid != 1 && $node->nid !=2 && $node->nid !=3) {
        $selectedBg = $bg[$i];
    }
} else {
    $selectedBg = $bg[$i];
}

?>

<?php if(isset($selectedBg)): ?>
<style type="text/css">
body.page-user,
body.node-type-webform,
body.node-type-filedepot-folder,
body.node-type-page,
body.page-blog,
body.node-type-article,
body.section-blog.not-logged-in,
.page-archive {
    padding: 0 5% 200px;
    background-color: <?php echo $selectedBg['color']; ?>;
    background-image: url(/sites/all/themes/icm/images/<?php echo $selectedBg['image']; ?>);
    background-position: center bottom;
    background-repeat: no-repeat;
    background-size: 100% auto;
}

body.page-user .l-content,
body.node-type-webform .l-content,
body.node-type-filedepot-folder .l-content,
body.node-type-page .l-content,
body.page-blog .l-content,
body.node-type-article .l-content,
body.section-blog.not-logged-in .l-content,
.page-archive .l-content,
.l-region--sidebar-second {
    background-color: <?php echo $selectedBg['color']; ?>;
    background-color: rgba(<?php echo hex2rgb($selectedBg['color']); ?>,0.75);
}
</style>
<?php endif; ?>

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
			<a id="main-content"></a>
			<?php print render($title_prefix); ?>
			<?php if ($title): ?>
				<!--<h1><?php print $title; ?></h1>-->
				<span class="border"></span>
			<?php endif; ?>
			
			<?php
			print render($title_suffix);
			print $messages;
			print render($tabs);
			print render($page['help']);
			?>
			
			<?php if ($action_links): ?>
				<ul class="action-links"><?php print render($action_links); ?></ul>
			<?php endif; ?>

			<?php print render($page['content']); ?>
			<?php if (isset($node) && $node->nid != 1 && $node->nid !=2 && $node->nid !=3)  : ?>
			<a class="site-logo" href="/"><img src="/sites/all/themes/icm/images/icmlogo.png" /></a>
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

