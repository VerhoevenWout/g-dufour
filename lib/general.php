<?php

// CREATE MENUS
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'main menu' ),
      'secondary-menu' => __( 'secondary menu' ),
    )
  );
}

add_action( 'init', 'register_my_menus' );


// CREATE SIDEBAR
function website_name_widgets_init() {
	register_sidebar( array(
		'name' => __( 'General Widget', 'website_name' ),
		'id' => 'general-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'init', 'website_name_widgets_init' );


// DELETE ADMIN BAR
function my_function_admin_bar(){
    return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');


// ALLOW POST THUMBNAILS
add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
  add_theme_support('post-thumbnails');
  add_image_size( 'team-photo', 450, false );

}

// TAG WHEN AVAILABLE WHEN EDITING A POST
function myformatTinyMCE($in) {
  $in['block_formats'] = "Paragraph=p;Header 2=h2;Header 3=h3";
  return $in;
}
add_filter('tiny_mce_before_init', 'myformatTinyMCE' );


// THEMES SUPPORT
add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.


if( function_exists('acf_add_options_page') ) {


	acf_add_options_page();
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Defaults',
		'menu_title'	=> 'Defaults',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact',
		'menu_title'	=> 'Contact',
	));

}

function create_posttype() {
	register_post_type( 'case-studies',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Progetti' ),
				'singular_name' => __( 'Progetti' )
			),
			'hierarchical' => true,
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'case-studies'),
			'menu_icon' => 'dashicons-post-status',
			'supports' => array( 'editor','title', 'thumbnail', 'author'),
      'taxonomies' => array('post_tag'),
      'orderby' => 'menu_order',
		)
	);

  register_post_type( 'categories',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Categorie' ),
        'singular_name' => __( 'Categorie' )
      ),
      'hierarchical' => true,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'categories'),
      'menu_icon' => 'dashicons-screenoptions',
      'supports' => array( 'editor','title', 'thumbnail', 'author'),
            'taxonomies' => array('post_tag'),
    )
  );
}

add_action( 'init', 'create_posttype' );


//CUSTOM LOG IN PAGE
function custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/assets/css/custom-style-login.css" />';
}
add_action('login_head', 'custom_login');

function logo_login_URL_removal() {
return 'http://thewebkitchen.co.uk';
}
add_filter( 'login_headerurl', 'logo_login_URL_removal' );

function login_custom_title() {
return 'THE WEB KITCHEN';
}
add_filter( 'login_headertitle', 'login_custom_title' );

function posts_link_attributes_2() {
    return 'class="arrow next-arrow"';
}

function posts_link_attributes_1() {
    return 'class="arrow prev-arrow"';
}

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');


function wp_infinitepaginate(){
    $loopFile        = $_POST['loop_file'];
    $paged           = $_POST['page_no'];
    $posts_per_page  = get_option('posts_per_page');
    # Load the posts
//    query_posts(array('paged' => $paged ));

 	 include(locate_template('loop-progetti.php' ));

    exit;
}

add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in

function validis_contact_email_to_admin() {

	  // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
        $title = strip_tags(trim($_POST["title"]));
        $subject = strip_tags(trim($_POST["subject"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        // Check that data was sent to the mailer.
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             Set a 400 (bad request) response code and exit.
            http_response_code(400);
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = get_field('contact_form_email','options');
//        $recipient = get_field('david@thewebkitchen.co.uk');

        // Set the email subject.
        $subject = "Contact form from $name";

        // Build the email content.
        $email_content = "Title: $title\n";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";
	global $wpdb;
 $wpdb->insert( 'wptwk_contact', array(
	 "Title" => $title,
	 "Name" => $name,
 "Email" => $email,
 "Subject" => $subject,
 "Message" => $message,

 ) );
        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
				header("Location: " . home_url() . "/contact-submission?state=success&form=contact&vname=" . $name);
die();
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
				header("Location: " . home_url() . "/contact-submission?state=success&form=contact&vname=" . $name);
				die();
        }
//	echo $output_messgae;
	header("Location: " . home_url() . "/contact-submission?state=end&form=contact&vname=" . $name);
die();

}
add_action( 'admin_post_nopriv_contact_form', 'validis_contact_email_to_admin' );
add_action( 'admin_post_contact_form', 'validis_contact_email_to_admin' );


// ACTIVE MENU
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
      $classes[] = 'active ';
  }
  return $classes;
}
