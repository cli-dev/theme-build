<?php

// Display all social profiles
  function displaySocialProfiles($args = array()) {

    $defaults = array(
      'type'        => '',
      'class'       => '',
    );

    $site_name      = get_bloginfo('name');
    $myoptions      = get_option( 'themesettings_');
    $options        = array_merge( $defaults, $args );
    $type           = $options['type'];
    $class          = (!empty($options['class'])) ? ' ' . $options['class'] : '';
    $social_links   = '<div class="cdm-social social-profiles' . $class . '"><div class="social-inner">';

    $links          = array(
                      'facebook'  => $myoptions['facebook'], 
                      'twitter'   => $myoptions['twitter'], 
                      'google-plus'    => $myoptions['google'], 
                      'linkedin'  => $myoptions['linkedin'], 
                      'tumblr'    => $myoptions['tumblr'], 
                      'pinterest' => $myoptions['pinterest'], 
                      'flickr'    => $myoptions['flickr'],
                      'newswire'  => $myoptions['newswire'], 
                      'instagram' => $myoptions['instagram'], 
                      'youtube'   => $myoptions['youtube'], 
                      'vimeo'     => $myoptions['vimeo']
                    );

    switch ($type) {
      case "circle-outline":
        $icon_type  = '-circle-outline';
        break;
      case "square-round":
        $icon_type  = '-square-rounded';
        break;
      case "circle":
        $icon_type  = '-circle';
        break;
      case "square":
        $icon_type  = '-square';
        break;
      default:
        $icon_type  = '';
    }

    foreach ($links as $profile => $profile_link) {
      if (!empty($profile_link)) {
        $profile_name  = $profile;
        $link          = $profile_link;
        $icon_class    = 'cdm cdm-' . $profile_name . $icon_type;
        $title         = $site_name . ' ' . ucfirst($profile_name);
        $social_links .= '<div class="social-icon ' . $profile_name . '"><a href="' . $link  . '" title="' . $title . '" target="_blank"><i class="' . $icon_class . '"></i></a></div>';
      }
    }
    
    $social_links .= '</div></div>';

    return $social_links;   
  }

// Post social share
  function displaySocialShare($args = array()) {
    $defaults = array(
      'type'        => 'icon1',
      'class'       => '',
    );

    $options        = array_merge( $defaults, $args );
    $type           = $options['type'];
    $class          = (!empty($options['class'])) ? ' ' . $options['class'] : '';
    $social_links   = '<div class="cdm-social social-share' . $class . '"><div class="social-inner">';

    switch ($type) {
      case "circle-outline":
        $icon_type  = '-circle-outline';
        break;
      case "square-round":
        $icon_type  = '-square-rounded';
        break;
      case "circle":
        $icon_type  = '-circle';
        break;
      case "square":
        $icon_type  = '-square';
        break;
      default:
        $icon_type  = '';
    }

    // Share on Facebook 
    $social_links .= '<div class="social-icon"><a href="http://www.facebook.com/share.php?u=' . get_permalink()  . '" title="Share this post on Facebook"  rel="nofollow" target="_blank"><i class="cdm cdm-facebook' . $icon_type . '"></i></a></div>';

    // Share on Twitter 
    $social_links .= '<div class="social-icon"><a href="http://twitter.com/home?status=' . get_permalink()  . '" title="Share this post on Twitter" rel="nofollow" target="_blank"><i class="cdm cdm-twitter' . $icon_type . '"></i></a></div>';

    // Share on Google
    $social_links .= '<div class="social-icon"><a href="https://plus.google.com/share?url=' . get_permalink()  . '" title="Share this post on Google+" rel="nofollow"target="_blank"><i class="cdm cdm-google-plus' . $icon_type . '"></i></a></div>';

    // Share on LinkedIn 
    $social_links .= '<div class="social-icon"><a href="http://linkedin.com/shareArticle?mini=true&url=' . get_permalink()  . '" title="Share this post on LinkedIn" rel="nofollow" target="_blank"><i class="cdm cdm-linkedin' . $icon_type . '"></i></a></div>';

    // Share on Tumblr
    $social_links .= '<div class="social-icon"><a href="http://www.tumblr.com/share/link?url=' . get_permalink()  . '" title="Share this post on Tumblr" rel="nofollow" target="_blank"><i class="cdm cdm-tumblr' . $icon_type . '"></i></a></div>';

    // Share on Pinterest 
    $social_links .= '<div class="social-icon"><a href="http://pinterest.com/pin/create/button/?url=' . get_permalink()  . '" title="Share this post on Pinterest" rel="nofollow" target="_blank"><i class="cdm cdm-pinterest' . $icon_type . '"></i></a></div>';
    
    $social_links .= '</div></div>';

    return $social_links;

  }

