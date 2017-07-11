<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Article" it would result in "node-article". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. page, article, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */

$hexlink_path_only = '<polygon fill="none" points="27.5,92 1,46.5 27.5,1 80.5,1 107,46.5 80.5,92 "/><path fill="#FFFFFF" d="M79.1,3l25.3,43.5L79.3,90H28.7L3.5,46.5L28.7,3H79 M81,0H27L0,46.5L27,93h54l27-46.5L81,0L81,0z"/>';
$hexlink_svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 108 93" enable-background="new 0 0 108 93" xml:space="preserve">' . $hexlink_path_only . '</svg>';

function br_tag($n) {
	$x = 0; $br_tags = '';
	while ($x < $n) { $br_tags .= '<br />'; $x++; }
	return $br_tags;
}

function cluster_svg($id, $style) {
	return '<svg version="1.1" id="' . $id . '" style="' . $style . '" data-top="stroke:rgb(200,200,200)" data-1000="stroke:rgb(255,255,255)" width="960px" height="1500px" viewBox="0 0 960 1500 " >
	<!-- Main Path -->
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data--5-top="stroke-dashoffset:10000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 483 0 L 483 221 L 466.5 230 L 466.5 249 L 483 258 L 483 277 L 500 286 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-200-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 483 221 L 500 230 L 517 221 L 533.5 230 L 533.5 249 L 517 258 L 516.5 277 L 500 286 M 500 230 L 500 249 L 517 258 M 483.5 258 L 500 249 M 500 286 L 500 306 L 516.5 315 L 516.5 334 L 533 343 L 550 334 L 566.5 343 L 582.5 334 L 582.5 315.28 L 566 306 L 550 315 L 533 306 L 516 315 M 550 315 L 550 334" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-200-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 469.5 232.28 L 469.5 247.28 M 483 224.73 L 496 232 M 517 224.73 L 530 232 M 530 247 L 517 254 M 513 275 L 500 282 M 486.5 275.28 L 486.5 260.28 M 519.5 317.28 L 519.5 332.28 M 533 309.73 L 546 317 M 546 332 L 533 339 M 566 309.73 L 579 317 M 579 332 L 566 339" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-250-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 533 343 L 533 362 L 516.5 371 L 516.5 390 L 533 399 L 549.5 390 L 549.5 371 L 533 362 M 582.5 334 L 598.5 343 L 598.5 362 L 615.5 371 L 632 362 L 631.5 343 L 648.5 334 L 648.5 315 L 632 306 L 615.5 315 L 615 334 L 631.5 343 L 632 362 L 649 371 L 649 390 L 632.5 399 L 632.5 418 L 649 427 L  " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-260-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 615 334 L 598.5 343 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-260-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 632 309.73 L 645 317 M 628 360 L 615 367 M 601.5 360.28 L 601.5 345.28 M 546 388 L 533 395 M 519.5 388.28 L 519.5 373.28" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-280-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top"stroke-dashoffset:0;" d = "M 632 309.73 L 645 317 M 628 360 L 615 367 M 601.5 360.28 L 601.5 345.28 M 546 388 L 533 395 M 519.5 388.28 L 519.5 373.28" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-290-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 649 390 L 665.5 399 L 665.5 418 L 649 427 L 649 522 L 665.5 531 L 665.5 550 L 649 559 632.5 550  M 649 522 L 632.5 531 L 632.5 550 L 615.5 559 L 599 550 L 582.5 559 L 565.5 550 L 565.5 531 L 549 522 L 532.5 531 L 532.5 550 L 549 559 L 565.5 550 M 615.5 559 L 615.5 578 L 632.5 587 L 649 578 L 665.5 587 L 665.5 606 L 649 615 L 632.5 606 L 632.5 587" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-280-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 649 393.73 L 662 401 M 662 416  L 649 423 M 635.5 416.28 L 635.5 401.28 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 615.5 578 L 599 587 L 582.5 578 M 582.5 559 L 582.5 578 L 565.5 587.28 L 565.5 606 L 548.5 615 L 532.5 606.14 L 515.5 615 L 515 634 L 498.5 643 L 498.5 662 L 515 671 L 531.5 662 L 531.5 643 L 548.5 634 L 548.5 615 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 649 525 L 662 533 M 662 548 L 649 555 M 612 561 L 599 553 M 585.5 561.28 L 585.5 576.28 M 635.5 589.28 L 635.5 604.28 M 649 611 L 662 604 M 562 533 L 549 525.73 M 535.5 533.28 L 535.5 548.28 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-310-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 531.5 643 L 515.5 634 L 498.5 643 L M 515.5 615 L 515.5 634" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-310-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 485.5 632.28 L 485.5 617.28 M 499 609.73 L 512 617 M 532 609.73 L 545 617 M 545 632 L 532 639 M 528 660 L 515 667 M 501.5 660.28 L 501.5 645.28" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-320-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 515.5 615 L 499 606 L 482.5 615 L 482.5 634 L 498.5 643 L 498.5 662 L 482.5 672.78 L 482.5 746.28 L 506.5 760 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 506.5 760 L 523 751 L 539.5 760 L 539.5 779 L 523.5 788 L 506 779 L 506.5 760 M 506.5 779 L 489.8 788 L 489.5 807 L 506 816 L 522.5 807 M 540 779 L 556.5 788 L 556.5 807 L 540 816 L 523.5 807 L 523.5 788 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 509.5 777.28 L 509.5 762.28 M 523 754.73 L 536 762 M 540 782.73 L 553 790 M 553 805 L 540 812 M 519 805 L 506 812 M 492.5 805.28 L 492.5 790.28" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 506 816 L 505.5 835 L 450.5 835 L 450.5 854.14 L 434 863.07 L 417.5 854 L 417.5 835 M 450.5 835 L 434 826 L 417.5 835 L 401 826.07 L 384.5 835.14 L 368.5 826 L 368.5 807 L 352 798 L335.5 807 L 335.5 826 L 318.5 835.28 L 318.5 M 368.5 826 L 352 835 M 335.5 826 L 352 835 L 352 854 L 335 863 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 447 852 L 434 859 M 420.5 852.28 L 420.5 837.28 M 434 829.73 L 447 837  M 365 809 L 352 801.73 M 338.5 809.28 L 338.5 824.28 M 321.5 837.28 L 321.5 852.28 M 335 859 L 348 852 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-350-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 368.5 826 L 352 835 L 335.5 826 M 368.5 826 L 352 835 L 335.5 826 L 318.5 835.28 L 318.5 854 L 335 863 L 351.5 854 L 351.5 835" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 318.5 854 L 302 863 L 285.5 854 L 285.5 835 L 269 826 L 252.5 835 L 236 826 L 219.5 835 L 219.5 854 L 236.5 863 L 236.5 882 L 219.5 891 L 219 910 L 202.5 919 L 202.5 938 L 219 947 L 235.5 938 L 235.5 919 L 219 910" />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 235.5 919 L 252.5 910 L 252.5 891 L 236 882 M 252.5 891 L 269.5 882 L 269.5 863 M 285.5 854 L 269.5 863 L 252.5 854 L 252.5 835 M 236.5 863 L 253 854 M 269 829.73 L 282 837 M 282 852 L 269 859 M 266 880 L 253 887 M 249 908 L 236 915 M 232 936 L 219 943 M 205.5 936.28 L 205.5 921.28 M 222.5 908.28 L 222.5 893.28 M 239.5 880.28 L 239.5 865.28 M 222.5 852.28 L 222.5 837.28 M 236 829.73 L 249 837 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 335 863 L 335 960 L 318.5 969 318.5 988 L 335 997 L 351.5 988 L 351.5 969 L 335 960 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-320-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 348 986 L 335 993 M 321.5 986.28 L 321.5 971.28 M 335 963.73 L 348 971 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 540 816 L 540 835 L 557 844 L 574 835 L 590.5 844 L 607 835 L 623.5 844 L 640 835 L 656.5 844 L 657 863 L 673.5 872 L 673.5 891 L 657 900 L 640.5 891 L 640.5 872 L 657 863 M 557.5 844 L 557.5 863 L 574 872 L 590.5 863 L 590.5 844 M 590.5 863 L 607 872 L 623.5 863 L 623.5 844 M 623.5 863 L 640.5 872 M 657 863 L 640.5 872 L 640.5 891 L 657 900"/>
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-280-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 560.5 861.28 L 560.5 846.28 M 574 838.73 L 587 846 M 607 838.73 L 620 846 M 640 838.73 L 653 846 M 657 866.73 L 670 874 M 670 889 L 657 896 M 643.5 889.28 L 643.5 874.28 M 620 861 L 607 868 M 587 861 L 574 868 M 653 861 L 640 868   " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 657 900 L 657 983.28 L 673.5 992 L 673.5 1011 L 657 1020 L 640.5 1011 L 640.5 992 L 657 983 M 657 1020 L 657 1039 L 639.5 1048 L 623 1039 606.5 1048 L606.5 1067 L 623 1076 622.5 1095 L 639 1104 L 655.5 1095 L 655.5 1076 L 639.5 1067 L 639.5 1048 M 639.5 1067 L 623 1076 L 567 1106 L 550.5 1097 L 533.5 1106 L 517 1097 L 500.5 1106 L 500.5 1125 L 517 1134 L 533 1125 L 533.5 1106 L 550 1097 L 549.5 1061 L 549.5 1042 L 533 1033 L 516.5 1042 L 516.5 1061 L 533 1070 L 549.5 1061 M 567 1106 L 567 1125 L 550 1134 L 533 1125 M 550 1134 L 549 1153 L 533 1162 L 516.5 1153 L 516.5 1134 "/>
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 657 986.73 L 670 994 M 670 1009 L 657 1016 M 643.5 1009.28 L 643.5 994.28 M636 1050 L 623 1042.73 M 609.5 1050.28 L 609.5 1065.28 M 639 1070.73 L 652 1078 M 652 1093 L 639 1100 M 625.5 1093.28 L 625.5 1078.28 M 550 1100.73 L 563 1108 M 563 1123 L 550 1130 M 546 1151 L 533 1158 M 519.5 1151.28 L 519.5 1136.28 M 503.5 1123.28 L 503.5 1108.28 M 517 1100.73 L 530 1108 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-340-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 546 1059 L 533 1066 M 519.5 1059.28 L 519.5 1044.28 M 533 1036.73 L 546 1044 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-500-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 533 1162 L 482.5 1190 L 482.5 1270 L 447.5 1290 L 447.5 1309 L 431 1318 L 414.5 1309 L 414.5 1290 M 447.5 1290 L 431 1281 L 414.5 1290 L 414.5 1271 L 365 1243 L 348.5 1252 L 348.5 1233 L 332 1224 L 315.5 1233 L 315.5 1252 L 332 1261 L 348.5 1252 M 332 1224 L 332.5 1205 L 316 1196 L 300 1205 L 300 1224 L 316 1233 M 315.5 1252 L 299 1261 L 282.5 1252 L 283 1233 L 300 1224 M 282.5 1233 L 266.5 1224 L 266.5 1205 L 283 1196 L 283.5 1177 L 300 1168 L 316.5 1177 L 333 1168 L 349.5 1177 L 349.5 1196 L "/>
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 444 1292 L 431 1284.73 M 417.5 1292.28 L 417.5 1307.28 M 431 1314 L 444 1307 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-450-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 399.5 1149 L 416.5 1140 L 416.5 1121 L 400 1112 L 383.5 1121 L 383 1140 L 399.5 1149 L 399.5 1168 L 383 1177 L 366.5 1168 L 366.5 1149 L 383 1140 M 383 1177 L 383 1196 L 366 1205 L 350 1196 L 332.5 1205 L 316 1196 L 300 1205 L 283.5 1196 L 84 1298 L 67.5 1307 L67.5 1326 L 84 1335 L 100.5 1326 L 100.5 1307 L 84 1298 "/>
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-430top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 332 1227.73 L 345 1235 M 345 1250 L 332 1257 M 312 1250 L 299 1257 M 285.5 1250.28 L 285.5 1235.28 M 296 1222 L 283 1229 M 269.5 1222.28 L 269.5 1207.28 M 286.5 1194.28 L 286.5 1179.28 M 300 1171.73 L 313 1179 M 333 1171.73 L 346 1179 M 369.5 1166.28 L 369.5 1151.28 M 386.5 1138.28 L 386.5 1123.28 M 400 1115.73 L 413 1123 M 413 1138 L 400 1145 M 396 1166 L 383 1173 M 329 1222 L 316 1229 M 302.5 1222.28 L 302.5 1207.28 M 316 1199.73 L 329 1207 " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 84 1301.73 L 97 1309 M 97 1324 L 84 1331 M 70.5 1324.28 L 70.5 1309.28  " />
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 84 1335 L 100.5 1344 L 100.5 1398 L 55.5 1423 L 55.5 1442 L 39 1451 L 22.5 1442 L 22.5 1423 L 39 1414 L 55.5 1423 M 22.5 1423 L 6 1414 L -10.5 1423 L -10.5 1442 L 6 1451 L 22.5 1442 M 6 1451 L 6 1470 L -10 1479 L -26.5 1470 L -26.5 1451 L -10.5 1442"/>
	<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 39 1417.73 L 52 1425 M 52 1440 L 39 1447 M 19 1440 L 6 1447 M 19 1425 L 6 1417.73 M 3 1468 L -10 1475" />
</svg>';
}

