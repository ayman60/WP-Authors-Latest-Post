<?php /* Template Name: AuthorsCustomPage */ ?>
<?php get_header() ?>
<?php

global $porto_settings, $porto_layout;

$featured_images = porto_get_featured_images();

?>

    <div id="content" role="main" style="min-height:500px">
      <?php
      $authors=get_users();
      $i=0;
      //get all users list
      foreach($authors as $author){
          $authorList[$i]['id']=$author->data->ID;
          $authorList[$i]['name']=$author->data->display_name;
          $i++;
      }
      ?>
      
      <div class="contain">
          <?php
          foreach($authorList as $author){
              $args=array(
                      'showposts'=>1,
                      'author'=>$author['id'],
                      'caller_get_posts'=>1
                     );
              $query = new WP_Query($args);
              if($query->have_posts() ) {
                  while ($query->have_posts()){
                      $query->the_post();
          ?>

          <div class="col-md-3 col-sm-12 col-xs-12">
               <div class="author-card">
                <div class="img-thumbnail">  <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?> </div>
                 <h2 class="author-name"><?php echo the_author_posts_link();; ?></h2>
                 <a class="author-last-post" href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?> </a>
               </div>
        </div>
          <?php
                  }
                  wp_reset_postdata();
              }
          }
          ?>
      </div>
    </div>


<?php get_footer() ?>