// Display single social profile
  function displaySocialProfile($args = array()) {

    $defaults = array(
      'profiles'    => '',      
      'type'        => '1',
      'class'       => '',
    );

    $site_name      = get_bloginfo('name');
    $myoptions      = get_option( 'themesettings_');
    $options        = array_merge( $defaults, $args );
    $type           = $options['type'];
    $class          = (!empty($options['class'])) ? ' ' . $options['class'] : '';
    $profile_names  = explode(', ', $options['profiles']);
    $social_links   = '<div class="social social-profiles' . $class . '">';

    switch ($type) {
      case "circle-outline":
        $icon_type  = '-circle-outline';
        break;
      case "square-round":
        $icon_type  = '-square-rounded';
        break;
      case "circle":
        $icon_type  = '-circle';
        break;
      case "square":
        $icon_type  = '-square';
        break;
      default:
        $icon_type  = '';
    }

    foreach ($profile_names as $profile) {
      if (!empty($myoptions[$profile])) {
        $profile_name  = $profile;
        $link          = $myoptions[$profile];
        $icon_class    = 'cdm cdm-' . $profile . $icon_type;
        $title         = $site_name . ' ' . ucfirst($profile);
        $social_links .= '<div class="social-icon ' . $profile . '"><a href="' . $link  . '" title="' . $title . '" target="_blank"><i class="cdm cdm-' . $icon_class . '"></i></a></div>';
      }
    }
    
    $social_links .= '</div>';

    return $social_links;   
  }

