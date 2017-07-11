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

function br_tag($n) {
	$x = 0; $br_tags = '';
	while ($x < $n) { $br_tags .= '<br />'; $x++; }
	return $br_tags;
}
?>

<div id="skrollr-body">
	<svg version="1.1" id="rightcluster1" style="stroke:rgb(0,0,255)" data-top="stroke:rgb(205,219,209)" data-1000="stroke:rgb(159,175,163)" width="960px" height="1500px" viewBox="0 0 960 1500 " >
		<!-- Main Path -->
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data--5-top="stroke-dashoffset:10000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 483 0 L 483 221 L 466.5 230 L 466.5 249 L 483 258 L 483 277 L 500 286 " />  
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-200-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 483 221 L 500 230 L 517 221 L 533.5 230 L 533.5 249 L 517 258 L 516.5 277 L 500 286 M 500 230 L 500 249 L 517 258 M 483.5 258 L 500 249 M 500 286 L 500 306 L 516.5 315 L 516.5 334 L 533 343 L 550 334 L 566.5 343 L 582.5 334 L 582.5 315.28 L 566 306 L 550 315 L 533 306 L 516 315 M 550 315 L 550 334" /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-200-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 469.5 232.28 L 469.5 247.28 M 483 224.73 L 496 232 M 517 224.73 L 530 232 M 530 247 L 517 254 M 513 275 L 500 282 M 486.5 275.28 L 486.5 260.28 M 519.5 317.28 L 519.5 332.28 M 533 309.73 L 546 317 M 546 332 L 533 339 M 566 309.73 L 579 317 M 579 332 L 566 339" />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-250-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 533 343 L 533 362 L 516.5 371 L 516.5 390 L 533 399 L 549.5 390 L 549.5 371 L 533 362 M 582.5 334 L 598.5 343 L 598.5 362 L 615.5 371 L 632 362 L 631.5 343 L 648.5 334 L 648.5 315 L 632 306 L 615.5 315 L 615 334 L 631.5 343 L 632 362 L 649 371 L 649 390 L 632.5 399 L 632.5 418 L 649 427 L  " /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-260-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 615 334 L 598.5 343 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-260-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 632 309.73 L 645 317 M 628 360 L 615 367 M 601.5 360.28 L 601.5 345.28 M 546 388 L 533 395 M 519.5 388.28 L 519.5 373.28" /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-280-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top"stroke-dashoffset:0;" d = "M 632 309.73 L 645 317 M 628 360 L 615 367 M 601.5 360.28 L 601.5 345.28 M 546 388 L 533 395 M 519.5 388.28 L 519.5 373.28" /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-290-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 649 390 L 665.5 399 L 665.5 418 L 649 427 L 649 522 L 665.5 531 L 665.5 550 L 649 559 632.5 550  M 649 522 L 632.5 531 L 632.5 550 L 615.5 559 L 599 550 L 582.5 559 L 565.5 550 L 565.5 531 L 549 522 L 532.5 531 L 532.5 550 L 549 559 L 565.5 550 M 615.5 559 L 615.5 578 L 632.5 587 L 649 578 L 665.5 587 L 665.5 606 L 649 615 L 632.5 606 L 632.5 587" /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-280-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 649 393.73 L 662 401 M 662 416  L 649 423 M 635.5 416.28 L 635.5 401.28 " /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 615.5 578 L 599 587 L 582.5 578 M 582.5 559 L 582.5 578 L 565.5 587.28 L 565.5 606 L 548.5 615 L 532.5 606.14 L 515.5 615 L 515 634 L 498.5 643 L 498.5 662 L 515 671 L 531.5 662 L 531.5 643 L 548.5 634 L 548.5 615 " /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 649 525 L 662 533 M 662 548 L 649 555 M 612 561 L 599 553 M 585.5 561.28 L 585.5 576.28 M 635.5 589.28 L 635.5 604.28 M 649 611 L 662 604 M 562 533 L 549 525.73 M 535.5 533.28 L 535.5 548.28 " /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-310-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 531.5 643 L 515.5 634 L 498.5 643 L M 515.5 615 L 515.5 634" /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-310-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = " M 485.5 632.28 L 485.5 617.28 M 499 609.73 L 512 617 M 532 609.73 L 545 617 M 545 632 L 532 639 M 528 660 L 515 667 M 501.5 660.28 L 501.5 645.28" />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-320-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 515.5 615 L 499 606 L 482.5 615 L 482.5 634 L 498.5 643 L 498.5 662 L 482.5 672.78 L 482.5 746.28 L 506.5 760 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 506.5 760 L 523 751 L 539.5 760 L 539.5 779 L 523.5 788 L 506 779 L 506.5 760 M 506.5 779 L 489.8 788 L 489.5 807 L 506 816 L 522.5 807 M 540 779 L 556.5 788 L 556.5 807 L 540 816 L 523.5 807 L 523.5 788 " /><path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 509.5 777.28 L 509.5 762.28 M 523 754.73 L 536 762 M 540 782.73 L 553 790 M 553 805 L 540 812 M 519 805 L 506 812 M 492.5 805.28 L 492.5 790.28" />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 506 816 L 505.5 835 L 450.5 835 L 450.5 854.14 L 434 863.07 L 417.5 854 L 417.5 835 M 450.5 835 L 434 826 L 417.5 835 L 401 826.07 L 384.5 835.14 L 368.5 826 L 368.5 807 L 352 798 L335.5 807 L 335.5 826 L 318.5 835.28 L 318.5 M 368.5 826 L 352 835 M 335.5 826 L 352 835 L 352 854 L 335 863 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-330-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 447 852 L 434 859 M 420.5 852.28 L 420.5 837.28 M 434 829.73 L 447 837  M 365 809 L 352 801.73 M 338.5 809.28 L 338.5 824.28 M 321.5 837.28 L 321.5 852.28 M 335 859 L 348 852 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-350-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 368.5 826 L 352 835 L 335.5 826 M 368.5 826 L 352 835 L 335.5 826 L 318.5 835.28 L 318.5 854 L 335 863 L 351.5 854 L 351.5 835" />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 318.5 854 L 302 863 L 285.5 854 L 285.5 835 L 269 826 L 252.5 835 L 236 826 L 219.5 835 L 219.5 854 L 236.5 863 L 236.5 882 L 219.5 891 L 219 910 L 202.5 919 L 202.5 938 L 219 947 L 235.5 938 L 235.5 919 L 219 910" />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 235.5 919 L 252.5 910 L 252.5 891 L 236 882 M 252.5 891 L 269.5 882 L 269.5 863 M 285.5 854 L 269.5 863 L 252.5 854 L 252.5 835 M 236.5 863 L 253 854 M 269 829.73 L 282 837 M 282 852 L 269 859 M 266 880 L 253 887 M 249 908 L 236 915 M 232 936 L 219 943 M 205.5 936.28 L 205.5 921.28 M 222.5 908.28 L 222.5 893.28 M 239.5 880.28 L 239.5 865.28 M 222.5 852.28 L 222.5 837.28 M 236 829.73 L 249 837 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 335 863 L 335 960 L 318.5 969 318.5 988 L 335 997 L 351.5 988 L 351.5 969 L 335 960 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-320-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 348 986 L 335 993 M 321.5 986.28 L 321.5 971.28 M 335 963.73 L 348 971 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 540 816 L 540 835 L 557 844 L 574 835 L 590.5 844 L 607 835 L 623.5 844 L 640 835 L 656.5 844 L 657 863 L 673.5 872 L 673.5 891 L 657 900 L 640.5 891 L 640.5 872 L 657 863 M 557.5 844 L 557.5 863 L 574 872 L 590.5 863 L 590.5 844 M 590.5 863 L 607 872 L 623.5 863 L 623.5 844 M 623.5 863 L 640.5 872 M 657 863 L 640.5 872 L 640.5 891 L 657 900"/>
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-280-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 560.5 861.28 L 560.5 846.28 M 574 838.73 L 587 846 M 607 838.73 L 620 846 M 640 838.73 L 653 846 M 657 866.73 L 670 874 M 670 889 L 657 896 M 643.5 889.28 L 643.5 874.28 M 620 861 L 607 868 M 587 861 L 574 868 M 653 861 L 640 868   " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 657 900 L 657 983.28 L 673.5 992 L 673.5 1011 L 657 1020 L 640.5 1011 L 640.5 992 L 657 983 M 657 1020 L 657 1039 L 639.5 1048 L 623 1039 606.5 1048 L606.5 1067 L 623 1076 622.5 1095 L 639 1104 L 655.5 1095 L 655.5 1076 L 639.5 1067 L 639.5 1048 M 639.5 1067 L 623 1076 L 567 1106 L 550.5 1097 L 533.5 1106 L 517 1097 L 500.5 1106 L 500.5 1125 L 517 1134 L 533 1125 L 533.5 1106 L 550 1097 L 549.5 1061 L 549.5 1042 L 533 1033 L 516.5 1042 L 516.5 1061 L 533 1070 L 549.5 1061 M 567 1106 L 567 1125 L 550 1134 L 533 1125 M 550 1134 L 549 1153 L 533 1162 L 516.5 1153 L 516.5 1134 "/>
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-300-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 657 986.73 L 670 994 M 670 1009 L 657 1016 M 643.5 1009.28 L 643.5 994.28 M636 1050 L 623 1042.73 M 609.5 1050.28 L 609.5 1065.28 M 639 1070.73 L 652 1078 M 652 1093 L 639 1100 M 625.5 1093.28 L 625.5 1078.28 M 550 1100.73 L 563 1108 M 563 1123 L 550 1130 M 546 1151 L 533 1158 M 519.5 1151.28 L 519.5 1136.28 M 503.5 1123.28 L 503.5 1108.28 M 517 1100.73 L 530 1108 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-340-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 546 1059 L 533 1066 M 519.5 1059.28 L 519.5 1044.28 M 533 1036.73 L 546 1044 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-500-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 533 1162 L 482.5 1190 L 482.5 1270 L 447.5 1290 L 447.5 1309 L 431 1318 L 414.5 1309 L 414.5 1290 M 447.5 1290 L 431 1281 L 414.5 1290 L 414.5 1271 L 365 1243 L 348.5 1252 L 348.5 1233 L 332 1224 L 315.5 1233 L 315.5 1252 L 332 1261 L 348.5 1252 M 332 1224 L 332.5 1205 L 316 1196 L 300 1205 L 300 1224 L 316 1233 M 315.5 1252 L 299 1261 L 282.5 1252 L 283 1233 L 300 1224 M 282.5 1233 L 266.5 1224 L 266.5 1205 L 283 1196 L 283.5 1177 L 300 1168 L 316.5 1177 L 333 1168 L 349.5 1177 L 349.5 1196 L "/>
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 444 1292 L 431 1284.73 M 417.5 1292.28 L 417.5 1307.28 M 431 1314 L 444 1307 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-450-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 399.5 1149 L 416.5 1140 L 416.5 1121 L 400 1112 L 383.5 1121 L 383 1140 L 399.5 1149 L 399.5 1168 L 383 1177 L 366.5 1168 L 366.5 1149 L 383 1140 M 383 1177 L 383 1196 L 366 1205 L 350 1196 L 332.5 1205 L 316 1196 L 300 1205 L 283.5 1196 L 84 1298 L 67.5 1307 L67.5 1326 L 84 1335 L 100.5 1326 L 100.5 1307 L 84 1298 "/>
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-430top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 332 1227.73 L 345 1235 M 345 1250 L 332 1257 M 312 1250 L 299 1257 M 285.5 1250.28 L 285.5 1235.28 M 296 1222 L 283 1229 M 269.5 1222.28 L 269.5 1207.28 M 286.5 1194.28 L 286.5 1179.28 M 300 1171.73 L 313 1179 M 333 1171.73 L 346 1179 M 369.5 1166.28 L 369.5 1151.28 M 386.5 1138.28 L 386.5 1123.28 M 400 1115.73 L 413 1123 M 413 1138 L 400 1145 M 396 1166 L 383 1173 M 329 1222 L 316 1229 M 302.5 1222.28 L 302.5 1207.28 M 316 1199.73 L 329 1207 " />
		<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 84 1301.73 L 97 1309 M 97 1324 L 84 1331 M 70.5 1324.28 L 70.5 1309.28  " />
