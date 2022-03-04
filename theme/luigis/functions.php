<?php
    /**
     * functions and definitions of the theme
     *
     */

     function Aj_theme_support() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
    
        // Custom background color.
        add_theme_support(
            'custom-background',
            array(
                'default-color' => 'f5efe0',
            )
        );


        // Set content-width.
        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 580;
        }

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        */
        add_theme_support( 'post-thumbnails' );

        // Set post thumbnail size.
        set_post_thumbnail_size( 1200, 9999 );

        // Add custom image size used in Cover Template.
        add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );

        // Custom logo.
        $logo_width  = 120;
        $logo_height = 90;


        // If the retina setting is active, double the recommended width and height.
        if ( get_theme_mod( 'retina_logo', false ) ) {
            $logo_width  = floor( $logo_width * 2 );
            $logo_height = floor( $logo_height * 2 );
        }

        add_theme_support(
            'custom-logo',
            array(
                'height'      => $logo_height,
                'width'       => $logo_width,
                'flex-height' => true,
                'flex-width'  => true,
            )
        );


        // Theme Tile
        add_theme_support( 'title-tag' );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
                'navigation-widgets',
            )
        );



        // Make Theme available for Translation
        load_theme_textdomain('Aj');

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for responsive embeds.
        add_theme_support( 'responsive-embeds' );

     }

     add_action( 'after_setup_theme', 'Aj_theme_support' );
    

     /**
     * Register and Enqueue Styles.
     *
     * @since Twenty Twenty 1.0
     */
    function Aj_register_styles() {

        $theme_version = wp_get_theme()->get( 'Version' );

        wp_enqueue_style( 'Aj-style', get_stylesheet_uri(), array(), $theme_version );
        wp_style_add_data( 'Aj-style', 'rtl', 'replace' );

        wp_enqueue_style( 'Aj-css?family=Open+Sans:400,600', get_template_directory_uri() . '/https://fonts.googleapis.com/css?family=Open+Sans:400,600', null, $theme_version, 'all' );
wp_enqueue_style( 'Aj-beyond_the_mountains-webfont.css', get_template_directory_uri() . '/fonts/beyond_the_mountains-webfont.css', null, $theme_version, 'all' );
wp_enqueue_style( 'Aj-bootstrap.min.css', get_template_directory_uri() . '/plugin-frameworks/bootstrap.min.css', null, $theme_version, 'all' );
wp_enqueue_style( 'Aj-swiper.css', get_template_directory_uri() . '/plugin-frameworks/swiper.css', null, $theme_version, 'all' );
wp_enqueue_style( 'Aj-ionicons.css', get_template_directory_uri() . '/fonts/ionicons.css', null, $theme_version, 'all' );
wp_enqueue_style( 'Aj-styles.css', get_template_directory_uri() . '/common/styles.css', null, $theme_version, 'all' );

    }

    add_action( 'wp_enqueue_scripts', 'Aj_register_styles' );


    /**
     * Register and Enqueue Scripts.
     *
     */
    function Aj_register_scripts() {

        $theme_version = wp_get_theme()->get( 'Version' );

        if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script( 'Aj-jquery-3.2.1.min.js-js', get_template_directory_uri() . '/plugin-frameworks/jquery-3.2.1.min.js', array(), $theme_version, true );
wp_enqueue_script( 'Aj-bootstrap.min.js-js', get_template_directory_uri() . '/plugin-frameworks/bootstrap.min.js', array(), $theme_version, true );
wp_enqueue_script( 'Aj-swiper.js-js', get_template_directory_uri() . '/plugin-frameworks/swiper.js', array(), $theme_version, true );
wp_enqueue_script( 'Aj-scripts.js-js', get_template_directory_uri() . '/common/scripts.js', array(), $theme_version, true );

    }

    add_action( 'wp_enqueue_scripts', 'Aj_register_scripts' );



    /**
     * Register navigation menus uses wp_nav_menu in five places.
     *
     */
    function Aj_menus() {

        $locations = array(
            'primary'  => __( 'Desktop Horizontal Menu (Primary)', 'Aj' ),
            'mobile'   => __( 'Mobile Menu', 'Aj' ),
            'footer'   => __( 'Footer Menu', 'Aj' ),
            'social'   => __( 'Social Menu', 'Aj' ),
        );

        register_nav_menus( $locations );
    }

    add_action( 'init', 'Aj_menus' );

    
    /**
     * Register Sidebars
     */

    add_action( 'widgets_init', 'my_register_sidebars' );
    function my_register_sidebars() {
        /* Register the 'primary' sidebar. */
        register_sidebar(
            array(
                'id'            => 'blog',
                'name'          => __( 'Blog Sidebar' ),
                'description'   => __( 'This is for blog page' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }

    
    /**
     * Run code only once
     */

    function theme_activate_setup() {

        // Create Static Pages

        // Home Page
        wp_insert_post(array(
            'post_title' => 'Home',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'post_name' => 'home'
        ));

        // Blog Page
        wp_insert_post(array(
            'post_title' => 'Blog',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'post_name' => 'blog'
        ));

        // All Static Pages
        
        wp_insert_post(array(
            'post_content' => file_get_contents(get_template_directory_uri() . "/static-pages/02_about_us.php"),
            'post_title' => '02 ABOUT_US',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'post_name' => '02_about_us'
        ));
        
        wp_insert_post(array(
            'post_content' => file_get_contents(get_template_directory_uri() . "/static-pages/03_menu.php"),
            'post_title' => '03 MENU',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'post_name' => '03_menu'
        ));
        
        wp_insert_post(array(
            'post_content' => file_get_contents(get_template_directory_uri() . "/static-pages/05_contact.php"),
            'post_title' => '05 CONTACT',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'post_name' => '05_contact'
        ));
        
        wp_insert_post(array(
            'post_content' => file_get_contents(get_template_directory_uri() . "/static-pages/06_elements.php"),
            'post_title' => '06 ELEMENTS',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'post_name' => '06_elements'
        ));
        


                
        /**
         * Create Primary Menu and add some pages Automatic
         */
        
        $menuname = 'Primary Menu';
        $menulocation = 'primary';
        
        // Does the menu exist already?
        $menu_exists = wp_get_nav_menu_object( $menuname );

        // If it doesn't exist, let's create it.
        if( !$menu_exists){
            $menu_id = wp_create_nav_menu($menuname);

            // Add some default pages to the menu.
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('HOME'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url( '/' ), 
                'menu-item-status' => 'publish'));

            
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('02 ABOUT_US'),
                'menu-item-classes' => '02_about_us',
                'menu-item-url' => home_url( '/02_about_us' ), 
                'menu-item-status' => 'publish'));
            
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('03 MENU'),
                'menu-item-classes' => '03_menu',
                'menu-item-url' => home_url( '/03_menu' ), 
                'menu-item-status' => 'publish'));
            
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('05 CONTACT'),
                'menu-item-classes' => '05_contact',
                'menu-item-url' => home_url( '/05_contact' ), 
                'menu-item-status' => 'publish'));
            

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('BLOG'),
                'menu-item-classes' => 'blog',
                'menu-item-url' => home_url( '/blog' ), 
                'menu-item-status' => 'publish'));

            // Grab the theme locations and assign the menu to primay location
            //if( !has_nav_menu( $menulocation ) ){
                $locations = get_theme_mod('nav_menu_locations');
                $locations[$menulocation] = $menu_id;
                set_theme_mod( 'nav_menu_locations', $locations );
            //}
        }


        /**
         * Set Front Page and Blog Page
         */

        // Use a static front page
        $homePage = get_page_by_title( 'Home' );
        update_option( 'page_on_front', $homePage->ID );
        update_option( 'show_on_front', 'page' );
        
        // Set the blog page
        $blogPage = get_page_by_title( 'Blog' );
        update_option( 'page_for_posts', $blogPage->ID );

    }

    add_action('after_switch_theme', 'theme_activate_setup');


    /**
     * Delete some theme options when uninstalling
     *
     */

     add_action('switch_theme', 'theme_deactivate_setup');
 
     function theme_deactivate_setup() {
        wp_delete_nav_menu('Primary Menu');
     }

    