// FBR Badges
  function display_verified_fbr_badge(){
    $myoptions = get_option( 'themesettings_');
    $fbr_profile = 'http://www.fairbusinessreport.org/company/' . $myoptions['fbr_profile'] . '/profile';
    $badgePath = CDM_ROOT . '/imgs/FBR/' . $myoptions['badge_color'] . '/';

    $badge = '<div class="fbr-badge fbr-verified"><a href="http://www.fairbusinessreport.org/company/' . $myoptions['fbr_profile'] . '/profile" target="_blank" title="' . get_bloginfo( 'name' ) . '"><img src="' . $badgePath . 'Verified.png" alt="' . get_bloginfo( 'name' ) . ' Fair Business Report Profile" sizes="(max-width: 850px) 100vw, 850px" srcset="' . $badgePath . 'Verified_s01.png 200w,' . $badgePath . 'Verified_s02.png 298w,' . $badgePath . 'Verified_s03.png 382w,' . $badgePath . 'Verified_s04.png 457w,' . $badgePath . 'Verified_s05.png 527w,' . $badgePath . 'Verified_s06.png 597w,' . $badgePath . 'Verified_s07.png 653w,' . $badgePath . 'Verified_s08.png 716w,' . $badgePath . 'Verified_s09.png 775w,' . $badgePath . 'Verified_s10.png 850w"></a></div>';

    if ($myoptions['fbr_profile']) {
      return $badge;
    }
  }

  function display_verified_rating_fbr_badge(){
    $$myoptions = get_option( 'themesettings_');
    
    $badge = '<div class="fbr-badge fbr-verified-rating"><span id="starbadges"></span><script type="text/javascript" id="my_script_1" src="http://www.fairbusinessreport.org/js/getstarbadges.js?color=' . $myoptions['badge_color'] . '&companyname=' . $myoptions['fbr_profile'] . '&height=auto&width=200px"></script></div>';

    if ($myoptions['fbr_profile']) {
      return $badge;
    }
  }

  function display_top_place_badge(){
    $myoptions = get_option( 'themesettings_');
    $badgePath = CDM_ROOT . '/imgs/FBR/' . $myoptions['badge_color'] . '/';
    $badge = '<div class="fbr-badge fbr-top-place"><a href="http://www.fairbusinessreport.org/company/' . $myoptions['fbr_profile'] . '/profile" target="_blank" title="' . get_bloginfo( 'name' ) . '"><img src="' . $badgePath . 'Top-Places-To-Work.png" sizes="(max-width: 800px) 100vw, 800px" srcset="' . $badgePath . 'Top-Places-To-Work_s01.png 200w,' . $badgePath . 'Top-Places-To-Work_s02.png 293w,' . $badgePath . 'Top-Places-To-Work_s03.png 371w,' . $badgePath . 'Top-Places-To-Work_s04.png 439w,' . $badgePath . 'Top-Places-To-Work_s05.png 504w,' . $badgePath . 'Top-Places-To-Work_s06.png 564w,' . $badgePath . 'Top-Places-To-Work_s07.png 621w,' . $badgePath . 'Top-Places-To-Work_s08.png 674w,' . $badgePath . 'Top-Places-To-Work_s09.png 728w,' . $badgePath . 'Top-Places-To-Work_s10.png 800w"
 alt="' . get_bloginfo( 'name' ) . ' Fair Business Report Top Place to Work Award" /></a></div>';
    if ($myoptions['fbr_profile']) {
      return $badge;
    }
  }

  function display_customer_service_badge(){
    $myoptions = get_option( 'themesettings_');
    $badgePath = CDM_ROOT . '/imgs/FBR/' . $myoptions['badge_color'] . '/';
    $badge = '<div class="fbr-badge fbr-customer-service"><a href="http://www.fairbusinessreport.org/company/' . $myoptions['fbr_profile'] . '/profile" target="_blank" title="' . get_bloginfo( 'name' ) . '"><img src="' . $badgePath . 'Top-Customer-Service.png" sizes="(max-width: 800px) 100vw, 800px" srcset="' . $badgePath . 'Top-Customer-Service_s01.png 200w,' . $badgePath . 'Top-Customer-Service_s02.png 293w,' . $badgePath . 'Top-Customer-Service_s03.png 371w,' . $badgePath . 'Top-Customer-Service_s04.png 439w,' . $badgePath . 'Top-Customer-Service_s05.png 504w,' . $badgePath . 'Top-Customer-Service_s06.png 564w,' . $badgePath . 'Top-Customer-Service_s07.png 621w,' . $badgePath . 'Top-Customer-Service_s08.png 674w,' . $badgePath . 'Top-Customer-Service_s09.png 728w,' . $badgePath . 'Top-Customer-Service_s10.png 800w" alt="' . get_bloginfo( 'name' ) . ' Fair Business Report Top Customer Service Award" /></a></div>';
    if ($myoptions['fbr_profile']) {
      return $badge;
    }
  }