<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550-top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 84 1335 L 100.5 1344 L 100.5 1398 L 55.5 1423 L 55.5 1442 L 39 1451 L 22.5 1442 L 22.5 1423 L 39 1414 L 55.5 1423 M 22.5 1423 L 6 1414 L -10.5 1423 L -10.5 1442 L 6 1451 L 22.5 1442 M 6 1451 L 6 1470 L -10 1479 L -26.5 1470 L -26.5 1451 L -10.5 1442"/>
<path style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0" data-550top="stroke-dashoffset:6000;" stroke-miterlimit="10" data--1000-top="stroke-dashoffset:0;" d = "M 39 1417.73 L 52 1425 M 52 1440 L 39 1447 M 19 1440 L 6 1447 M 19 1425 L 6 1417.73 M 3 1468 L -10 1475" />
	</svg>

	<section id="paint" class="cf">
		<img src="/sites/all/themes/icm/images/fullpaint.png" width="100%" style="top:0;left:0;" id="fullpaint" data-100-top="top:-1%;" data-550="top:0%;" />
		<img src="/sites/all/themes/icm/images/halfpaint.png" style="width:57%;right:0;	top:4.8%;" data-400-top="width:53%; right:-1.5%;	top:3.8%;" data-950="width:57%;right:0%; top:4.8%;" id="halfpaint"  />
	
		<div class="sectionlimit">
			<div id="firstblock" class="text-left cf">
				<hr />
			
				<?php print br_tag(3); ?>

				<p><span>Ernest Hemingway</span> once said that, <span>"Any person's life told truly is a novel."</span></p>
				<p>To us, each of these novels is, in and of itself, a unique <span>work of art</span> that documents our own journey on this adventure called <span>life.</span> We won't lose sight of that and don't want you to either, because the journey is as important as the destination.</p>
				<p>With <span>big dreams, journeys and aspirations</span> come real emotional attachment. It is also this emotional connection that keeps us going, that allows us to commit <span>real blood, sweat, and tears</span> to accomplishing goals and seeing our dreams become reality.</p>
				<?php print br_tag(3); ?>
				<hr />
			</div>
		
			<div class="text-right blank"></div>
		
			<hr />
		
			<?php print br_tag(4); ?>
		
			<div class="text-left">
				<p>It is important to know <span>who we are</span> and <span>why we do this</span></p>
				<img id="openhistory" class="right-hexlink" src="/sites/all/themes/icm/images/history.png" title="History" alt="History" width="100" />
			</div>
		
			<div class="text-left cf">
				<p>... so that you understand <span>how</span> we bring <span>peace of mind.</span></p>
				<img id="opensleep" class="right-hexlink" title="Peace of Mind" alt="Peace of Mind" src="/sites/all/themes/icm/images/sleep.png" width="100" />
			</div>
		
			<hr />
			<hr />
	
			<?php print br_tag(14); ?>
	
			<img src="/sites/all/themes/icm/images/seagull1.png" style="width:12%; left:0px; top:200px;" data--150-top="width:11%; left:60px; top:150px;" data-200-bottom="width:12%; left:-100px; top:250px;" id="seagull1" />
			<img src="/sites/all/themes/icm/images/seagull2.png" style="width:8%; left:10%; top:170px;" data-200-bottom="width:10%; left:10%; top:250px"data--150-top="width:7.5%; left:25%; top:170px;" id="seagull2" />
		</div>

		<img src="/sites/all/themes/icm/images/clouds.png" style="width:100%; top:0px;" data--150-top="width:100%; top:-190px;" data-200-bottom="width:120%;top:-150px;" id="clouds" />

		<div id="ernestquote">
			"<em>Any person's life told truly is a novel.</em>"
			<br />
			<span>-ERNEST HEMINGWAY</span>
		</div>
	</section>

	<section id="data">
		<object id="object2">
			<svg version="1.1" id="rightcluster2" style="stroke:rgb(190,189,159); opacity:1;" 
			data-160-center="stroke:rgb(164,177,175); opacity;0" 
			data-500-center="stroke:rgb(190,189,159); opacity:1;" 
			data-400-center="stroke:rgb(212,203,164); opacity:1;" 
			width="960px" height="2000px" viewBox="0 0 960 2000 " >

			<!-- Main Path -->
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 386 0 L 402.5 9 L 419 0 L 435.5 9 L 435.5 28 L 418.5 37 L 418.5 56 L 401.5 65 L 385.25 56 L 385.5 37 369.5 28 L 369.5 9 L 386 0  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 402.5 9 L 402.5 28 L 418.5 37 M 385.5 37 L 402.5 28 M 415.5 54 L 402.5 61 M 388.5 54.28 L 388.5 39.28 M 372.5 26.28 L 372.5 11.28 M 386.5 3.73 L 399.5 11 M 419.5 3.73 L 432.5 11 M 432.5 26 L 419.5 33" />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 401.5 65 L 401.5 84 L 384.5 93 L 368 84 L 351.5 93 L 335 84 L 318.5 93 L 318 112 L 301.5 121 L 301.5 140 L 318 149 L 334.5 140 L 335 121 L 351.5 112 L 368 121 L 384.5 112 L 385.25 93 L 368 84 L 351.5 93 L 351.5 112 L 335 121 L 318 112  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 368.5 87.73 L 381.5 95 M 381.5 110 L 368.5 117 M 348.5 110 L 335.5 117 M 348.5 95 L 335.5 87.73 M 321.5 95.28 L 321.5 110.28 M 304.5 123.28 L 304.5 138.28 M 318.5 145 L 331.5 138   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 318 149 L 318 220 L 333.5 229 L 333.5 248 L 317 257 L 300.5 248 L 300.5 229 L 284 220L 267.5 229 L 267.5 248 L 284 257 L 300.5 248 L 300.5 229 L 317 220 " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 317.5 223.73 L 330.5 231 M 330.5 246 L 317.5 253 M 297.5 246 L 284.5 253 M 297.5 231 L 284.5 223.73 M 270.5 231.28 L 270.5 246.28  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 284 257 L 284 328 L 267 337 L 250.5 328 L 250.5 309 L 267 300 L 284 309 M 267.5 303.73 L 280.5 311 M 280.5 326 L 267.5 333 M 253.5 326.28 L 253.5 311.28  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 250.5 328 L 233.5 337 L 217 328 L 216.5 309 L 200 300 L 183.5 309 L 183.5 328 L 200 337 L 200 356 L 217 365 L 233.5 356.28 L 233.5 337 L 216.5 328 L 200 337   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 200.5 303.73 L 213.5 311 M 186.5 311.28 L 186.5 326.28 M 203.5 339.28 L 203.5 354.28 M 217.5 361 L 230.5 354 M 230.5 339 L 217.5 331.73  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 217 365 L 217 436 L 233.5 445 L 233.5 464 L 249.5 473 L 249.5 492 L 233 501 L 216.5 492 L 200 501 L 183.5 492 L 183.5 473 L 200 464 L 200 445 L 217 436 L 233.5 445 L 233.5 464 L 216.5 473 L 216.5 492 M 200 464 L 216.5 473 " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 217.5 439.73 L 230.5 447 M 233.5 467.73 L 246.5 475 M 246.5 490 L 233.5 497 M 213.5 490 L 200.5 497 M 186.5 490.28 L 186.5 475.28 M 203.5 462.28 L 203.5 447.28   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 183.5 492 L 166.5 501 L 166.5 520.28 L 150 529 L 133.5 520 L 133.5 501 L 150 492 L 166.5 501   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 150.5 495.73 L 163.5 503 M 163.5 518 L 150.5 525 M 136.5 518.28 L 136.5 503.28  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 150 529 L 150 566 L 166.5 575 L 166.5 594 L 183.5 603 L 200 594 L 216.5 603 L 216.5 622 L 200 631 L 183.5 622 L 183.5 603 L 166.5 594 L 150 603 L 133.25 594 L 133.5 575 L 150 566  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 150.5 569.73 L 163.5 577 M 200.5 597.73 L 213.5 605 M 213.5 620 L 200.5 627 M 186.5 620.28 L 186.5 605.28 M 163.5 592 L 150.5 599 M 136.5 592.28 L 136.5 577.28  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 133.5 594 L 116.5 603 L 100 594 L 100 575 L 83 566 L 66.5 575 L 66.5 594 L 83 603 L 83 622 L 66.5 631 L 66.5 650 L 83 659 L 100 650 L 100 631 L 116.5 622 L 116.5 603 L 100 594 L 83 603 L 83 622 L 100 631   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 83.5 569.73 L 96.5 577 M 69.5 577.28 L 69.5 592.28 M 100.5 597.73 L 113.5 605 M 113.5 620 L 100.5 627 M 69.5 633.28 L 69.5 648.28 M 83.5 655 L 96.5 648  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 83 659 L 82 696 L 98.5 705 L 98.5 724 L 82 733 L 65.5 724 L 65.5 705 L 49 696 L 32.5 705 L 33 724 L 16.5 733 L 0 724 L 0 705 L 16 696 L 32.5 705 L 33 724 L 16.5 733 L 16.5 752 L 33 761 L 49.5 752 L 49.5 733 L 65.5 724 65.5 705 L 82 696   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 49.5 733 L 33 724 M 82.5 699.73 L 95.5 707 M 95.5 722 L 82.5 729 M 62.5 722 L 49.5 729 M 46.5 750 L 33.5 757 M 19.5 750.28 L 19.5 735.28 M 2.5 722.28 L 2.5 707.28 M 16.5 699.73 L 29.5 707 M 49.5 699.73 L 62.5 707 M 82.5 699.73 L 95.5 707  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 33 761 L 33 810 L 16.5 819 L 16.5 838 L 33 847 L 50 838 L49.5 819 L 33 810   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 33.5 813.73 L 46.5 821 M 46.5 836 33.5 843 M 19.5 836.28 L 19.5 821.28  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 50 838 L 65.5 847 L 82 838 L 98.5 847 L 98.5 866 L 82.63 875.14 L 65.5 866 L 65.5 847 L 65.5 866 L 49.5 875 L 33 866 L 16.5 875 L 16.5 894 L 33 903 L 50.25 894 L 49.5 875 L 50.25 894 L 66.5 903 L 67 922 L 83.5 931 L 83.5 950 L 67 959 L 50.5 950 L 50.5 931 L 67 922   " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 82.5 841.73 L 95.5 849 M 95.5 864 L 82.5 871 M 19.5 877.28 L 19.5 892.28 M 80.5 948 L 67.5 955 M 53.5 948.28 L 53.5 933.28 M 46.5 892 L 33.5 899  " />
			<path  style="stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:10000;stroke-dashoffset:0" data-300-center="stroke-dashoffset:10000;" stroke-miterlimit="10" data--200-center="stroke-dashoffset:0;" d = "M 67 959  L 67 1120  " />
		</svg>
	</object>

	<div class="sectionlimit">
		<h1>One life told</h1>
		<iframe src="//fast.wistia.net/embed/iframe/qwsulho80x?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="500" height="281"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
	
		<div id="daicons">
			<img id="openphilosophy" class="right-hexlink" src="/sites/all/themes/icm/images/philosophy.png" title="Philosophy" alt="Behavior" width="130" />
			<img id="openprocess" class="right-hexlink" src="/sites/all/themes/icm/images/process.png" title="Process" alt="Behavior" width="130" />
			<img id="openbehavior" class="right-hexlink" src="/sites/all/themes/icm/images/behavior.png" title="Behavior" alt="Behavior" width="130" />
		</div>
	
		<div class="text-center">
			<p>While there are many nuances to each aspect of our story, one of the <span>most important points</span> that we can <span>impart</span> on you is that ours is not just another sales <span>story</span>. We invest based on <span>tried and true</span> investment principles and the <span>belief</span> that owning <span>expensive</span> and overvalued assets can be <span>devastating</span>. We attempt to <span>avoid</span> this behavior at all costs <span>seeking</span> to find true investment bargains. These <span>principles</span> are implemented through a documented, repeatable <span>investment process...</span> not just the hunches, <span>gut instincts</span>, "experience" or “<span>trust me</span>, I know what I'm doing” thoughts of some Wall Street talking heads.</p>
			<p>&nbsp;</p>
			<p>At iCM we bring a <span>unique</span> and <span>principled approach</span> that offers investors an <span>uncommon</span> experience, a clear one.</p>
			<p>&nbsp;</p>
		
			<div id="pwidth">
				<div id="what">
					<p><span>So what does this mean to you?</span></p>
				</div>

				<div id="this">
					<p><span>Imagine</span>, for a second, when you have <span>experienced</span> rough times with your investment portfolio. Maybe it was 2008 or 2000, maybe it was far more recent where you could point to your holdings and say, "Something is just not right", but you did not know what it was.</p>
					<p>The <span>anxiety</span> many investors feel, from <span>time to time,</span> is not always <span>driven</span> just by the result, but the path that is being taken. Investors intuitively <span>understand</span> that <span>markets</span> do not always just go up, and the road to their <span>goals</span> will have some bumps along the way. The Anxiety felt by investors is the "I don't know" component of that <span>investment strategy</span> that leads to real issues along the way to the <span>end destination.</span></p>
					<p>It is the elimination of the "I don't know” anxieties that iCM strives for by delivering a <span>CLARITY of PURPOSE</span>.  By working with iCM, investors will know exactly how decisions are made, as well as, how we will behave in both good markets and bad.</p>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p><span>It is this uncommon clarity that is our commitment to every investor, and by virtue of this clarity, every investor can sleep more peacefully at night knowing that we are on your side.</span></p>
			</div>
		</div>
	</section>

	<section id="getstarted">
		<a class="site-logo" href="/"><img src="/sites/all/themes/icm/images/icmlogo.png" /></a>

		<a class="paint-stroke-button" href="/left-brain">
			<svg version="1.1" id="Text_Layout" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
		 	y="0px" viewBox="0 0 309.9 95" enable-background="new 0 0 309.9 95" xml:space="preserve">
				<path fill="#FFFFFF" d="M150.6,61.7l-2.5-0.1c8.2,0,16.8,0.2,25.2,0.4c-18.4-1.9-40.2-3.5-54.4,0.5c-1.5-2.1-19.4-3.1-19.8-2.6
					c-3.7,0.4-7.5,0.7-11.3,1c2.6-0.2,5.2-0.3,7.8-0.5c-2.6,0.2-5.2,0.4-7.8,0.5c-10.3,0.7-20.9,1-31.8,1c-5.5,0-11,0-16.6-0.1
					c-2.8-0.1-5.6-0.1-8.4-0.2l-0.5,0c-0.2,0-0.1,0-0.2,0l-0.3,0l-0.6-0.1l-1-0.1c0.1-0.5,0.1-1,0.2-1.6l0-0.4l0-0.1c0,0,0,0,0-0.2
					l0-0.7l0.1-2.9c0.1-3,0.2-7.1,0.3-11.8c0-2.4,0.1-4.9,0.1-7.5c0-0.5,0-0.4,0-0.4l0-0.2l0-0.3c0-0.2,0-0.4,0.1-0.6
					c0.3,0,0.6,0.1,0.9,0.1l0.2,0l1.3,0c1,0,2.1,0,3.1,0.1c4.1,0.1,8.2,0.2,12,0.2c7.7,0.2,14.5,0.3,19.1,0.5c2.2,0.1,4.4,0.1,6.7,0.2
					c-3.7-0.2-3.7-0.2-7.5-0.4c9.4-0.6,17.9-1.1,26.1-1.5c-1.4-0.3-1.7-0.6-5.1-1l4.2,0.2c3.8-0.9,12.6-0.8,16.8-1.2
					c-0.9,0.5,2.4,0.6,5.2,0.6l-1.1-0.3c10.9,0.2,23.6-0.2,33.4-0.1c1.4,0,2.4,0.2,3,0.3l9.4-0.4c-0.7,0.6,7.8,0.5,3.3,0.9
					c7-0.7,14.1-0.3,20.8-1c23.9-0.1,49.3-0.6,73.9-1.6l-0.6-0.2c4.3-0.2,8.4-0.6,12.7-0.9c2.1-0.2,4.4-0.3,6.7-0.3c1.2,0,2.4,0,3.6,0
					c1.2,0,2.6,0,3.6,0.1c1.8-0.2,3.9-0.4,6.2-0.6c0.3,2.6,0.5,5.7,0.8,8.4c0.3,2.6,0.7,4.8,1.1,5.9c0.2,8.7,0.8,12.1,1.2,20.6
					c0.6-2.2,0.8,8.2,1.3,4.1c0.9-5.6,0.1-5.9,0.9-10.7l-0.2,0.1c0.2-4.8,0.4-9.6,0.6-14.4l0.1-3.6l0.1-1.8l0.1-2.3
					c0.1-4.1,0.1-8.2,0.2-12.3c-5.1-0.1-10.1-0.2-15.2-0.3c-3.2-0.1-6.4-0.1-9.6-0.2c-6.4-0.1-12.8-0.2-19.3-0.3
					c-15.1,0.5-31.4,0.1-47.1,0.3c-16.9,0.2-35.1,0.6-49.6,1.2c-3.5,0.2-5.9-0.4-8.9-0.6c-13.3,0.3-30.3,0.1-45.3,0.4
					c0.3,0,0.6,0,0.7,0c-8,0.1-14-0.5-21.8-0.4c0,0.2-1.2,0.2-1.8,0.3c-0.7-0.4-12.1,0-23.8,0.5c-5.8,0.2-11.7,0.5-16.3,0.7
					c-1.1,0-2.2,0.1-3.2,0.1c-1.1,0-2.1,0-3,0.1c-2.2,0-3.7,0-4.3-0.1c-1.2,0-2.4,0.1-3.7,0.1c-0.9,0-1.8,0-2.7,0
					c-0.1,2.5-0.1,5-0.2,7.5l-0.1,3.9l-0.1,2.7c-0.2,3.4-0.4,6.7-0.5,10.1c-0.2,3.3-0.3,6.6-0.5,9.8L17,59c0,0.6,0,1.2-0.1,1.8
					c0,1.4-0.1,2.7-0.1,4.1c0,2.7-0.1,5.4-0.1,8.1c3.8,0,7.5,0.1,11.2,0c0.7,0,1.3-0.1,2-0.1l0.5,0l0.3,0l0.6-0.1
					c0.8-0.1,1.6-0.2,2.4-0.3c1.6-0.2,3.1-0.4,4.4-0.6c2.5,0.4,3-0.3,6-0.2c7.6,1.7,12.1,1,8.2,0.4c6.3-0.2,12.6-0.1,18.2-0.1
					c2.6-0.1,5.2-0.3,7.8-0.4c2.2-0.1,3.5,0.1,4.6,0.5c5.7-0.2,4,0.2,10,0.4c1.4,0.6,14.9-0.9,16.6-0.8l-1,0.1
					c6.9,0.1,11.5,1.3,18.2,1.3c18.7,0.4,39.1,0,56.4,0.2c0.2-0.6-3.8,0.1-4-0.7c10.2,0.1,20.5,0.9,30.8,1c1.9,0.2,4.1,0.5,5,0.7
					c3.3,0.2,1.9-0.3,4.4-0.2l0.3,0.6c3.5-0.5,5.2,0.6,8.5,0.4c0.2-0.2,1.4-0.3,2.6-0.2c0.1,0.6,3.6,0,3.5,0.5l0,0
					c0.7,0,1.2,0,2.1,0.1c1.3-0.2,14-1.8,15.4-2.1l0.6,0.1c1.9,0,2.7-0.5,1.6-0.6l2.3,0l-0.3,0l2.3,0c0.4,0.1,0.9,0.3,0.3,0.6
					c1.3-0.2,2.8-0.3,4.1-0.2c-3.7-0.4-8.2-0.9-12-1.5c1.6-0.2,4.4,0.1,6.1,0c2,0.4,6.2,0.7,9.5,1c0.7,0,1.2-0.7,2.8-0.4
					c0.8,0.5,1.8,0,3.2,0.3c-1.6,0.2-3.1,0.1-4.6,0.1c0.3,0.5,3.8,0.4,5.1,0.5c0.6-0.2,3.6,0,5.5-0.1c-0.8,0.5,1.5,0.3,2.7,0.6
					c1.3,0.1,2.1-0.1,1.6-0.3c0.4-0.6-5.1-0.3-3.3-0.9c0.5,0.3,3,0.2,4.3,0.2c0-0.3-0.9-0.2,0-0.5c1.5,0.1,3.1-0.3,4,0
					c-0.3,0.1-0.9,0-1.3,0c2,0-10.6,2-8.1,1.8c-0.7-0.3,11.2-1.8,9.9-1.8c-1.2-0.2,0.9-0.6-0.4-0.7l-1.4,0.4c-1.7-0.1-2.4-0.7-1.8-0.9
					c2.8,0-8,2.1-5.6,1.8l-1-0.1c1-0.2,3.8-0.4,4.8-0.1c0-0.3,1.4-0.4,2.5-0.5l0.4,0.1c1.2-0.2,2.8-0.1,2.1-0.5c-7,0,4.6-3.1-2.2-3.3
					c2.8,0.7-1,0.7-3.9,0.8c-0.3-0.2-1.6-0.6-3.7-0.7c-1.8,0.1-1.1,0.2-1.4,0.4c-1-0.2-3-0.3-2.7-0.6c-1.4,0.4-2.3-0.3-4-0.1
					c-1.5,0.2,0.1,0.2-1,0.4c-2.3,0-5.5-0.1-7.3-0.2c-0.7-0.3-2.8-0.9-1.3-1.4c3.5,0.1-1.3,0.8,2.3,0.7c-1.6-0.8,3.2-0.2,3.8-0.8
					c-1.1-0.3-3.5-0.3-5.4-0.3l0.4,0.1c-1.7,0.1-5.1,0.3-7-0.1c0.4-0.3-0.4-0.5,0.9-0.5l-2.4-0.1c-0.3,0.1-0.6,0.2,0.1,0.2
					c-1.1,0.2-2.2,0.1-3.1-0.1c-0.3-0.3-12.6,1.2-12.2,1c-1.7,0-2.1-0.4-3.8-0.1c-0.2,0.2,16.2-1,14-0.9c-1.5-0.3-19.3,1.4-20.3,0.9
					c-1.3,0-2.8,0.1-2.5,0.4c-2.1-0.1,0.6-0.5-0.9-0.8c0,0,0.1,0.1-0.4,0.1l-1.5-0.4c-3.3,0.4-8.2-0.1-11.6,0.5c1-0.3,2.1-0.9,4.4-1.1
					l0.4,0.2c0.3-0.1,2.1-0.2,2.1-0.5c-2.1-0.2-3.9-0.1-6.2,0.1c-0.4-0.1-0.9-0.2-1.2-0.2c0,0,0,0.1,0,0.1c-0.7-0.2-0.7-0.2-0.4-0.3
					c0,0,0.1,0,0.2-0.1c-1.3-0.8-8.3,0.5-12.2,0.1c-1.1,0.1-0.1,0.1-1.5,0.3c-3.9-0.3-6.7-0.6-10.8-0.8c-1.3,0.4-1.4,0.5,0.2,0.9
					l-3.1-0.1c2.8-1-5.8-0.9-2.7-1.9c-0.9-0.2-2.8-0.3-4.5-0.1c-0.2,0.2-0.4,0.6-2.6,0.6c-3.1-0.3-2.3-0.2-4.9-0.5
					c-0.6-0.3,0.3-0.4,0.2-0.7c-3.9,0.4-3.4-0.7-7.1-0.6c-2.3,0.1-6.9,0.1-7,0.7C150.3,62.5,150.3,62.1,150.6,61.7z"/>
			</svg>
			<span>Explore Left Brain</span>
		</a>
		
		<a class="paint-stroke-button" href="/contact">
			<svg version="1.1" id="Text_Layout" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
			y="0px" viewBox="0 0 309.9 95" enable-background="new 0 0 309.9 95" xml:space="preserve">
				<path fill="#FFFFFF" d="M150.6,61.7l-2.5-0.1c8.2,0,16.8,0.2,25.2,0.4c-18.4-1.9-40.2-3.5-54.4,0.5c-1.5-2.1-19.4-3.1-19.8-2.6
					c-3.7,0.4-7.5,0.7-11.3,1c2.6-0.2,5.2-0.3,7.8-0.5c-2.6,0.2-5.2,0.4-7.8,0.5c-10.3,0.7-20.9,1-31.8,1c-5.5,0-11,0-16.6-0.1
					c-2.8-0.1-5.6-0.1-8.4-0.2l-0.5,0c-0.2,0-0.1,0-0.2,0l-0.3,0l-0.6-0.1l-1-0.1c0.1-0.5,0.1-1,0.2-1.6l0-0.4l0-0.1c0,0,0,0,0-0.2
					l0-0.7l0.1-2.9c0.1-3,0.2-7.1,0.3-11.8c0-2.4,0.1-4.9,0.1-7.5c0-0.5,0-0.4,0-0.4l0-0.2l0-0.3c0-0.2,0-0.4,0.1-0.6
					c0.3,0,0.6,0.1,0.9,0.1l0.2,0l1.3,0c1,0,2.1,0,3.1,0.1c4.1,0.1,8.2,0.2,12,0.2c7.7,0.2,14.5,0.3,19.1,0.5c2.2,0.1,4.4,0.1,6.7,0.2
					c-3.7-0.2-3.7-0.2-7.5-0.4c9.4-0.6,17.9-1.1,26.1-1.5c-1.4-0.3-1.7-0.6-5.1-1l4.2,0.2c3.8-0.9,12.6-0.8,16.8-1.2
					c-0.9,0.5,2.4,0.6,5.2,0.6l-1.1-0.3c10.9,0.2,23.6-0.2,33.4-0.1c1.4,0,2.4,0.2,3,0.3l9.4-0.4c-0.7,0.6,7.8,0.5,3.3,0.9
					c7-0.7,14.1-0.3,20.8-1c23.9-0.1,49.3-0.6,73.9-1.6l-0.6-0.2c4.3-0.2,8.4-0.6,12.7-0.9c2.1-0.2,4.4-0.3,6.7-0.3c1.2,0,2.4,0,3.6,0
					c1.2,0,2.6,0,3.6,0.1c1.8-0.2,3.9-0.4,6.2-0.6c0.3,2.6,0.5,5.7,0.8,8.4c0.3,2.6,0.7,4.8,1.1,5.9c0.2,8.7,0.8,12.1,1.2,20.6
					c0.6-2.2,0.8,8.2,1.3,4.1c0.9-5.6,0.1-5.9,0.9-10.7l-0.2,0.1c0.2-4.8,0.4-9.6,0.6-14.4l0.1-3.6l0.1-1.8l0.1-2.3
					c0.1-4.1,0.1-8.2,0.2-12.3c-5.1-0.1-10.1-0.2-15.2-0.3c-3.2-0.1-6.4-0.1-9.6-0.2c-6.4-0.1-12.8-0.2-19.3-0.3
					c-15.1,0.5-31.4,0.1-47.1,0.3c-16.9,0.2-35.1,0.6-49.6,1.2c-3.5,0.2-5.9-0.4-8.9-0.6c-13.3,0.3-30.3,0.1-45.3,0.4
					c0.3,0,0.6,0,0.7,0c-8,0.1-14-0.5-21.8-0.4c0,0.2-1.2,0.2-1.8,0.3c-0.7-0.4-12.1,0-23.8,0.5c-5.8,0.2-11.7,0.5-16.3,0.7
					c-1.1,0-2.2,0.1-3.2,0.1c-1.1,0-2.1,0-3,0.1c-2.2,0-3.7,0-4.3-0.1c-1.2,0-2.4,0.1-3.7,0.1c-0.9,0-1.8,0-2.7,0
					c-0.1,2.5-0.1,5-0.2,7.5l-0.1,3.9l-0.1,2.7c-0.2,3.4-0.4,6.7-0.5,10.1c-0.2,3.3-0.3,6.6-0.5,9.8L17,59c0,0.6,0,1.2-0.1,1.8
					c0,1.4-0.1,2.7-0.1,4.1c0,2.7-0.1,5.4-0.1,8.1c3.8,0,7.5,0.1,11.2,0c0.7,0,1.3-0.1,2-0.1l0.5,0l0.3,0l0.6-0.1
					c0.8-0.1,1.6-0.2,2.4-0.3c1.6-0.2,3.1-0.4,4.4-0.6c2.5,0.4,3-0.3,6-0.2c7.6,1.7,12.1,1,8.2,0.4c6.3-0.2,12.6-0.1,18.2-0.1
					c2.6-0.1,5.2-0.3,7.8-0.4c2.2-0.1,3.5,0.1,4.6,0.5c5.7-0.2,4,0.2,10,0.4c1.4,0.6,14.9-0.9,16.6-0.8l-1,0.1
					c6.9,0.1,11.5,1.3,18.2,1.3c18.7,0.4,39.1,0,56.4,0.2c0.2-0.6-3.8,0.1-4-0.7c10.2,0.1,20.5,0.9,30.8,1c1.9,0.2,4.1,0.5,5,0.7
					c3.3,0.2,1.9-0.3,4.4-0.2l0.3,0.6c3.5-0.5,5.2,0.6,8.5,0.4c0.2-0.2,1.4-0.3,2.6-0.2c0.1,0.6,3.6,0,3.5,0.5l0,0
					c0.7,0,1.2,0,2.1,0.1c1.3-0.2,14-1.8,15.4-2.1l0.6,0.1c1.9,0,2.7-0.5,1.6-0.6l2.3,0l-0.3,0l2.3,0c0.4,0.1,0.9,0.3,0.3,0.6
					c1.3-0.2,2.8-0.3,4.1-0.2c-3.7-0.4-8.2-0.9-12-1.5c1.6-0.2,4.4,0.1,6.1,0c2,0.4,6.2,0.7,9.5,1c0.7,0,1.2-0.7,2.8-0.4
					c0.8,0.5,1.8,0,3.2,0.3c-1.6,0.2-3.1,0.1-4.6,0.1c0.3,0.5,3.8,0.4,5.1,0.5c0.6-0.2,3.6,0,5.5-0.1c-0.8,0.5,1.5,0.3,2.7,0.6
					c1.3,0.1,2.1-0.1,1.6-0.3c0.4-0.6-5.1-0.3-3.3-0.9c0.5,0.3,3,0.2,4.3,0.2c0-0.3-0.9-0.2,0-0.5c1.5,0.1,3.1-0.3,4,0
					c-0.3,0.1-0.9,0-1.3,0c2,0-10.6,2-8.1,1.8c-0.7-0.3,11.2-1.8,9.9-1.8c-1.2-0.2,0.9-0.6-0.4-0.7l-1.4,0.4c-1.7-0.1-2.4-0.7-1.8-0.9
					c2.8,0-8,2.1-5.6,1.8l-1-0.1c1-0.2,3.8-0.4,4.8-0.1c0-0.3,1.4-0.4,2.5-0.5l0.4,0.1c1.2-0.2,2.8-0.1,2.1-0.5c-7,0,4.6-3.1-2.2-3.3
					c2.8,0.7-1,0.7-3.9,0.8c-0.3-0.2-1.6-0.6-3.7-0.7c-1.8,0.1-1.1,0.2-1.4,0.4c-1-0.2-3-0.3-2.7-0.6c-1.4,0.4-2.3-0.3-4-0.1
					c-1.5,0.2,0.1,0.2-1,0.4c-2.3,0-5.5-0.1-7.3-0.2c-0.7-0.3-2.8-0.9-1.3-1.4c3.5,0.1-1.3,0.8,2.3,0.7c-1.6-0.8,3.2-0.2,3.8-0.8
					c-1.1-0.3-3.5-0.3-5.4-0.3l0.4,0.1c-1.7,0.1-5.1,0.3-7-0.1c0.4-0.3-0.4-0.5,0.9-0.5l-2.4-0.1c-0.3,0.1-0.6,0.2,0.1,0.2
					c-1.1,0.2-2.2,0.1-3.1-0.1c-0.3-0.3-12.6,1.2-12.2,1c-1.7,0-2.1-0.4-3.8-0.1c-0.2,0.2,16.2-1,14-0.9c-1.5-0.3-19.3,1.4-20.3,0.9
					c-1.3,0-2.8,0.1-2.5,0.4c-2.1-0.1,0.6-0.5-0.9-0.8c0,0,0.1,0.1-0.4,0.1l-1.5-0.4c-3.3,0.4-8.2-0.1-11.6,0.5c1-0.3,2.1-0.9,4.4-1.1
					l0.4,0.2c0.3-0.1,2.1-0.2,2.1-0.5c-2.1-0.2-3.9-0.1-6.2,0.1c-0.4-0.1-0.9-0.2-1.2-0.2c0,0,0,0.1,0,0.1c-0.7-0.2-0.7-0.2-0.4-0.3
					c0,0,0.1,0,0.2-0.1c-1.3-0.8-8.3,0.5-12.2,0.1c-1.1,0.1-0.1,0.1-1.5,0.3c-3.9-0.3-6.7-0.6-10.8-0.8c-1.3,0.4-1.4,0.5,0.2,0.9
					l-3.1-0.1c2.8-1-5.8-0.9-2.7-1.9c-0.9-0.2-2.8-0.3-4.5-0.1c-0.2,0.2-0.4,0.6-2.6,0.6c-3.1-0.3-2.3-0.2-4.9-0.5
					c-0.6-0.3,0.3-0.4,0.2-0.7c-3.9,0.4-3.4-0.7-7.1-0.6c-2.3,0.1-6.9,0.1-7,0.7C150.3,62.5,150.3,62.1,150.6,61.7z"/>
			</svg>
			<span>Connect</span>
		</a>

		<svg id="theblur" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<filter id="blur"><feGaussianBlur stdDeviation="5" /></filter>
		</svg>
	</section>
