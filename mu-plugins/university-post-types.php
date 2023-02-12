<?php
  //mu-plugins folder name doesn't matter

 
  function university_post_types(){
    //register_post_type('Name of custom post type' , 'array')
    register_post_type('event' , array(
      'show_in_rest'=> true, //Make the event modern edit screen
      'supports'=> array('title','editor','excerpt'), //confirm excerpt & must use to look modern edit screen
      // 'supports'=> array('title','editor','excerpt' , 'custom-fields'), Install Advanced Custom Fields
      'rewrite' => array('slug' => 'events'),     
      'has_archive' => true,
      'public' => true, 
      'labels' => array(
        'name' => 'Events',
        'add_new_item'=> 'Add New Event',
        'edit_item'=> 'Edit Event',
        'all_items' => 'All Events',
        'singular_name'=> 'Event',
      ),
      'menu_icon' => 'dashicons-calendar', //Google Wordpress Dashicons
    ));
  }
  
  add_action('init' , 'university_post_types');
?>



