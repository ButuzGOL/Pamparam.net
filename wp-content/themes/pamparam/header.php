<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		wp_title( '-', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
		?></title>
		
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- mobile optimized -->
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<!-- IE6 toolbar removal -->
		<meta http-equiv="imagetoolbar" content="false" />
		<!-- allow pinned sites -->
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />
		
		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

		<!-- default stylesheet -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/normalize.css">		
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.6.2.min.js"%3E%3C/script%3E'))</script>
		
		<!-- modernizr -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/modernizr.full.min.js"></script>
        
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
        <link rel="alternate" type="application/rss+xml" title="Pamparam &raquo; Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <?php wp_head(); ?>
		
        <!-- Bangers[Tags, Title Widget], Chewy [Title Widget], Comming soon [Tags], Federo, Gloria Hallelujah, Hammersmith One [Copyright],
        Istok Web [Contnet text], Josefin Sans, Jura, Love Ya Like A Sister [Title post], Luckiest Guy [Tags!], Maven Pro [Meta], Open Sans [Meta, Widget text], Oswald, Passero One,
        Patrick Hand, Rationale, Short Stack, Varela, Voltaire -->
        <link href='http://fonts.googleapis.com/css?family=Aclonica|Hammersmith+One|Istok+Web|Love+Ya+Like+A+Sister|Open+Sans|Terminal+Dosis' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		
	</head>
	
	<body <?php body_class(); ?>>
		<div id="container">
			
			<header role="banner">
                <div id="top-line"></div>
                <div id="left-bolls"></div>
				
				<div id="inner-header" class="wrap clearfix">
                
                    <div id="bolls"></div>
                    <div id="logo-image"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></div>
                    <p id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
					
                    <section id="social">
                        <a id="github" href="https://github.com/ButuzGOL"></a>
                        <a id="instagram" href="http://www.pinstagram.co/butuzgol"></a>
                        <a id="linkedin" href="http://www.linkedin.com/in/ButuzGOL"></a>
                        <a id="facebook" href="http://www.facebook.com/profile.php?id=1451332451"></a>
                        <a id="twitter" href="https://twitter.com/ButuzGOL"></a>
                        <a id="rss" href="<?php bloginfo('rss2_url'); ?>"></a>
                    </section>
                    
					<nav role="navigation">
						<?php wp_nav_menu(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
                    
                    <div id="header-line" class="menu_line">
                        <div id="menu-line" class="menu_cline"></div>
                    </div>
				
				</div> <!-- end #inner-header -->
			
			</header> <!-- end header -->