</div>

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

	<?php print render($content['links']); ?>
	<?php print render($content['comments']); ?>
</article>

<filter id="filter4"><feGaussianBlur stdDeviation="17" /></filter>

<div id="historytext" class="info-popup">
	<div class="info-popup-content">
		<i class="info-popup-close fa fa-close"></i>
		<h2>History</h2>
		<p><iframe src="//fast.wistia.net/embed/iframe/dqsew9q99p?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="380" height="214"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script></p>
	</div>
</div>

<div id="sleep" class="info-popup">
	<div class="info-popup-content">
		<i class="info-popup-close fa fa-close"></i>
		<h2>Peace of Mind</h2>
		<p>This emotional connection we speak of, this attachment that drives our dreams and aspirations, it comes with a natural fear of the unknown and many thoughts that "keep us up at night." Neither we, nor anyone else, should tell you what you should dream, nor should we tell you how you should feel about the manifestation of those dreams as a future reality. So, we aren't even going to try. We don't have to. As professionals, it's often important to allow the student to become the teacher, to step away just far enough to appreciate the forest for the trees. While we appreciate that your goals and fears may be much different than the real emotions from non-investment professionals detailed below, just know that we understand and appreciate those as well.</p>
	</div>
</div>

<div id="philosophy" class="info-popup">
	<div class="info-popup-content">
		<i class="info-popup-close fa fa-close"></i>
		<h2>Philosophy</h2>
		<p>In order to be <span>successful</span> as an <span>investor</span>, it is <span>vital</span> to have a <span>well-articulated</span> investment <span>philosophy</span> that is based on <span>tried</span> and <span>true</span> investment <span>principals</span>.</p>
		<p>While a <span>focus</span> on investment <span>philosophy</span> permeates the large-dollar investor landscape, it is <span>surprising</span> how little focus is given to <span>investment philosophy</span> by smaller institutions, individual investors, and even some financial advisors. <span>Philosophy</span> is crucial to your <span>success</span> as an investor; it is essentially the <span>road map, blueprint</span> or even <span>genetic code</span> of an investment program. That is, investment philosophy <span>defines</span> our very <span>character</span> and <span>nature</span>.</p>
		<p>A <span>child</span> with both parents exceeding 6 feet in height is <span>less likely</span> to be <span>below average</span> in height than those that are <span>born</span> from two parents that are both 5 feet tall. Philosophy <span>epitomizes</span> a permanent <span>state of individuality.</span></p>
	</div>
