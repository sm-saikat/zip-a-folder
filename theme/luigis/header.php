
    <?php
    /**
     * Header file for the zippedTheme-1646243305971 WordPress default theme.
     *
     * @link #
     *
     * @package zippedTheme-1646243305971
     * @subpackage null
     * @since zippedTheme-1646243305971 1.0
     */
     ?>
     
     <!DOCTYPE html>
     <html class="no-js" <?php language_attributes(); ?>>

     <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<?php wp_head(); ?>
	</head>

    <body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

        

        <header>
        <div class="container">
                <a class="logo" href="#"><img src="<?php echo(get_template_directory_uri()); ?>/images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="#">ORDER: +34 685 778 8892</a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="02_about_us.html">ABOUT US</a></li>
                        <li><a href="03_menu.html">SERVICES</a></li>
                        <li><a href="04_blog.html">NEWS</a></li>
                        <li><a href="05_contact.html">CONTACT</a></li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>
    