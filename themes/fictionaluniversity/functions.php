<?php

// function university_files(){

//     wp_enqueue_style('custom_font' , '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
//     wp_enqueue_style('font_awesome' , '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
//     if(strstr($_SERVER['SERVER_NAME'],'fictional-university.local')){
//         wp_enqueue_style('main_css' , get_stylesheet_uri());  //this line shouldn't here
//         wp_enqueue_script('main_js' , 'http://localhost:3000/bundled.js' , NULL , '1.0' , true);
//     }else{
//         wp_enqueue_script('our-vendor-js' , get_theme_file_uri('/bundled-assets/vendor.js') , NULL , '1.0' , true);
//         wp_enqueue_script('main-university-js' , get_theme_file_uri('/bundled-assets/scripts.js') , NULL , '1.0' , true);
//         wp_enqueue_style('our-main-styles' , get_theme_file_uri('/bundled-assets/styles.css'));
//     }
// }

function university_files() {
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
    //wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=yourkeygoeshere', NULL, '1.0', true);
  
    if (strstr($_SERVER['SERVER_NAME'], 'fictional-university.locall')) {
      wp_enqueue_script('main-university-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
    } else {
      wp_enqueue_script('our-vendors-js', get_theme_file_uri('/bundled-assets/vendors~scripts.9f081058b0665e3bdd11.js'), NULL, '1.0', true);
      wp_enqueue_script('main-university-js', get_theme_file_uri('/bundled-assets/scripts.b5b2cfb8ef46f0fe7a97.js'), NULL, '1.0', true);
      wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.b5b2cfb8ef46f0fe7a97.css'));
    }
  
    wp_localize_script('main-university-js', 'universityData', array(
      'root_url' => get_site_url(),
      'nonce' => wp_create_nonce('wp_rest')
    ));
  }

add_action('wp_enqueue_scripts' ,'university_files');

function university_features(){
    //will add menu dynamically
    register_nav_menu('headerMenuLocation' , 'Header Menu Location');
    register_nav_menu('footerLocationOne' , 'Footer Location One');
    register_nav_menu('footerLocationTwo' , 'Footer Location Two');

    //will add title
    add_theme_support('title-tag');
}

add_action('after_setup_theme' , 'university_features');

function university_adjust_queries($query){
  $query->set('posts_per_page' , '1');
}

add_action('pre_get_posts' , 'university_adjust_queries');


// function university_post_types(){
     //register_post_type('Name of custom post type' , 'array')
//   register_post_type('event' , array(
//     'public' => true, //the post type visible to editorts and viewers of the web site
//     'labels' => array(
//       'name' => 'Events'
//     ),
//     'menu_icon' => 'dashicons-calendar', //Google Wordpress Dashicons
//   ));
// }

// add_action('init' , 'university_post_types');
?>