<?php
  global
    $preload,
    $email,
    $tel,
    $tel_clean,
    $site_url,
    $logo_url,
    $template_directory_uri,
    $images_url,
    $webp_support,
    $current_template;

  if ( !$preload ) {
    $preload = get_field( 'preload' );
  }

  if ( is_front_page() ) {
    $script_name = 'script-index';
    $style_name = 'style-index';

    $first_screen_image_ending = $webp_support ? 'webp' : 'jpg';
    $first_screen_image_type = $webp_support ? 'image/webp' : 'image/jpeg';
    $first_screen_images = [
      [
        'url' => 'index-hero.1280',
        'imagesrcset' => 'index-hero.1280@2x',
        'media' => '(min-width:1279.98px)'
      ],
      [
        'url' => 'index-hero.1024',
        'imagesrcset' => 'index-hero.1024@2x',
        'media' => '(min-width:1023.98px) and (max-width:1279.98px)'
      ],
      [
        'url' => 'index-hero.768',
        'imagesrcset' => 'index-hero.768@2x',
        'media' => '(min-width:767.98px) and (max-width:1023.98px)'
      ],
      [
        'url' => 'index-hero.576',
        'imagesrcset' => 'index-hero.576@2x',
        'media' => '(min-width:375.98px) and (max-width:767.98px)'
      ],
      [
        'url' => 'index-hero.375',
        'imagesrcset' => 'index-hero.375@2x',
        'media' => '(max-width:375.98px)'
      ]
    ];

    foreach ( $first_screen_images as $first_screen_image ) {
      $preload[] = [
        'url' => "{$images_url}{$first_screen_image['url']}.{$first_screen_image_ending}",
        'imagesrcset' => "{$images_url}{$first_screen_image['imagesrcset']}.{$first_screen_image_ending} 2x",
        'type' => $first_screen_image_type,
        'media' => $first_screen_image['media']
      ];
    }

  } else {
    if ( $current_template ) {
      $script_name = 'script-' . $GLOBALS['current_template'];
      $style_name = 'style-' . $GLOBALS['current_template'];
    } else {
      $script_name = '';
      $style_name = '';
    }
  }

  $GLOBALS['page_script_name'] = $script_name;
  $GLOBALS['page_style_name'] = $style_name ?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=CustomEvent%2CIntersectionObserver%2CIntersectionObserverEntry%2CElement.prototype.closest%2CElement.prototype.dataset%2CHTMLPictureElement"></script>
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- styles preload -->
  <link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/style.css">
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.css" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.576.css" media="(min-width:575.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.768.css" media="(min-width:767.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.1024.css" media="(min-width:1023.98px)" />
	<link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/<?php echo $style_name ?>.1280.css" media="(min-width:1279.98px)" />
  <link rel="preload" as="style" href="<?php echo $template_directory_uri ?>/css/hover.css" media="(hover) and (min-width:1024px)">
  <!-- fonts preload -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $site_url ?>/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $site_url ?>/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site_url ?>/favicon-16x16.png" />
  <link rel="manifest" href="<?php echo $site_url ?>/site.webmanifest" />
  <link rel="mask-icon" href="<?php echo $site_url ?>/safari-pinned-tab.svg" color="#5bbad5" />
  <meta name="msapplication-TileColor" content="#ffffff" />
  <meta name="theme-color" content="#ffffff" /> <?php
	$fonts = [
		'Rubik-Regular.woff',
		// 'Rubik-Light.woff',
    'Rubik-Medium.woff',
    'OpenSans-Regular.woff'
		// 'OpenSans-Light.woff'
	];
	foreach ( $fonts as $font ) : ?>

	<link rel="preload" href="<?php echo $template_directory_uri . '/fonts/' . $font ?>" as="font" type="font/woff" crossorigin="anonymous" /> <?php
	endforeach;
  echo PHP_EOL ?>
  <!-- other preload --> <?php
  echo PHP_EOL;

  $preload[] = [
    'url' => $logo_url,
    'type' => 'image/svg+xml'
  ];

  $preload[] = [
    'url' => $images_url . 'icon-burger.svg',
    'type' => 'image/svg+xml',
    'media' => '(max-width:1023.98px)'
  ];

  if ( $preload ) {
    foreach ( $preload as $item ) {
      create_link_preload( $item );
    }
    unset( $item );
    echo PHP_EOL;
  } ?>
  <!-- favicons --> <?php
  echo PHP_EOL;
  wp_head() ?>
</head>

<body <?php body_class() ?>> <?php
  wp_body_open() ?>
  <noscript>
    <!-- <noindex> -->Для полноценного использования сайта включите JavaScript в настройках вашего браузера.<!-- </noindex> -->
  </noscript>
  <div id="page-wrapper">
  <header class="hdr container">
    <a href="<?php echo $site_url ?>" class="hdr__logo">
      <img src="<?php echo $logo_url ?>" alt="Логотип Infraport" class="hdr__logo-img">
    </a>
    <button type="button" class="hdr__burger"></button> <?php 
    wp_nav_menu( [
      'theme_location'  => 'header_menu',
      'container'       => 'nav',
      'container_class' => 'hdr__nav',
      'menu_class'      => 'hdr__nav-list',
      'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
    ] );
    require 'template-parts/mobile-menu.php' ?>
  </header>