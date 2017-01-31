<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="gt-ie8 no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-61352141-2', 'auto');
          ga('send', 'pageview');

        </script>
		<?php // end analytics ?>
        <meta name="msvalidate.01" content="546BB48CEBAB6F6812A9F1D23EAEB6DB" />
        <meta name="google-site-verification" content="nzDNLKybCeteRCGh_Jv_Mx6qRA4C7Iz5z5aoJ8Atnm0" />

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
                <a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to page content', 'bonestheme' ); ?></a> <!--Accessibility feature-->
                <div class="project-links">
                    <div class="wrap cf">
                        <a href="https://livelearn.ca">livelearn.ca</a>
                        <a href="http://realizeforum.ca">realizeforum.ca</a>
                    </div>
                </div>
				<div id="inner-header" class="wrap cf">
                    
                    <div id="logo" class="site-identity">
                        <h1 class="h1" itemscope itemtype="http://schema.org/Organization">

                                <a href="<?php echo home_url(); ?>" rel="nofollow" title="Live &amp; Learn homepage">
                                    <img class="svgimg" src="<?php echo get_template_directory_uri(); ?>/library/images/eo-logo.svg" alt="English Online Inc.">
                                    <img style="display:none;" class="no-svgimg" src="<?php echo get_template_directory_uri(); ?>/library/images/eo-logo.png" alt="English Online Inc.">
                                </a>

                            </h1><!-- end .site-identity-->
                        <p><span class="tagline"><?php  bloginfo('description'); ?></span></p>
                    </div>
                    <!--accessible menu with aria from https://codeable.io/wordpress-accessibility-creating-accessible-dropdown-menus/-->
                    <nav class="collapse  navbar-collapse main-menu" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php _e( 'Main Menu', 'textdomain' ); ?>">
                      <?php
                        if ( has_nav_menu( 'main-nav' ) ) {
                          wp_nav_menu( array(
                            'theme_location' => 'main-nav',
                            'container'      => false,
                            'menu_class'     => 'nav-menu cf',
                            'walker'         => new Aria_Walker_Nav_Menu(),
                            'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                          ) );
                        }
                      ?>
                    </nav>
					
                </div><!-- end #inner-header .wrap -->

			</header>