</div>

<div id="process" class="info-popup">
	<div class="info-popup-content">
		<i class="info-popup-close fa fa-close"></i>
		<h2>Process</h2>
		<object class="twerlobject">
			<svg version="1.1" id="twerl" width="960px" height="900px" viewBox="0 0 367.5 312" >
				<path style="stroke:rgb(31,99,171); fill:none"  d = "M 169.1 43.47 L 169.1 102.86 L 184.87 102.86 L 192.75 116.51" />
				<path style="stroke:rgb(98,160,215); fill:none" d = "M 215.15 169.16 L 231.02 169.16 L 238.9 155.51 L 303.04 155.51" />
				<path style="stroke:rgb(249,167,27); fill:none" d = "M 161.22 196.81 L 169.1 210.46 L 184.87 210.46 L 184.87 269.85" />
				<path style="stroke:rgb(236,192,86); fill:none" d = "M 137.89 141.86 L 122.13 141.86 L 114.25 155.51 L 48.01 155.51" />

				<circle style="stroke:none; opacity:1;"  fill="#1F63AB" cx="169.1" cy="43.5" class="blue" r="2.7"/>
				<circle style="stroke:none; opacity:1;"  fill="#62A0D7" cx="303" cy="155.5" r="2.7" class="lblue" />
				<circle style="stroke:none; opacity:1;"  fill="#F9A71B" cx="184.9" cy="269.9" r="2.7" class="orange"/>
				<circle style="stroke:none; opacity:1;"   fill="#ECC056" cx="48" cy="155.5" r="2.7" class="yellow" />
			</svg>

			<div class="spinner" id="spin1" style="opacity:1;">
				<img src="/sites/all/themes/icm/images/2.png" class="slideicon" />
				<h3>Long Term Capital Markets Expectation</h3>
				<p>Historical estimates of risk and return.</p>
				<img src="/sites/all/themes/icm/images/5.png" class="slidenumber" />
			</div>

			<div class="spinner"  id="spin2" style="opacity:1;">
				<img src="/sites/all/themes/icm/images/1.png" class="slideicon" />
				<h3>Long Term Valuation Analysis</h3>
				<p>Quantify the return opportunity from various valuation levels.</p>
				<img src="/sites/all/themes/icm/images/6.png" class="slidenumber" />
			</div>
		
			<div class="spinner bottomspinner" id="spin3" style="opacity:1;">
				<img src="/sites/all/themes/icm/images/4.png" class="slideicon" />
				<h3>Tactical Decision</h3>
				<p>The over or underweight decision and as well as product selection, implemented in a series of meaningful steps, building into a position as valuations become more compelling.</p>
				<img src="/sites/all/themes/icm/images/7.png" class="slidenumber" />
			</div>
		
			<div class="spinner" id="spin4" style="opacity:1;">
				<img src="/sites/all/themes/icm/images/3.png" class="slideicon" />
				<h3>Current Valuation Analysis</h3>
				<p>Measure and Quantify fair value as well as dispersion from fair value while being mindful of paradigm shifts.</p>
				<img src="/sites/all/themes/icm/images/8.png" class="slidenumber" />
			</div>
		</object>
	</div>
