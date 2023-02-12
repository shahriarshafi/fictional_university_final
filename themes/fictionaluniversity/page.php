<?php
get_header();
while(have_posts()){
    the_post();?>
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>Let me change later</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">      
    <?php 
    $ParentId = wp_get_post_parent_id(get_the_ID()) ;
    if($ParentId){
    ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($ParentId); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($ParentId); ?></a> <span class="metabox__main"><?php the_title(); ?></span>
        </p> 
    </div>
    <?php
    }
    ?>

      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_permalink($ParentId); ?>"><?php echo get_the_title($ParentId); ?></a></h2>
        <ul class="min-list">
          <?php
          if($ParentId){
            $FindChildrenOf = $ParentId;
          }else{
            $FindChildrenOf = get_the_ID();
          }
          wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $FindChildrenOf,
            'sort_column' => 'menu_order'
          ));
          ?>
        </ul>
      </div>

      <div class="generic-content">
         <p><?php echo the_content(); ?></p>
      </div>
    </div>
 <?php echo get_the_ID(); ?>
 <?php echo wp_get_post_parent_id(get_the_ID()); ?>
    <div class="page-section page-section--beige">
      <div class="container container--narrow generic-content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
      </div>
    </div>

    <?php
}
get_footer();
?>