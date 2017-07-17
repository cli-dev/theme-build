<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$item_name = 'twitter';

// Start Item Outer Container

  $item = '<div';
  $item .= ' class="cdm-item-wrapper ' . $item_name . '-wrapper';
  $item .= (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
  $item .= (get_sub_field('animation', $item_id) == 1) ? ' wow' : '';
  $item .= (get_sub_field('animation_effect', $item_id)) ? ' ' . get_sub_field('animation_effect', $item_id)  : '';
  $item .= '"'; 

  // Item Animation

    $animation = '';
    $animation .= (get_sub_field('animation_duration')) ? ' data-wow-duration="' . get_sub_field('animation_duration', $item_id) . 's"'  : '';
    $animation .= (get_sub_field('animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('animation_delay', $item_id) . 's"'  : '';
    $animation .=  (get_sub_field('animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('animation_offset', $item_id) . '"'  : '';
    $item .= (get_sub_field('animation', $item_id) == 1) ? $animation : '';

  $item .= '>';

  // Twitter Icon

    $twitter_icon = '';
    if(get_sub_field('display_twitter_icon', $item_id) == 1){
      $twitter_icon = '<div class="twitter-icon"><i class="cdm cdm-twitter';
      switch (get_sub_field('twitter_icon_type', $item_id)) {
        case "5":
          $twitter_icon .= '-circle-outline';
          break;
        case "4":
          $twitter_icon .= '-square-round';
          break;
        case "3":
          $twitter_icon .= '-circle';
          break;
        case "2":
          $twitter_icon .= '-square';
          break;
        default:
          $twitter_icon .= '';
      }
      $twitter_icon .= '"></i></div>';
    }

  $item .= $twitter_icon;

// Start Item Inner Container

  $item .= '<div';
  $item .= ' class="cdm-item ' . $item_name;
  if (get_sub_field('is_slider', $item_id) == 1) {
    $item .= ' cdm-slider"';
    $item .= ' data-slider-items="1"';
    $item .= ' data-slider-slideby="1"';
    $item .= ' data-slider-loop="false"';
    $item .= ' data-slider-gutter="0"';
    $item .= ' data-slider-gutter-sml="0"';
    $item .= ' data-slider-gutter-mds="0"';
    $item .= ' data-slider-gutter-md="0"';
    $item .= ' data-slider-gutter-mdl="0"';
    $item .= ' data-slider-gutter-lrg="0"';
    $item .= ' data-slider-nav="true"';
    $item .= ' data-slider-autoheight="false"';
    $item .= ' data-slider-autoplay="false"';
    $item .= ' data-slider-autoplay-timeout="0"';
    $item .= ' data-slider-items-sml="1"';
    $item .= ' data-slider-items-mds="1"';
    $item .= ' data-slider-items-md="1"';
    $item .= ' data-slider-items-mdl="1"';
    $item .= ' data-slider-items-lrg="1"';
  } else {
    $item .= '"';
  }
  $item .= '>';

// Start Item Content

  $username = get_sub_field('username', $item_id);
  $num_tweets = get_sub_field('number_of_tweets', $item_id);
  $add_links_to_tweet_text = get_sub_field('add_links_to_tweet_text', $item_id);
  $display_username = get_sub_field('display_username', $item_id);
  $link_username = get_sub_field('link_username', $item_id);
  
  $item .= returnTweet($username, $num_tweets, $add_links_to_tweet_text, $display_username, $link_username);

// End Item Content

  $item .= '</div>';

// End Item Inner Container

  $item .= '</div>';

// End Item Outer Container

  echo $item;

?>