</div>

<div id="behavior" class="info-popup">
	<div class="info-popup-content">
		<i class="info-popup-close fa fa-close"></i>
		<h2>Behavior</h2>
		<p>At iCM we take investment philosophy very seriously. While there are many intricacies to our own investment philosophy that we invite you to explore, central to our belief system is the concept that Valuations Matter. For investors with long term goals exceeding a market cycle, but shorter than the 100 years that most would consider to be an academic time horizon, few things matter more in driving risk and return in asset classes than valuations, in particular beginning period valuations.</p>
	</div>
</div>

<script type="text/javascript">
	jQuery(function($) {
		var openPopUp = function($popup) {
			$popup.css({
				'display': 'block'
			});
			setTimeout(function() {
				$popup.addClass('open');
			}, 10);
			$('#skrollr-body').addClass('blur');
		};
		
		$('#openhistory').click(function() {
			openPopUp($('#historytext'));
		});
		
		$('#opensleep').click(function() {
			openPopUp($('#sleep'));
		});
		
		$('#openphilosophy').click(function() {
			openPopUp($('#philosophy'));
		});
		
		$('#openprocess').click(function() {
			openPopUp($('#process'));
		});
		
		$('#openbehavior').click(function() {
			openPopUp($('#behavior'));
		});
		
		$('.info-popup-close').click(function() {
			var $popup = $(this).parents('.info-popup');
			$popup.removeClass('open');
			$('#skrollr-body').removeClass('blur');
			
			setTimeout(function() {
				$popup.css({
					'display': 'none'
				});
			}, 1000);
		});
	});
		
	setTimeout(function(){
		jQuery('#rightcluster1').show();
		skrollr.init({
			forceHeight: false,
			mobileCheck: function() { return false; }
		});
	}, 500 );
</script>