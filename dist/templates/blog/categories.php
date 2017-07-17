<div class="post-categories">
  <?php 
    $categories = get_the_category();
    foreach( $categories as $category ) {
      echo '<span class="post-category ' . $category->slug . '" >' . $category->name . '</span>';
    } 
  ?>
</div>