// Twitter Feed
  function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key=>$value){
      $r[] = "$key=" . rawurlencode($value);
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
  }

  function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
      $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
  }

  function addTweetEntityLinks( $tweet, $add_links) {
    // actual tweet as a string
    $tweetText = $tweet['text'];
   
    // If we want to actually add the links
    if($add_links == 1){
      // create an array to hold urls
      $tweetEntites = array();
     
      // add each url to the array
      foreach( $tweet['entities']['urls'] as $url ) {
        $tweetEntites[] = array (
            'type'    => 'url',
            'curText' => substr( $tweetText, $url['indices'][0], ( $url['indices'][1] - $url['indices'][0] ) ),
            'newText' => '<a href="' . $url['expanded_url'] . '" target="_blank">'.$url['display_url'].'</a>'
          );
      }  // end foreach
     
      // add each user mention to the array
      foreach ( $tweet['entities']['user_mentions'] as $mention ) {
        $string = substr( $tweetText, $mention['indices'][0], ( $mention['indices'][1] - $mention['indices'][0] ) );
        $tweetEntites[] = array (
            'type'    => 'mention',
            'curText' => mb_substr( $tweetText, $mention['indices'][0], ( $mention['indices'][1] - $mention['indices'][0] ), 'UTF-8'),
            'newText' => '<a href="http://twitter.com/' .$mention['screen_name'].'" target="_blank">'.$string.'</a>'
          );
      }  // end foreach
     
      // add each hashtag to the array
      foreach ( $tweet['entities']['hashtags'] as $tag ) {
        $string = substr( $tweetText, $tag['indices'][0], ( $tag['indices'][1] - $tag['indices'][0] ) );
        $tweetEntites[] = array (
            'type'    => 'hashtag',
            'curText' => substr( $tweetText, $tag['indices'][0], ( $tag['indices'][1] - $tag['indices'][0] ) ),
            'newText' => '<a href="http://twitter.com/search?q=%23'.$tag['text'].'&src=hash" target=_blank>'.$string.'</a>'
          );
      }  // end foreach
     
      // replace the old text with the new text for each entity
      foreach ( $tweetEntites as $entity ) {
        $tweetText = str_replace( $entity['curText'], $entity['newText'], $tweetText );
      } // end foreach
     
      return $tweetText;
    } else {
      return $tweetText;
    }
  }

  function returnTweet($screen_name, $number_of_tweets, $add_links, $add_username, $add_author_link){

    // Get Tweets

      $oauth_access_token         = "2296334100-mxbTpDoDNJwkMDsYX4A4QovelYNTBRtArfobWYe";
      $oauth_access_token_secret  = "AYBoR4XzbnxcEZPggRLsx01x6fZ3chfDkbIGg4bVtANBc";
      $consumer_key               = "v3uCcEDNF3CuBblKlHWEWtdYH";
      $consumer_secret            = "kZbHhSsPTalVQfsR9mDxcMHsPrlRCeyf5JbBfsahWpzRUTJh8i";

      $twitter_timeline           = "user_timeline";  //  mentions_timeline / user_timeline / home_timeline / retweets_of_me

      //  create request
      $request = array(
        'screen_name'       => $screen_name,
        'count'             => $number_of_tweets
      );

      $oauth = array(
        'oauth_consumer_key'        => $consumer_key,
        'oauth_nonce'               => time(),
        'oauth_signature_method'    => 'HMAC-SHA1',
        'oauth_token'               => $oauth_access_token,
        'oauth_timestamp'           => time(),
        'oauth_version'             => '1.0'
      );

      //  merge request and oauth to one array
      $oauth = array_merge($oauth, $request);

      //  do some magic
      $base_info              = buildBaseString("https://api.twitter.com/1.1/statuses/$twitter_timeline.json", 'GET', $oauth);
      $composite_key          = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
      $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
      $oauth['oauth_signature']   = $oauth_signature;

      //  make request
      $header = array(buildAuthorizationHeader($oauth), 'Expect:');
      $options = array( CURLOPT_HTTPHEADER => $header,
        CURLOPT_HEADER => false,
        CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?". http_build_query($request),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false);

      $feed = curl_init();
      curl_setopt_array($feed, $options);
      $json = curl_exec($feed);
      curl_close($feed);

      $items = json_decode($json, true);

    $tweets = '';
    $links = array();

    foreach($items as $item){
      $tweetTxt = addTweetEntityLinks( $item, $add_links );      
      $tweetDate = time_elapsed_string($item['created_at']);
      $tweetIcon = '<i class="cdm-tweet-icon"></i>';
      $tweetAuthorTxt = '@' . $item['user']['screen_name'];
      $tweetAuthor = ($add_author_link == 1) ? '<a href="https://twitter.com/' . $tweetAuthorTxt . '" target="_blank" class="cdm-tweet-meta-txt">' . $tweetAuthorTxt . '</a>' : '<span class="cdm-tweet-meta-txt">' . $tweetAuthorTxt . '</span>';

      $tweets .= '<div class="cdm-tweet">';
      $tweets .= '<p class="cdm-tweet-txt">' . $tweetTxt . '</p>';
      $tweets .= ($add_username == 1) ? '<p class="cdm-tweet-meta cdm-tweet-author"><span class="cdm-tweet-meta-inner">'. $tweetIcon . $tweetAuthor . '</span></p>' : '';
      $tweets .= '<p class="cdm-tweet-date cdm-tweet-meta"><span class="cdm-tweet-meta-inner">';
      $tweets .= $tweetIcon;
      $tweets .= '<span class="cdm-tweet-meta-txt">';
      $tweets .= $tweetDate;
      $tweets .= '</span>';
      $tweets .= '</span></p>';
      $tweets .= '</div>';
    }

    return $tweets;
  }