?>

<?php
	drupal_add_js('sites/all/themes/icm/js/left.js');
	drupal_add_js('sites/all/themes/icm/js/cycle.js');
?>

<div id="skrollr-body">
	<?php print cluster_svg('rightcluster1', 'stroke:rgb(200,200,200)'); ?>
	
	<section id="preprop" class="cf">
		<div class="sectionlimit">
			<div class="text-center whitetext cf">
				<p>
					<span>Our Value Proposition</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider white"/></svg>
				</p>
				<p>Our <span>organization</span> was formed on the <span>premise</span> that <span>large</span> investors, <span>multi-billion dollar</span> pension plans, endowments and foundations tend to <span>do</span> a <span>better</span> job of <span>navigating capital markets</span> than smaller institutions or individual investors.</p>
			</div>
		</div>
	</section>
	
	<section id="proposition" class="cf">
		<div class="sectionlimit">
			<div id="boardcontent" class="text-center">
				<p><span>Why</span> is <span>this?</span></h2>
				<p>In our opinion there are two primary reasons for this discrepancy.</p>
			</div>
			<div class="hexlink-container">
				<div class="hexlink">
					<a id="openequipped">
						<?php print $hexlink_svg; ?>
						<span>1</span>
					</a>
					Better Equipped &amp; Trained
				</div>
				<div class="hexlink">
					<a id="opencollective">
						<?php print $hexlink_svg; ?>
						<span>2</span>
					</a>
					Collective Purchasing Power
				</div>
			</div>
			
			<hr />

			<div style="text-align:center;" class="text-center">
				<p>At <span class="case">iCM</span>, we use our collective <span>purchasing power, independence</span> and <span>professionalism</span> to <span>deliver</span> those same <span>advantages</span> to those who <span>choose not</span> to amortize the cost of a <span>fully staffed</span> investment department.</p>
				<hr />

				<div id="twocharts">
					<svg version="1.1"  width="140" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 177 321" enable-background="new 0 0 177 321" xml:space="preserve">
						<path
							style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:820;stroke-dashoffset:0; stroke:#FFF; fill:none;"
							stroke-miterlimit="10"
							data-bottom-top="stroke-dashoffset:820; stroke-dasharray:820"
							data-center="stroke-dashoffset:300; stroke-dasharray:0"
							d="M 14.5 21.5 L 14.5 293.5 L 68.5 293.5 L 68.5 21.5 L 14.5 21.5 M 100.5 205.5 L 100.5 293.5 L 148.5 293.5 L 148.5 205.5 L 100.5 205.5"
						/>
					</svg>
					<p>
						S&amp;P 500: 11.1%<br> 
						Vs<br>
						Stock Fund Investor: 3.7%
					</p>
				</div>

				<div id="twomorecharts">
					<svg version="1.1"  width="170" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 149.12 76.83" enable-background="new 0 0 149.12 76.83" xml:space="preserve">
						<path
							style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:300;stroke-dashoffset:0; stroke:#FFF; fill:none;"
							stroke-miterlimit="10"
							data-bottom-top="stroke-dashoffset:820; stroke-dasharray:820"
							data-center="stroke-dashoffset:300; stroke-dasharray:0"
							d= "M 0.11 65.03 L 61.61 51.14 L 98.87 14.58 L 144.22 -0.41"
						/>
						<path
							style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:300;stroke-dashoffset:0; stroke:#FFF; fill:none;"
							stroke-miterlimit="10"
							data-bottom-top="stroke-dashoffset:820; stroke-dasharray:820"
							data-center="stroke-dashoffset:300; stroke-dasharray:8"
							d= "M 4.78 75.34 L 66.28 61.44 L 103.54 24.89 L 148.89 9.9"
						/> 
					</svg>
					<p>Small endowments underperformed <br>by 1.5% &ndash; 2%</p>
				</div>
				
				<div id="chartssource">
					<p>
						S&P/Individual Investor Returns – Dalbar QAIB Study 2014,  Data 30 Years Ending 12/2013<br />
						Endowment Results – 2014 Nacubo-Commonfund Endowment Study
					</p>
				</div>

				<hr />
			</div>
		</div>
	</section>
	
	<section id="investment">
		<object id="object2" class="flip">
			<?php print cluster_svg('rightcluster2', 'stroke:rgb(250,250,250); opacity:1;'); ?>
		</object>
		
		<div class="sectionlimit">
			<div style="text-align:center;" class="text-center whitetext cf">
				<p>
					<span>Our Investment Thesis</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider white"/></svg>
				</p>
				<p>Investing at iCM begins with an uncommon, but powerful investment thesis. Many investors, both individual and institutional, experience subpar results with their investment programs because they focus on the wrong thing. In our experience, investors tend to focus on return and ignore risk until it is too late. This leads to two damaging consequences:</p>
				
				<div class="hexlink">
					<a href="/behavioral-consequences">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 108 95" enable-background="new 0 0 108 95" xml:space="preserve">
							<?php print $hexlink_path_only; ?>
							<g transform="translate(15,13)">
								<path fill="#FFFFFF" d="M23.3,34.5h-3.9c-0.3,0-0.5,0.3-0.5,0.5v11.3c0,0.3,0.2,0.5,0.5,0.5h3.9c0.3,0,0.5-0.2,0.5-0.5V35	C23.9,34.7,23.6,34.5,23.3,34.5L23.3,34.5z M23.3,34.5"/>
								<path fill="#FFFFFF" d="M55.6,34.5h-3.9c-0.3,0-0.5,0.3-0.5,0.5v11.3c0,0.3,0.2,0.5,0.5,0.5h3.9c0.3,0,0.5-0.2,0.5-0.5V35	C56.1,34.7,55.9,34.5,55.6,34.5L55.6,34.5z M55.6,34.5"/>
								<path fill="#FFFFFF" d="M30.6,28h-3.9c-0.3,0-0.5,0.2-0.5,0.5v17.8c0,0.3,0.2,0.5,0.5,0.5h3.9c0.3,0,0.5-0.2,0.5-0.5V28.5 C31.1,28.2,30.9,28,30.6,28L30.6,28z M30.6,28"/>
								<path fill="#FFFFFF" d="M47.2,28h-3.9c-0.3,0-0.5,0.2-0.5,0.5v17.8c0,0.3,0.2,0.5,0.5,0.5h3.9c0.3,0,0.5-0.2,0.5-0.5V28.5 C47.7,28.2,47.5,28,47.2,28L47.2,28z M47.2,28"/>
								<path fill="#FFFFFF" d="M38.7,32h-3.9c-0.3,0-0.5,0.2-0.5,0.5v13.9c0,0.3,0.2,0.5,0.5,0.5h3.9c0.3,0,0.5-0.2,0.5-0.5V32.5 C39.3,32.2,39,32,38.7,32L38.7,32z M38.7,32"/>
								<path fill="#FFFFFF" d="M21.4,27.4c1.2,0,2.1-0.9,2.1-2.1c0-0.2,0-0.4-0.1-0.6l4.4-3.2c0.3,0.1,0.6,0.2,0.9,0.2 c0.6,0,1.1-0.3,1.5-0.7l4.1,2.4c0,0.1,0,0.2,0,0.4c0,1.1,0.9,2.1,2.1,2.1c1.1,0,2-0.9,2.1-2l5.6-1.6c0.4,0.5,1,0.9,1.7,0.9 c0.5,0,0.9-0.2,1.2-0.4l4.7,3.2c0,0.2-0.1,0.3-0.1,0.5c0,1.2,0.9,2.1,2.1,2.1c1.2,0,2.1-0.9,2.1-2.1s-0.9-2.1-2.1-2.1 c-0.5,0-0.9,0.2-1.2,0.4l-4.7-3.2c0-0.2,0.1-0.3,0.1-0.5c0-1.2-0.9-2.1-2.1-2.1c-1.1,0-2,0.9-2.1,2L38,22.7 c-0.4-0.5-1-0.9-1.7-0.9c-0.5,0-1,0.2-1.3,0.5l-4.3-2.5c0,0,0-0.1,0-0.1c0-1.2-0.9-2.1-2.1-2.1c-1.2,0-2.1,0.9-2.1,2.1	c0,0.3,0.1,0.6,0.2,0.9l-4.2,3c-0.3-0.2-0.7-0.4-1.2-0.4c-1.2,0-2.1,0.9-2.1,2.1C19.3,26.5,20.2,27.4,21.4,27.4L21.4,27.4z M21.4,27.4"/>
							</g>
						</svg>
						Behavioral
					</a>
				</div>
				
				<div class="hexlink">
					<a href="/mathematical-consequences">
						<?php print $hexlink_svg; ?>
						<span><i class="fa fa-calculator"></i></span>
						Mathematical
					</a>
				</div>
			</div>
			
			<?php print br_tag(9); ?>
		
			<div style="text-align:center;" class="text-center whitetext cf">
				<p>
					<span>The Fallacies of Investing</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider white"/></svg>
				</p>
				
				<?php
				$questions = array(
					array(
						'q' => 'There have been two bad financial bubbles in the last 15 years. Do you believe it can happen again?',
						'a' => 'Most will answer yes to this question.  The reality is that bubbles have existed throughout history in our own stock market including bubbles in 1901, 1929, 1966, 1999, &amp; 2008.  Non-US markets have also experience financial bubbles, including the Japanese equity and real estate bubbles.  Many will present the Dutch Tulip Bubble in 1637 as the first speculative bubble.'
					),
					array(
						'q' => 'Do you believe that most things in the world are perfect at all times?',
						'a' => 'While there are some things that happen most of the time, there are few things that are perfect at all times.'
					),
					array(
						'q' => 'Do you believe financial markets are perfect?',
						'a' => 'If financial markets are perfectly priced at all times, there should be no deviation from fair value and, as a result, bubbles would not exist.  Most would agree that financial markets like many things are not perfect at all times.'
					)
				);
				?>
				<p>In conjunction with our prior discussion on Investor behavioral tendencies that lead to error, there are an additional set of preconceived notions that lead to equally damaging results. We refer to these as the iCM Fallacies of Investing and they represent common investor practices that at the surface seem quite reasonable, but tend to be flawed for a variety of reasons. To better frame this lesson we pose three questions:</p>
				
				<?php foreach($questions as $key => $question) : ?>
				<div class="accordion">
					<h2><?php print $key + 1 . '. ' . $question['q']; ?></h2>
					<div class="hidden-content">
						<p><?php print $question['a']; ?></p>
					</div>
				</div>
				<?php endforeach; ?>
				
				<div id="investment-links">
					<div class="hexlink">
						<a href="/active">
							<?php print $hexlink_svg; ?>
							<span><i class="fa fa-retweet"></i></span>
						</a>
						Active
					</div>
					<div class="hexlink">
						<a href="/efficient-frontier">
							<?php print $hexlink_svg; ?>
							<span><i class="fa fa-random"></i></span>
						</a>
						Efficient Frontier
					</div>
					<div class="hexlink">
						<a href="/passive">
							<?php print $hexlink_svg; ?>
							<span><i class="fa fa-chevron-down"></i></span>
						</a>
						Passive
					</div>
				</div>
			</div>
			
			<?php print br_tag(9); ?>
		
			<div class="text-center">
				<p>
					<span>Investment Philosophy</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider white"/></svg>
				</p>
			</div>
		
			<div class="text-center">
				<p>In order to be <span>successful</span> as an <span>investor</span> it is <span>vital</span> to have a <span>well-articulated</span> investment <span>philosophy</span> that is based on <span>tried</span> and <span>true</span> investment <span>principles</span>.</p>
			</div>
		
			<div class="text-center">
				<p>While a <span>focus</span> on investment <span>philosophy</span> permeates the large-dollar investor landscape, in our experience, it is <span>surprising</span> how little focus is given to <span>investment philosophy</span> by smaller institutions, individual investors, and even some financial advisors. <span>Philosophy</span> is crucial to your <span>success</span> as an investor; it is essentially the <span>road map, blueprint,</span> or even <span>genetic code</span> of an investment program. That is, investment philosophy <span>defines</span> our very <span>character</span> and <span>nature</span>.</p>
				<p> <span>We designed our site with this in mind</span>.</p>
				<p>A <span>child</span> with both parents exceeding 6 feet in height is <span>less likely</span> to be <span>below average</span> in height than those that are <span>born</span> from two parents that are both 5 feet tall (<a href="http://www.reuters.com/article/2014/10/05/us-science-height-idUSKCN0HU0QI20141005" target="_blank">Reuters 2014</a>). Philosophy <span>epitomizes</span> a permanent <span>state of individuality.</span></p>
			</div>
		
			<div class="text-center lincoln">
				<p>"It is said an Eastern monarch once charged his wise men to invent him a sentence, to be ever in view, and which should be true and appropriate in all times and situations. They presented him the words: 'And this, too, shall pass away.' How much it expresses! How chastening in the hour of pride!—how consoling in the depths of affliction! 'And this, too, shall pass away.' And yet let us hope it is not quite true."</p>
				<p>-ABRAHAM LINCOLN</p>
			</div>
			
			<div class="lincolnaudio">
				<svg version="1.1" id="openlincoln" class="opener" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 108 95" enable-background="new 0 0 108 95" xml:space="preserve">
					<path fill="#333333" d="M74.2,55.3c-0.5-1.4-3.3-1.5-4.1-1.5c0,0-0.9,0-1.8,0c-0.4,0-0.9-0.2-1.2-0.5c-0.3-0.3-0.5-0.7-0.5-1.2 V35.4c0-2.5-2.1-4.6-4.6-4.6H46.1c-2.5,0-4.6,2.1-4.6,4.6V52c0,0.3-0.1,0.5-0.3,0.6c-0.2,0.2-0.5,0.2-0.7,0.1 c-3.1-0.8-6.7-1.3-6.7,1.4c0,0,0.9,7.4,12.2,7.4c3.7,0,7.4-0.9,10.9-1.9c0.3-0.1,0.6-0.1,0.9,0C59,59.9,60.5,60,62,60 c4.4,0,9.1-1,10.9-2.4C73.2,57.3,74.5,56.4,74.2,55.3L74.2,55.3z M60.9,49.3V34.9c0-0.7,0.5-1.2,1.2-1.2c0.7,0,1.2,0.5,1.2,1.2 v14.4c0,0.7-0.5,1.2-1.2,1.2C61.4,50.5,60.9,50,60.9,49.3L60.9,49.3z M71.6,56.7c-1.5,1.2-6.1,2.1-10.1,2 c-0.1,0-0.2-0.1-0.2-0.2c0-0.1,0.1-0.2,0.2-0.3c3.7-1.3,7-2.7,9.5-2.9c1.2-0.1,1.3,0.1,1.4,0.3C72.3,55.6,72.6,55.9,71.6,56.7 L71.6,56.7z M71.6,56.7"/>
					<path fill="#333333" d="M71.1,77H36.9L19.9,47l17.1-30h34.2l17.1,30L71.1,77z M38.1,75h31.8l15.9-28L69.9,19H38.1L22.2,47L38.1,75 z"/>
					<g class="playing">
						<path fill="#333333" d="M71.1,77H36.9L19.9,47l17.1-30h34.2l17.1,30L71.1,77z"/>
						<path fill="#FFFFFF" d="M52.8,34.3c-0.5-0.2-1-0.1-1.4,0.3l-7.6,7.7h-5.9c-0.7,0-1.3,0.6-1.3,1.3v9.1c0,0.7,0.6,1.3,1.3,1.3h5.8 l7.7,7.7c0.2,0.2,0.6,0.4,0.9,0.4c0.2,0,0.3,0,0.5-0.1c0.5-0.2,0.8-0.7,0.8-1.2V35.4C53.6,34.9,53.3,34.5,52.8,34.3z"/>
						<path fill="#FFFFFF" d="M65.9,48c0-4.7-2.8-9-7.2-10.9c-0.6-0.3-1.4,0-1.7,0.7c-0.3,0.6,0,1.4,0.7,1.7c3.4,1.5,5.6,4.8,5.6,8.5 c0,3.7-2.2,7-5.6,8.5c-0.6,0.3-0.9,1-0.7,1.7c0.2,0.5,0.7,0.8,1.2,0.8c0.2,0,0.3,0,0.5-0.1C63.1,57,65.9,52.7,65.9,48z"/>
						<path fill="#FFFFFF" d="M60.3,48c0-2.5-1.5-4.7-3.8-5.7c-0.6-0.3-1.4,0-1.7,0.7c-0.3,0.6,0,1.4,0.7,1.7c1.4,0.6,2.2,1.9,2.2,3.4 c0,1.5-0.9,2.8-2.2,3.4c-0.6,0.3-0.9,1-0.7,1.7c0.2,0.5,0.7,0.8,1.2,0.8c0.2,0,0.3,0,0.5-0.1C58.9,52.7,60.3,50.5,60.3,48z"/>
						<path fill="#FFFFFF" d="M60.9,32.2c-0.6-0.3-1.4,0-1.7,0.7c-0.3,0.6,0,1.4,0.7,1.7c5.4,2.3,8.9,7.6,8.9,13.5 c0,5.9-3.5,11.2-8.9,13.5c-0.6,0.3-0.9,1-0.7,1.7c0.2,0.5,0.7,0.8,1.2,0.8c0.2,0,0.3,0,0.5-0.1c6.3-2.7,10.4-8.9,10.4-15.8 C71.4,41.1,67.3,34.9,60.9,32.2z"/> 
					</g>
				</svg>
				<audio controls id="abelincolnaudio">
					<source src="/sites/all/themes/icm/audio/abelincoln.m4a" type="audio/mp4" />
					<!-- <source src="/sites/all/themes/icm/audio/abelincoln.mp3" type="audio/mpeg" /> -->
					<source src="/sites/all/themes/icm/audio/abelincoln.ogg" type="audio/ogg" />
				</audio>
			</div>
		</div>
	</section>
	
	<section class="paralax">
		<img style="width:25%" src="/sites/all/themes/icm/images/formula-01.svg" alt="Eqastion" title="Equasion" 
        data-200-bottom="top:100px; filter: blur(4px);" 
		data-center-center="top:0px; filter: blur(0px);"
        data--200-top="top:-100px; filter: blur(2px);" />
		
        <img style="width:12%; left:33%;" src="/sites/all/themes/icm/images/formula-02.svg" alt="Eqastion" title="Equasion" 
        data-200-bottom="top:0px; filter: blur(2px);" 
		data-center-center="top:90px; filter: blur(0px);"
        data--200-top="top:180px; filter: blur(1px);" />
		
        <img style="width:16%; left:33%;" src="/sites/all/themes/icm/images/formula-03.svg" alt="Eqastion" title="Equasion"
        data-200-bottom="top:-70px;left:30%; filter: blur(2px);" 
		data-center-center="top:0px; left:31%; filter: blur(0px);"
        data--200-top="top:50px;left:33%; filter: blur(4px);" />
        
		<img style="width:50%; left:50%;" src="/sites/all/themes/icm/images/formula-04.svg" alt="Eqastion" title="Equasion" 
        data-200-bottom="top:50px; filter: blur(5px)" 
		data-center-center="top:0px; filter: blur(0px);"
        data--200-top="top:-50px; filter: blur(1px)" />
        
		<img style="width:13%; left:50%;" src="/sites/all/themes/icm/images/formula-05.svg" alt="Eqastion" title="Equasion" 
        data-200-bottom="top:100px; left:50%; filter: blur(2px);" 
		data-center-center="top:90px; left:53%; filter: blur(0px);"
        data--200-top="top:80px;left:57%; filter: blur(3px);" />
        
		<img style="width:25%; left:75%;" src="/sites/all/themes/icm/images/formula-06.svg" alt="Eqastion" title="Equasion" 
        data-200-bottom="top:100px; filter: blur(3px);" 
		data-center-center="top:75px; filter: blur(0px);"
        data--200-top="top:50px; filter: blur(1px);" />
	</section>

	<section id="industry">
		<object id="object3">
			<?php print cluster_svg('rightcluster3', 'stroke:rgb(50,50,50); opacity:1;'); ?>
		</object>

		<div class="sectionlimit">
			<div class="text-center">
				<p>
					<span>OUR PHILOSOPHY</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider"/></svg>
				</p>
				<p>Our <span>investment philosophy</span> begins with a <span>clear objective</span> and the following observations in mind: To construct <span>well-diversified</span> portfolios that will generate <span>positive excess returns</span>, relative to their policy benchmark, over the course of a <span>full market cycle.</span> A market cycle can be <span>defined</span> as a period of general business activity <span>measured</span> from the <span>peak</span> of the prior business cycle to the <span>peak</span> of the current business cycle. <span>Market cycles</span> generally cover a 5-7 year period, but can be <span>longer</span> or <span>shorter</span>.</p>
			</div>
			
			<div id="firstpager" class="pager"></div>
			
			<ol class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="6000" data-cycle-slides="> li" data-cycle-pager="#firstpager" data-cycle-pager-template="<a class='hexlink pager'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 92.1 77.5' enable-background='new 0 0 92.1 77.5' xml:space='preserve'><polygon stroke='#000000' stroke-miterlimit='10' points='28.1,68.5 10.8,38.5 28.1,8.5 62.7,8.5 80,38.5 62.7,68.5'/></svg><span>{{slideNum}}</span></a>">
				<li>Diversification is a critical step in portfolio construction.</li>
				<li>Performance variability is dominated by asset allocation decisions.</li>
				<li>Active &amp; passive risk decisions affect terminal wealth.</li>
				<li>Valuations matter.</li>
				<li>Markets are long term efficient, can be short term inefficient.</li>
				<li>Mean reversion can add or subtract value.</li>
				<li>Market timing is destructive.</li>
				<li>Successful investing requires conviction &amp; discipline.</li>
			</ol>
			
			<div class="text-center">
				<p>With the <span>above</span> observations <span>in mind</span>, our <span>philosophy</span> features several <span>core beliefs.</span></p>
			</div>
			
			<div id="secondpager" class="pager"></div>
			
			<ol class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="6000" data-cycle-slides="> li" data-cycle-pager="#secondpager" data-cycle-pager-template="<a class='hexlink pager'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 92.1 77.5' enable-background='new 0 0 92.1 77.5' xml:space='preserve'><polygon stroke='#000000' stroke-miterlimit='10' points='28.1,68.5 10.8,38.5 28.1,8.5 62.7,8.5 80,38.5 62.7,68.5'/></svg><span>{{slideNum}}</span></a>">
				<li>At iCM risk is managed through a budgeting process.</li>
				<li>Regardless of the changing nature of returns, volatility will always be present.</li>
				<li>We believe that over long periods of time, most markets are fairly efficient.</li>
				<li>We believe that just about anything important in making an investment decision exhibits a mean reverting quality.</li>
				<li>We believe that while valuations matter, relative valuations matter more and are more easily interpreted.</li>
			</ol>
			
			<hr class="superexpander">
			
			<div class="text-center">
				<p><span>We believe</span> that over the course of a full market cycle, an <span>actively managed</span> asset allocation can act as a mechanism to <span>reduce risk</span> and <span>enhance returns</span>. We <span>understand</span> that periods of &nbsp;<span>over</span> and <span>under valuation</span> can persist for extended periods of time, and <span>believe</span> that patient investors are <span>rewarded</span>.</p>
			</div>
			
			<div class="text-center">
				<p>Two <span>critical</span> elements in our investment process are <span>conviction</span> and <span>patience</span> in the <span>face</span> of <span>adversity</span>.</p>
			</div>
			
			<div class="text-center">
				<p>As such, having a <span>control</span> mechanism in place acts to <span>reinforce conviction</span> in the face of adversity and as a <span>check</span> and <span>balance</span> mechanism. By acquiring <span>out of favor</span> assets, we recognize that <span>markets</span> can <span>ignore</span> valuations in the <span>short term</span> causing our performance to trail until <span>markets revert</span> to their long-term equilibrium <span>relationship</span>.</p>
			</div>
			
			<div class="text-center">
				<p>We <span>view</span> this temptation to <span>capitulate</span> as the price that we pay for <span>excess</span> returns. In such cases, valuations will act as our <span>control mechanism</span>. We will continue to be <span>steadfast</span> in our convictions until <span>valuations point</span> us elsewhere.</p>
			</div>

			<div class="text-center" style="text-align:center">
				<?php print br_tag(2); ?>
				<p><span>Valuations Matter</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider"/></svg>
				</p>
				<p>At iCM we take investment philosophy very seriously. While there are many intricacies to our own investment philosophy that we invite you to explore, central to our belief system is the concept that Valuations Matter. For investors with long term goals exceeding a market cycle, but shorter than the 100 years that most would consider to be an academic time horizon, few things matter more in driving risk and return in asset classes than valuations, in particular beginning period valuations.</p>
			</div>
		</div>
	</section>

	<section id="philosophy">
		<div class="sectionlimit">
			<div class="text-center">
				<p><a class="calloutbox laylay" href="http://app.brainshark.com/icm-institutional/vu?pi=zHSzCJdhVzFlJZz0&intk=446572483&advisorid=3000550"><span>Watch</span> a <span>Presentation</span> on the <span class="case">iCM</span> <span>investment Philosophy</span></a></p>
			</div>
		</div>
	</section>
	
	<section class="paralax">
		<img style="width:25%" src="/sites/all/themes/icm/images/formula-07.svg" alt="Eqastion" title="Equasion" 
		data-200-bottom="top:120px; left:1%; width:21%; filter: blur(4px);" 
		data-center-center="left:0%; top:0px; width:25%; filter: blur(0px);"
		data--200-top="top:-120px; left:-1%; width:27%; filter: blur(2px);" />

		<img style="width:23%; left:3%;" src="/sites/all/themes/icm/images/formula-08.svg" alt="Eqastion" title="Equasion" 
		data-200-bottom="left:4%; top:200px; width:18%; filter: blur(2px);" 
		data-center-center="left:3%; top:100px; width:23%; filter: blur(0px);"
		data--200-top="left:4%; top:-10px; width:20%; filter: blur(1px);" />

		<img style="width:31%; left:26%;" src="/sites/all/themes/icm/images/formula-09.svg" alt="Eqastion" title="Equasion" 
		data-200-bottom="top:-70px; left:28%; width:15%; filter: blur(3px);"  
		data--100-center-center="top:20px; left:27%; width:18%; filter: blur(2px);" 
		data--200-top="top:200px; left:25%; width:31%; filter: blur(-1px);" />

		<img style="width:44%; left:30%;" src="/sites/all/themes/icm/images/formula-10.svg" alt="Eqastion" title="Equasion" 
		data-200-bottom="top:150px; left:35%; width:44%; filter: blur(2px);" 
		data-center-center="top:50px; left:48%; width:30%; filter: blur(0px);" 
		data--200-top="top:-70px; left:58%; width:20%; filter: blur(4px);"
		/>

		<img style="width:44%; left:50%;" src="/sites/all/themes/icm/images/formula-11.svg" alt="Eqastion" title="Equasion" 
		data-200-bottom="top:40px; left:52%" 
		data--200-top="top:-80px; left:47%" />

		<img style="width:44%; left:54%;" src="/sites/all/themes/icm/images/formula-12.svg" alt="Eqastion" title="Equasion" 
		data-200-bottom="top:180px; left:58%" 
		data--200-top="top:50px; left:49%" />
	</section>
	
	<section id="process">
		<div class="sectionlimit">
			<div class="text-center">
				<hr />
				<p>
					<span>Our Process</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider"/></svg>
				</p>
			</div>
		
			<div class="text-center">
				<p><span class="case">iCM's</span> <span>investment process</span> is a <span>manifestation</span> of our <span>investment philosophy</span>. That is, <span>Our belief system</span> should be apparent in the implementation of <span>our portfolio</span>.</p>
			</div>

			<?php
			$hexlink_dark = '<path class="icolink-back" fill="none" d="M71.1,77H36.9L19.9,47l17.1-30h34.2l17.1,30L71.1,77z"/><path fill="#333333" d="M71.1,77H36.9L19.9,47l17.1-30h34.2l17.1,30L71.1,77z M38.1,75h31.8l15.9-28L69.9,19H38.1L22.2,47L38.1,75 z"/>';
			$hexlink_dark_play = '<g class="playing hide"><path fill="#333333" d="M71.1,77H36.9L19.9,47l17.1-30h34.2l17.1,30L71.1,77z"/><path fill="#FFFFFF" d="M52.8,34.3c-0.5-0.2-1-0.1-1.4,0.3l-7.6,7.7h-5.9c-0.7,0-1.3,0.6-1.3,1.3v9.1c0,0.7,0.6,1.3,1.3,1.3h5.8 l7.7,7.7c0.2,0.2,0.6,0.4,0.9,0.4c0.2,0,0.3,0,0.5-0.1c0.5-0.2,0.8-0.7,0.8-1.2V35.4C53.6,34.9,53.3,34.5,52.8,34.3z"/><path fill="#FFFFFF" d="M65.9,48c0-4.7-2.8-9-7.2-10.9c-0.6-0.3-1.4,0-1.7,0.7c-0.3,0.6,0,1.4,0.7,1.7c3.4,1.5,5.6,4.8,5.6,8.5 c0,3.7-2.2,7-5.6,8.5c-0.6,0.3-0.9,1-0.7,1.7c0.2,0.5,0.7,0.8,1.2,0.8c0.2,0,0.3,0,0.5-0.1C63.1,57,65.9,52.7,65.9,48z"/><path fill="#FFFFFF" d="M60.3,48c0-2.5-1.5-4.7-3.8-5.7c-0.6-0.3-1.4,0-1.7,0.7c-0.3,0.6,0,1.4,0.7,1.7c1.4,0.6,2.2,1.9,2.2,3.4 c0,1.5-0.9,2.8-2.2,3.4c-0.6,0.3-0.9,1-0.7,1.7c0.2,0.5,0.7,0.8,1.2,0.8c0.2,0,0.3,0,0.5-0.1C58.9,52.7,60.3,50.5,60.3,48z"/><path fill="#FFFFFF" d="M60.9,32.2c-0.6-0.3-1.4,0-1.7,0.7c-0.3,0.6,0,1.4,0.7,1.7c5.4,2.3,8.9,7.6,8.9,13.5 c0,5.9-3.5,11.2-8.9,13.5c-0.6,0.3-0.9,1-0.7,1.7c0.2,0.5,0.7,0.8,1.2,0.8c0.2,0,0.3,0,0.5-0.1c6.3-2.7,10.4-8.9,10.4-15.8 C71.4,41.1,67.3,34.9,60.9,32.2z"/></g>';
			?>
			<div class="text-center processaudios">
				<div class="processaudio">
					<a class="icolink" id="openprocess1">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 -16 108 95" enable-background="new 0 0 108 95" xml:space="preserve">
							<?php print $hexlink_dark; ?>
							<path fill="#333333" d="M67.7,35.2h3.2c0,0,0.6-2.4-2.1-2.5h-6.1c0-0.2-0.1-0.4-0.3-0.4L47.8,29c-0.2,0-0.4,0.1-0.5,0.3 c0,0,0,0.1,0,0.1H47c0-0.1,0-0.1,0-0.2c-0.1-0.2-0.3-0.3-0.5-0.2l-9.1,4.4c-0.2,0.1-0.3,0.3-0.2,0.5l-1,0c0,0-0.5,1.2,4,1.2h5.1 v2.9h6.7v-2.9h15.1v19.6c0,0,0,0.1,0,0.1c-0.8,0.2-1.4,0.9-1.4,1.8c0,0.9,0.6,1.6,1.4,1.8v1.2c0,0.1,0.1,0.3,0.2,0.3l0.7,0.4 c0.1,0.1,0.1,0.2,0.1,0.3c0,0.1,0,0.2-0.1,0.3c-0.2,0.2-0.5,0.2-0.7,0c-0.2-0.2-0.4-0.2-0.6,0c-0.2,0.2-0.2,0.4,0,0.6 c0.2,0.2,0.6,0.4,0.9,0.4c0.3,0,0.7-0.1,0.9-0.4c0.2-0.2,0.4-0.6,0.4-0.9c0-0.3-0.1-0.7-0.4-0.9c0,0,0,0-0.1-0.1l-0.5-0.3v-1 c0.8-0.2,1.4-0.9,1.4-1.8c0-0.9-0.6-1.6-1.4-1.8c0,0,0-0.1,0-0.1V35.2z M46.2,33.8l-8.1,0.1l8.4-4L46.2,33.8z M50.9,32.7 L48.2,34l-0.5-4.1l12.6,2.8H50.9z M68.3,56.7c0,0.6-0.5,1-1,1c-0.6,0-1-0.5-1-1c0-0.6,0.5-1,1-1C67.9,55.7,68.3,56.1,68.3,56.7 L68.3,56.7z M68.3,56.7"/>
							<rect x="43.7" y="38.5" fill="#333333" width="6.5" height="6.7"/>	
							<rect x="44.8" y="45.9" fill="#333333" width="4.3" height="15.7"/>		
							<path fill="#333333" d="M51.9,67l-2.8-1.7v-2.6h-4.3v2.1L42.1,67H51.9z M51.9,67"/>
							<?php print $hexlink_dark_play; ?>
						</svg>
						Portfolio Construction
					</a>

					<audio controls id="portfolioconstaudio">
						<source src="/sites/all/themes/icm/audio/portfolioconst.m4a" type="audio/mp4" />
						<!-- <source src="/sites/all/themes/icm/audio/portfolioconst.mp3" type="audio/mpeg" /> -->
						<source src="/sites/all/themes/icm/audio/portfolioconst.ogg" type="audio/ogg" />
					</audio>
				</div>
				
				<div class="processaudio">
					<a class="icolink" id="openprocess2">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 -16 108 95" enable-background="new 0 0 108 95" xml:space="preserve">
							<?php print $hexlink_dark; ?>
							<path fill="#333333" d="M74.5,54.6L68.6,37c0.3-0.3,0.5-0.8,0.5-1.2c0-1-0.8-1.9-1.9-1.9c-0.4,0-0.8,0.2-1.2,0.4 c-0.5-0.3-1.1-0.8-1.6-1.3c-1.6-1.4-3.5-2.9-5.7-2.9c-0.5,0-1,0.1-1.4,0.1c-0.6-1.2-1.9-2-3.3-2c-1.5,0-2.7,0.8-3.3,2 c-0.4-0.1-0.9-0.1-1.4-0.1c-2.2,0-4.1,1.6-5.7,2.9C43,33.5,42.5,34,42,34.3c-0.3-0.3-0.7-0.4-1.2-0.4c-1,0-1.9,0.8-1.9,1.9 c0,0.5,0.2,0.9,0.5,1.2l-5.9,17.6h-2.1c0,0,1.7,7.5,9.4,7.5c7.7,0,9.4-7.5,9.4-7.5h-2.1L42.2,37c0.2-0.2,0.3-0.5,0.4-0.9 c0.7-0.4,1.4-1,2.2-1.6c1.4-1.2,3-2.5,4.5-2.5c0.3,0,0.7,0,0.9,0.1c0.1,2,1.7,3.7,3.8,3.7c2,0,3.7-1.6,3.8-3.7 c0.3-0.1,0.6-0.1,1-0.1c1.5,0,3.1,1.3,4.5,2.5c0.7,0.6,1.5,1.2,2.2,1.6c0.1,0.3,0.2,0.6,0.4,0.9l-5.9,17.6h-2.2 c0,0,1.7,7.5,9.4,7.5c7.7,0,9.4-7.5,9.4-7.5H74.5z M35.5,54.6l5.3-15.9l5.3,15.9H35.5z M61.9,54.6l5.3-15.9l5.3,15.9H61.9z M61.9,54.6"/>
							<?php print $hexlink_dark_play; ?>
						</svg>
						Active Asset Allocation
					</a>

					<audio controls id="strategicaudio">
						<source src="/sites/all/themes/icm/audio/strategic.m4a" type="audio/mp4" />
						<!-- <source src="/sites/all/themes/icm/audio/strategic.mp3" type="audio/mpeg" /> -->
						<source src="/sites/all/themes/icm/audio/strategic.ogg" type="audio/ogg" />
					</audio>
				</div>
				
				<div class="processaudio">
					<a id="openprocess3" class="icolink" >
						<svg xml:space="preserve" enable-background="new 0 0 108 95" viewBox="0 -18 108 95" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
							<?php print $hexlink_dark; ?>
							<path d="M67.4,31.7v31.6c0,0.3-0.1,0.6-0.4,0.9c-0.2,0.2-0.5,0.4-0.9,0.4H41.8c-0.3,0-0.6-0.1-0.9-0.4c-0.2-0.2-0.4-0.5-0.4-0.9
								V31.7c0-0.3,0.1-0.6,0.4-0.9c0.2-0.2,0.5-0.4,0.9-0.4h24.3c0.3,0,0.6,0.1,0.9,0.4C67.3,31.1,67.4,31.4,67.4,31.7z M57.6,62.1h7.3
								V32.9H43.1v29.2h7.3v-4.3c0-0.2,0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2H57c0.2,0,0.3,0.1,0.4,0.2c0.1,0.1,0.2,0.3,0.2,0.4V62.1z
								 M47.9,36v1.2c0,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4V36
								c0-0.2,0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C47.9,35.6,47.9,35.8,47.9,36z M47.9,40.8V42
								c0,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2
								c0-0.2,0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C47.9,40.5,47.9,40.6,47.9,40.8z M47.9,45.7v1.2
								c0,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2
								c0-0.2,0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C47.9,45.4,47.9,45.5,47.9,45.7z M47.9,50.5v1.2
								c0,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2
								c0-0.2,0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C47.9,50.2,47.9,50.4,47.9,50.5z M47.9,55.4v1.2
								c0,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2
								c0-0.2,0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C47.9,55.1,47.9,55.2,47.9,55.4z M52.8,36v1.2
								c0,0.2-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2H51c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4V36c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C52.7,35.6,52.8,35.8,52.8,36z M52.8,40.8V42c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2H51c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C52.7,40.5,52.8,40.6,52.8,40.8z M52.8,45.7v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2H51c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C52.7,45.4,52.8,45.5,52.8,45.7z M52.8,50.5v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2H51c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C52.7,50.2,52.8,50.4,52.8,50.5z M57.6,36v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4V36c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2H57c0.2,0,0.3,0.1,0.4,0.2C57.6,35.6,57.6,35.8,57.6,36z M57.6,40.8V42c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2H57c0.2,0,0.3,0.1,0.4,0.2C57.6,40.5,57.6,40.6,57.6,40.8z M57.6,45.7v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2H57c0.2,0,0.3,0.1,0.4,0.2C57.6,45.4,57.6,45.5,57.6,45.7z M57.6,50.5v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2H57c0.2,0,0.3,0.1,0.4,0.2C57.6,50.2,57.6,50.4,57.6,50.5z M62.5,36v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4V36c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C62.4,35.6,62.5,35.8,62.5,36z M62.5,40.8V42c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C62.4,40.5,62.5,40.6,62.5,40.8z M62.5,45.7v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C62.4,45.4,62.5,45.5,62.5,45.7z M62.5,50.5v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C62.4,50.2,62.5,50.4,62.5,50.5z M62.5,55.4v1.2c0,0.2-0.1,0.3-0.2,0.4
								c-0.1,0.1-0.3,0.2-0.4,0.2h-1.2c-0.2,0-0.3-0.1-0.4-0.2c-0.1-0.1-0.2-0.3-0.2-0.4v-1.2c0-0.2,0.1-0.3,0.2-0.4
								c0.1-0.1,0.3-0.2,0.4-0.2h1.2c0.2,0,0.3,0.1,0.4,0.2C62.4,55.1,62.5,55.2,62.5,55.4z"/>
							<?php print $hexlink_dark_play; ?>
						</svg>
						Manager Selection Process
					</a>
					
					<audio controls id="mgrselectionaudio">
						<source src="/sites/all/themes/icm/audio/mgrselection.m4a" type="audio/mp4" />
						<!-- <source src="/sites/all/themes/icm/audio/mgrselection.mp3" type="audio/mpeg" /> -->
						<source src="/sites/all/themes/icm/audio/mgrselection.ogg" type="audio/ogg" />
					</audio>
				</div>
			</div>

			<img id="processing" src="/sites/all/themes/icm/images/LeftBrainGraph.svg" />
			<ol id="processing-screen-reader-help-text">
				<li>Tactical Decision: Over or underweight decision as well as product selection implemented in a series of meaningful steps building into a position as valuations become more compelling.</li>
				<li>Long Term Capital Markets Expectation: Historical estimates of risk and return.</li>
				<li>Long Term Valuation Analysis: Quantify the return opportunity from various valuation levels.</li>
				<li>Current Valuation Analysis: Measure and quantify fair value as well as dispersion from fair value while being mindful of paradigm shifts.</li>
			</ol>
		</div><!--end section limit -->
	</section>

	<section id="selection">
		<div class="sectionlimit">
			<?php print br_tag(16); ?>
			<div class="text-center">
				<p>
					<span>Benchmarking &amp; Performance Attribution</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider"/></svg>
				</p>
			</div>

			<div class="text-center">
				<p><span>Periodic performance measurement &amp; evaluation</span> is a <span>critical step</span> to any investment process if taken in the proper context. The <span>purpose</span> of benchmarking &amp; performance attribution in the <span>short term</span> is not to determine <span>success or failure</span> of a manager team. The purpose of periodic short-term evaluations is to <span>better understand</span> the determinants of performance, so as to <span>better understand risk</span> as it relates to a manager or portfolio. In order to get an <span>accurate</span> reading on manager skill, a manager/program must be given the <span>benefit</span> of a full market cycle, as <span>measured</span> from the prior peak level of general business activity to the next peak of general business/economic activity (usually 5-7 years), for performance alone to be <span>meaningful</span>. All clients are <span>given access</span> to a real time performance monitoring system where the portfolio returns, asset class returns, holdings returns, and benchmark returns are <span>updated daily</span>, allowing for <span>real time monitoring</span> of your investment dollars.</p>
			</div>
			
			<?php print br_tag(4); ?>
			
			<hr />
			
			<div id="understanding" class="text-center">
				<p class="title">
					<span>Understanding the Importance of Risk Management <br />in the Active Space</span><br />
					<svg xml:space="preserve" enable-background="new 0 0 148 9" viewBox="0 0 148 9" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="Layer_1" version="1.1"><path d="M145,5.2c0,1-0.8,1.8-1.8,1.8H4.8C3.8,7,3,6.2,3,5.2V3.8C3,2.8,3.8,2,4.8,2h138.3c1,0,1.8,0.8,1.8,1.8V5.2z" class="divider"/></svg>
				</p>
				<p>To truly understand and manage risk in investment portfolios, one must first acknowledge that this is not a single dimensional challenge, but a multi-dimensional one. In our experience, most investors, and for that matter most investment providers, acknowledge risk in terms of overall volatility within a portfolio. While this is important, it stops short of having a true grasp on total portfolio risk. For us, risk begins with total portfolio volatility, but extends into active risk &amp; active share. Most importantly, we seek a full understanding of the sources of these risks.</p> 
				
				<?php
				$definitions = array(
					array(
						'term'			=> 'Total Risk',
						'definition'	=> '<p>This can be thought of as the movements of a portfolio around its expected return.  In a statistical sense this can be explained by variance and standard deviation.</p>'
					),
					array(
						'term'			=> 'Active Risk',
						'definition'	=> '<p>While some tend to confuse trading frequency or activity with active risk, the two are only very loosely related.  Simply stated, active risk is the degree to which your portfolio behaves differently than its stated benchmark.  In order for a portfolio to be truly active, one must invest differently than the benchmark to achieve this goal.  There is no way to invest in the identical securities in the exact weights and do anything other than match the benchmark’s return.  As such, in order to outperform, one must be willing to vary from their stated benchmark and be willing to underperform in the short-term to achieve long-term success.  This can be accomplished through frequent trading, but it is not the only option.  In fact, one can own a low turnover portfolio comprised of a small portion of the S&amp;P 500 and show a rather large degree of active risk or variation from the S&amp;P 500.  In a statistical sense, active risk is tracking error or the standard deviation of excess returns.</p>'
					),
					array(
						'term'			=> 'Active Share',
						'definition'	=> '<p>Active share relates to the degree that a manager takes active decisions versus their stated benchmark. While a high active share does not imply that a manager will outperform their benchmark, academic research has shown that managers that exhibit a high active share have outperformed those that take less active decisions (See ‘How Active is Your Fund Manager?’ Cremers, Petajisto, 2006). At iCM, we examine active share in conjunction with active risk to better understand a manager’s investment style, the source of their excess returns, and build future return expectations.</p>'
					),
					array(
						'term'			=> 'Active Risk Contribution',
						'definition'	=> '<p>Active risk contribution speaks to the active risk a single stock, bond, or for that matter, manger may control within your portfolio.  While this may seem simple at heart, it escapes many investors that diversifying equally across managers may result in one manager unintentionally dominating the active risk profile of a portfolio.  As such, one must be cognizant of not only diversifying manager risk, but what their contribution is to overall risk and how strongly they are correlated with their peers and the broader portfolio.</p><p>Active risk can be attained both through tactical out-of-benchmark investment decisions and by staying within the definition of the benchmark but varying the weights of the securities owned.  While most active managers will attempt to identify or deliver alpha (i.e. risk adjusted excess returns) they fall woefully short for a variety of reasons, not the least of which is a flawed manager selection process.  This process begins with a true definition of alpha.  While we defined alpha as risk adjusted excess return, we left out the most important and often overlooked part of that definition.    That is, alpha is risk adjusted excess returns after identifying all possible betas that exist within a portfolio.  While most know beta as a risk factor related to the ups and downs of the market, in reality there are dozens, if not hundreds of betas that exist within a single portfolio.  It is only after identifying each meaningful beta influence that one can truly identify alpha.  This is perhaps the single most important step in portfolio construction and it is the one that is most often overlooked.</p>'
					)
				);
				?>
				
				<?php foreach($definitions as $definition) : ?>
				<div class="accordion">
					<h2><?php print $definition['term']; ?></h2>
					<div class="hidden-content">
						<?php print $definition['definition']; ?>
					</div>
				</div>
				<?php endforeach; ?>
				
				<?php print br_tag(7); ?>
				
				<p>At iCM, risk management is in the truest sense of the phrase, knowing what you own.  We take each dimension of portfolio risk very seriously in our effort to know what we, and you as a client, own better than anyone.</p>
			</div>

			<div class="text-center">
				<br />
				<p><span>It is this depth of knowledge that is our commitment to every investor and, by virtue of this understanding, you as our client can have greater insight into how we are on your side.</span></p>
			</div>
		</div>
	</section>
	
	<section id="getstarted">
		<a class="site-logo" href="/"><img src="/sites/all/themes/icm/images/icmlogo.png" /></a>
		<a class="paint-stroke-button" href="/right-brain">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 309.9 95" enable-background="new 0 0 309.9 95" xml:space="preserve">
				<path fill="#E42017" d="M150.6,61.7l-2.5-0.1c8.2,0,16.8,0.2,25.2,0.4c-18.4-1.9-40.2-3.5-54.4,0.5c-1.5-2.1-19.4-3.1-19.8-2.6 c-3.7,0.4-7.5,0.7-11.3,1c2.6-0.2,5.2-0.3,7.8-0.5c-2.6,0.2-5.2,0.4-7.8,0.5c-10.3,0.7-20.9,1-31.8,1c-5.5,0-11,0-16.6-0.1 c-2.8-0.1-5.6-0.1-8.4-0.2l-0.5,0c-0.2,0-0.1,0-0.2,0l-0.3,0l-0.6-0.1l-1-0.1c0.1-0.5,0.1-1,0.2-1.6l0-0.4l0-0.1c0,0,0,0,0-0.2 l0-0.7l0.1-2.9c0.1-3,0.2-7.1,0.3-11.8c0-2.4,0.1-4.9,0.1-7.5c0-0.5,0-0.4,0-0.4l0-0.2l0-0.3c0-0.2,0-0.4,0.1-0.6 c0.3,0,0.6,0.1,0.9,0.1l0.2,0l1.3,0c1,0,2.1,0,3.1,0.1c4.1,0.1,8.2,0.2,12,0.2c7.7,0.2,14.5,0.3,19.1,0.5c2.2,0.1,4.4,0.1,6.7,0.2 c-3.7-0.2-3.7-0.2-7.5-0.4c9.4-0.6,17.9-1.1,26.1-1.5c-1.4-0.3-1.7-0.6-5.1-1l4.2,0.2c3.8-0.9,12.6-0.8,16.8-1.2 c-0.9,0.5,2.4,0.6,5.2,0.6l-1.1-0.3c10.9,0.2,23.6-0.2,33.4-0.1c1.4,0,2.4,0.2,3,0.3l9.4-0.4c-0.7,0.6,7.8,0.5,3.3,0.9 c7-0.7,14.1-0.3,20.8-1c23.9-0.1,49.3-0.6,73.9-1.6l-0.6-0.2c4.3-0.2,8.4-0.6,12.7-0.9c2.1-0.2,4.4-0.3,6.7-0.3c1.2,0,2.4,0,3.6,0 c1.2,0,2.6,0,3.6,0.1c1.8-0.2,3.9-0.4,6.2-0.6c0.3,2.6,0.5,5.7,0.8,8.4c0.3,2.6,0.7,4.8,1.1,5.9c0.2,8.7,0.8,12.1,1.2,20.6 c0.6-2.2,0.8,8.2,1.3,4.1c0.9-5.6,0.1-5.9,0.9-10.7l-0.2,0.1c0.2-4.8,0.4-9.6,0.6-14.4l0.1-3.6l0.1-1.8l0.1-2.3 c0.1-4.1,0.1-8.2,0.2-12.3c-5.1-0.1-10.1-0.2-15.2-0.3c-3.2-0.1-6.4-0.1-9.6-0.2c-6.4-0.1-12.8-0.2-19.3-0.3 c-15.1,0.5-31.4,0.1-47.1,0.3c-16.9,0.2-35.1,0.6-49.6,1.2c-3.5,0.2-5.9-0.4-8.9-0.6c-13.3,0.3-30.3,0.1-45.3,0.4 c0.3,0,0.6,0,0.7,0c-8,0.1-14-0.5-21.8-0.4c0,0.2-1.2,0.2-1.8,0.3c-0.7-0.4-12.1,0-23.8,0.5c-5.8,0.2-11.7,0.5-16.3,0.7 c-1.1,0-2.2,0.1-3.2,0.1c-1.1,0-2.1,0-3,0.1c-2.2,0-3.7,0-4.3-0.1c-1.2,0-2.4,0.1-3.7,0.1c-0.9,0-1.8,0-2.7,0 c-0.1,2.5-0.1,5-0.2,7.5l-0.1,3.9l-0.1,2.7c-0.2,3.4-0.4,6.7-0.5,10.1c-0.2,3.3-0.3,6.6-0.5,9.8L17,59c0,0.6,0,1.2-0.1,1.8 c0,1.4-0.1,2.7-0.1,4.1c0,2.7-0.1,5.4-0.1,8.1c3.8,0,7.5,0.1,11.2,0c0.7,0,1.3-0.1,2-0.1l0.5,0l0.3,0l0.6-0.1 c0.8-0.1,1.6-0.2,2.4-0.3c1.6-0.2,3.1-0.4,4.4-0.6c2.5,0.4,3-0.3,6-0.2c7.6,1.7,12.1,1,8.2,0.4c6.3-0.2,12.6-0.1,18.2-0.1 c2.6-0.1,5.2-0.3,7.8-0.4c2.2-0.1,3.5,0.1,4.6,0.5c5.7-0.2,4,0.2,10,0.4c1.4,0.6,14.9-0.9,16.6-0.8l-1,0.1 c6.9,0.1,11.5,1.3,18.2,1.3c18.7,0.4,39.1,0,56.4,0.2c0.2-0.6-3.8,0.1-4-0.7c10.2,0.1,20.5,0.9,30.8,1c1.9,0.2,4.1,0.5,5,0.7 c3.3,0.2,1.9-0.3,4.4-0.2l0.3,0.6c3.5-0.5,5.2,0.6,8.5,0.4c0.2-0.2,1.4-0.3,2.6-0.2c0.1,0.6,3.6,0,3.5,0.5l0,0 c0.7,0,1.2,0,2.1,0.1c1.3-0.2,14-1.8,15.4-2.1l0.6,0.1c1.9,0,2.7-0.5,1.6-0.6l2.3,0l-0.3,0l2.3,0c0.4,0.1,0.9,0.3,0.3,0.6 c1.3-0.2,2.8-0.3,4.1-0.2c-3.7-0.4-8.2-0.9-12-1.5c1.6-0.2,4.4,0.1,6.1,0c2,0.4,6.2,0.7,9.5,1c0.7,0,1.2-0.7,2.8-0.4 c0.8,0.5,1.8,0,3.2,0.3c-1.6,0.2-3.1,0.1-4.6,0.1c0.3,0.5,3.8,0.4,5.1,0.5c0.6-0.2,3.6,0,5.5-0.1c-0.8,0.5,1.5,0.3,2.7,0.6 c1.3,0.1,2.1-0.1,1.6-0.3c0.4-0.6-5.1-0.3-3.3-0.9c0.5,0.3,3,0.2,4.3,0.2c0-0.3-0.9-0.2,0-0.5c1.5,0.1,3.1-0.3,4,0 c-0.3,0.1-0.9,0-1.3,0c2,0-10.6,2-8.1,1.8c-0.7-0.3,11.2-1.8,9.9-1.8c-1.2-0.2,0.9-0.6-0.4-0.7l-1.4,0.4c-1.7-0.1-2.4-0.7-1.8-0.9 c2.8,0-8,2.1-5.6,1.8l-1-0.1c1-0.2,3.8-0.4,4.8-0.1c0-0.3,1.4-0.4,2.5-0.5l0.4,0.1c1.2-0.2,2.8-0.1,2.1-0.5c-7,0,4.6-3.1-2.2-3.3 c2.8,0.7-1,0.7-3.9,0.8c-0.3-0.2-1.6-0.6-3.7-0.7c-1.8,0.1-1.1,0.2-1.4,0.4c-1-0.2-3-0.3-2.7-0.6c-1.4,0.4-2.3-0.3-4-0.1 c-1.5,0.2,0.1,0.2-1,0.4c-2.3,0-5.5-0.1-7.3-0.2c-0.7-0.3-2.8-0.9-1.3-1.4c3.5,0.1-1.3,0.8,2.3,0.7c-1.6-0.8,3.2-0.2,3.8-0.8 c-1.1-0.3-3.5-0.3-5.4-0.3l0.4,0.1c-1.7,0.1-5.1,0.3-7-0.1c0.4-0.3-0.4-0.5,0.9-0.5l-2.4-0.1c-0.3,0.1-0.6,0.2,0.1,0.2 c-1.1,0.2-2.2,0.1-3.1-0.1c-0.3-0.3-12.6,1.2-12.2,1c-1.7,0-2.1-0.4-3.8-0.1c-0.2,0.2,16.2-1,14-0.9c-1.5-0.3-19.3,1.4-20.3,0.9 c-1.3,0-2.8,0.1-2.5,0.4c-2.1-0.1,0.6-0.5-0.9-0.8c0,0,0.1,0.1-0.4,0.1l-1.5-0.4c-3.3,0.4-8.2-0.1-11.6,0.5c1-0.3,2.1-0.9,4.4-1.1 l0.4,0.2c0.3-0.1,2.1-0.2,2.1-0.5c-2.1-0.2-3.9-0.1-6.2,0.1c-0.4-0.1-0.9-0.2-1.2-0.2c0,0,0,0.1,0,0.1c-0.7-0.2-0.7-0.2-0.4-0.3 c0,0,0.1,0,0.2-0.1c-1.3-0.8-8.3,0.5-12.2,0.1c-1.1,0.1-0.1,0.1-1.5,0.3c-3.9-0.3-6.7-0.6-10.8-0.8c-1.3,0.4-1.4,0.5,0.2,0.9 l-3.1-0.1c2.8-1-5.8-0.9-2.7-1.9c-0.9-0.2-2.8-0.3-4.5-0.1c-0.2,0.2-0.4,0.6-2.6,0.6c-3.1-0.3-2.3-0.2-4.9-0.5 c-0.6-0.3,0.3-0.4,0.2-0.7c-3.9,0.4-3.4-0.7-7.1-0.6c-2.3,0.1-6.9,0.1-7,0.7C150.3,62.5,150.3,62.1,150.6,61.7z"/>
			</svg>
			<span>Explore Right Brain</span>
		</a>
		
		<a class="paint-stroke-button" href="/contact">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 309.9 95" enable-background="new 0 0 309.9 95" xml:space="preserve">
				<path fill="#3b63cf" d="M150.6,61.7l-2.5-0.1c8.2,0,16.8,0.2,25.2,0.4c-18.4-1.9-40.2-3.5-54.4,0.5c-1.5-2.1-19.4-3.1-19.8-2.6 c-3.7,0.4-7.5,0.7-11.3,1c2.6-0.2,5.2-0.3,7.8-0.5c-2.6,0.2-5.2,0.4-7.8,0.5c-10.3,0.7-20.9,1-31.8,1c-5.5,0-11,0-16.6-0.1 c-2.8-0.1-5.6-0.1-8.4-0.2l-0.5,0c-0.2,0-0.1,0-0.2,0l-0.3,0l-0.6-0.1l-1-0.1c0.1-0.5,0.1-1,0.2-1.6l0-0.4l0-0.1c0,0,0,0,0-0.2 l0-0.7l0.1-2.9c0.1-3,0.2-7.1,0.3-11.8c0-2.4,0.1-4.9,0.1-7.5c0-0.5,0-0.4,0-0.4l0-0.2l0-0.3c0-0.2,0-0.4,0.1-0.6 c0.3,0,0.6,0.1,0.9,0.1l0.2,0l1.3,0c1,0,2.1,0,3.1,0.1c4.1,0.1,8.2,0.2,12,0.2c7.7,0.2,14.5,0.3,19.1,0.5c2.2,0.1,4.4,0.1,6.7,0.2 c-3.7-0.2-3.7-0.2-7.5-0.4c9.4-0.6,17.9-1.1,26.1-1.5c-1.4-0.3-1.7-0.6-5.1-1l4.2,0.2c3.8-0.9,12.6-0.8,16.8-1.2 c-0.9,0.5,2.4,0.6,5.2,0.6l-1.1-0.3c10.9,0.2,23.6-0.2,33.4-0.1c1.4,0,2.4,0.2,3,0.3l9.4-0.4c-0.7,0.6,7.8,0.5,3.3,0.9 c7-0.7,14.1-0.3,20.8-1c23.9-0.1,49.3-0.6,73.9-1.6l-0.6-0.2c4.3-0.2,8.4-0.6,12.7-0.9c2.1-0.2,4.4-0.3,6.7-0.3c1.2,0,2.4,0,3.6,0 c1.2,0,2.6,0,3.6,0.1c1.8-0.2,3.9-0.4,6.2-0.6c0.3,2.6,0.5,5.7,0.8,8.4c0.3,2.6,0.7,4.8,1.1,5.9c0.2,8.7,0.8,12.1,1.2,20.6 c0.6-2.2,0.8,8.2,1.3,4.1c0.9-5.6,0.1-5.9,0.9-10.7l-0.2,0.1c0.2-4.8,0.4-9.6,0.6-14.4l0.1-3.6l0.1-1.8l0.1-2.3 c0.1-4.1,0.1-8.2,0.2-12.3c-5.1-0.1-10.1-0.2-15.2-0.3c-3.2-0.1-6.4-0.1-9.6-0.2c-6.4-0.1-12.8-0.2-19.3-0.3 c-15.1,0.5-31.4,0.1-47.1,0.3c-16.9,0.2-35.1,0.6-49.6,1.2c-3.5,0.2-5.9-0.4-8.9-0.6c-13.3,0.3-30.3,0.1-45.3,0.4 c0.3,0,0.6,0,0.7,0c-8,0.1-14-0.5-21.8-0.4c0,0.2-1.2,0.2-1.8,0.3c-0.7-0.4-12.1,0-23.8,0.5c-5.8,0.2-11.7,0.5-16.3,0.7 c-1.1,0-2.2,0.1-3.2,0.1c-1.1,0-2.1,0-3,0.1c-2.2,0-3.7,0-4.3-0.1c-1.2,0-2.4,0.1-3.7,0.1c-0.9,0-1.8,0-2.7,0 c-0.1,2.5-0.1,5-0.2,7.5l-0.1,3.9l-0.1,2.7c-0.2,3.4-0.4,6.7-0.5,10.1c-0.2,3.3-0.3,6.6-0.5,9.8L17,59c0,0.6,0,1.2-0.1,1.8 c0,1.4-0.1,2.7-0.1,4.1c0,2.7-0.1,5.4-0.1,8.1c3.8,0,7.5,0.1,11.2,0c0.7,0,1.3-0.1,2-0.1l0.5,0l0.3,0l0.6-0.1 c0.8-0.1,1.6-0.2,2.4-0.3c1.6-0.2,3.1-0.4,4.4-0.6c2.5,0.4,3-0.3,6-0.2c7.6,1.7,12.1,1,8.2,0.4c6.3-0.2,12.6-0.1,18.2-0.1 c2.6-0.1,5.2-0.3,7.8-0.4c2.2-0.1,3.5,0.1,4.6,0.5c5.7-0.2,4,0.2,10,0.4c1.4,0.6,14.9-0.9,16.6-0.8l-1,0.1 c6.9,0.1,11.5,1.3,18.2,1.3c18.7,0.4,39.1,0,56.4,0.2c0.2-0.6-3.8,0.1-4-0.7c10.2,0.1,20.5,0.9,30.8,1c1.9,0.2,4.1,0.5,5,0.7 c3.3,0.2,1.9-0.3,4.4-0.2l0.3,0.6c3.5-0.5,5.2,0.6,8.5,0.4c0.2-0.2,1.4-0.3,2.6-0.2c0.1,0.6,3.6,0,3.5,0.5l0,0 c0.7,0,1.2,0,2.1,0.1c1.3-0.2,14-1.8,15.4-2.1l0.6,0.1c1.9,0,2.7-0.5,1.6-0.6l2.3,0l-0.3,0l2.3,0c0.4,0.1,0.9,0.3,0.3,0.6 c1.3-0.2,2.8-0.3,4.1-0.2c-3.7-0.4-8.2-0.9-12-1.5c1.6-0.2,4.4,0.1,6.1,0c2,0.4,6.2,0.7,9.5,1c0.7,0,1.2-0.7,2.8-0.4 c0.8,0.5,1.8,0,3.2,0.3c-1.6,0.2-3.1,0.1-4.6,0.1c0.3,0.5,3.8,0.4,5.1,0.5c0.6-0.2,3.6,0,5.5-0.1c-0.8,0.5,1.5,0.3,2.7,0.6 c1.3,0.1,2.1-0.1,1.6-0.3c0.4-0.6-5.1-0.3-3.3-0.9c0.5,0.3,3,0.2,4.3,0.2c0-0.3-0.9-0.2,0-0.5c1.5,0.1,3.1-0.3,4,0 c-0.3,0.1-0.9,0-1.3,0c2,0-10.6,2-8.1,1.8c-0.7-0.3,11.2-1.8,9.9-1.8c-1.2-0.2,0.9-0.6-0.4-0.7l-1.4,0.4c-1.7-0.1-2.4-0.7-1.8-0.9 c2.8,0-8,2.1-5.6,1.8l-1-0.1c1-0.2,3.8-0.4,4.8-0.1c0-0.3,1.4-0.4,2.5-0.5l0.4,0.1c1.2-0.2,2.8-0.1,2.1-0.5c-7,0,4.6-3.1-2.2-3.3 c2.8,0.7-1,0.7-3.9,0.8c-0.3-0.2-1.6-0.6-3.7-0.7c-1.8,0.1-1.1,0.2-1.4,0.4c-1-0.2-3-0.3-2.7-0.6c-1.4,0.4-2.3-0.3-4-0.1 c-1.5,0.2,0.1,0.2-1,0.4c-2.3,0-5.5-0.1-7.3-0.2c-0.7-0.3-2.8-0.9-1.3-1.4c3.5,0.1-1.3,0.8,2.3,0.7c-1.6-0.8,3.2-0.2,3.8-0.8 c-1.1-0.3-3.5-0.3-5.4-0.3l0.4,0.1c-1.7,0.1-5.1,0.3-7-0.1c0.4-0.3-0.4-0.5,0.9-0.5l-2.4-0.1c-0.3,0.1-0.6,0.2,0.1,0.2 c-1.1,0.2-2.2,0.1-3.1-0.1c-0.3-0.3-12.6,1.2-12.2,1c-1.7,0-2.1-0.4-3.8-0.1c-0.2,0.2,16.2-1,14-0.9c-1.5-0.3-19.3,1.4-20.3,0.9 c-1.3,0-2.8,0.1-2.5,0.4c-2.1-0.1,0.6-0.5-0.9-0.8c0,0,0.1,0.1-0.4,0.1l-1.5-0.4c-3.3,0.4-8.2-0.1-11.6,0.5c1-0.3,2.1-0.9,4.4-1.1 l0.4,0.2c0.3-0.1,2.1-0.2,2.1-0.5c-2.1-0.2-3.9-0.1-6.2,0.1c-0.4-0.1-0.9-0.2-1.2-0.2c0,0,0,0.1,0,0.1c-0.7-0.2-0.7-0.2-0.4-0.3 c0,0,0.1,0,0.2-0.1c-1.3-0.8-8.3,0.5-12.2,0.1c-1.1,0.1-0.1,0.1-1.5,0.3c-3.9-0.3-6.7-0.6-10.8-0.8c-1.3,0.4-1.4,0.5,0.2,0.9 l-3.1-0.1c2.8-1-5.8-0.9-2.7-1.9c-0.9-0.2-2.8-0.3-4.5-0.1c-0.2,0.2-0.4,0.6-2.6,0.6c-3.1-0.3-2.3-0.2-4.9-0.5 c-0.6-0.3,0.3-0.4,0.2-0.7c-3.9,0.4-3.4-0.7-7.1-0.6c-2.3,0.1-6.9,0.1-7,0.7C150.3,62.5,150.3,62.1,150.6,61.7z"/>
			</svg>
			<span>Connect</span>
		</a>
	</section>
</div><!--end skrolrbody-->

<article<?php print $attributes; ?>>
	<?php if (!empty($title_prefix) || !empty($title_suffix) || !$page): ?>
	<header>
		<?php print render($title_prefix); ?>
		
		<?php if (!$page): ?>
		<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a></h2>
		<?php endif; ?>
		
		<?php print render($title_suffix); ?>
	</header>
	<?php endif; ?>

	<?php if ($display_submitted): ?>
	<footer class="node__submitted">
		<?php print $user_picture; ?>
		<p class="submitted"><?php print $submitted; ?></p>
	</footer>
	<?php endif; ?>

	<div id="article-<?php print $node->nid; ?>"<?php print $content_attributes; ?>>
	<?php
	// We hide the comments and links now so that we can render them later.
	hide($content['comments']);
	hide($content['links']);

	print render($content);
	?>
	</div>
	
	<div id="somediv" class="info-popup" title="">
		<div class="info-popup-content">
			<i class="info-popup-close fa fa-close"></i>
			<iframe id="thedialog" width="700" height="425"></iframe>
		</div>
	</div>
	
	<?php print render($content['links']); ?>
	<?php print render($content['comments']); ?>
</article>