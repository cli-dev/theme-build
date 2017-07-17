<?php 

function companyAddress($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $i++;
      if ($location['address_line_1'] || $location['unit_number'] || $location['city'] || $location['region'] || $location['postal_code']) {
        $full_address = $location['address_line_1'] . ' ' . $location['unit_number'] . ' ' . $location['city'] . ', ' . $location['region'] . ' ' . $location['postal_code'];
        $addressCode  = '<a href="';
        $addressCode .= ($location['maps_url']) ? $location['maps_url'] : 'http://maps.google.com/?q=' . urlencode($full_address);
        $addressCode .= '" rel="nofollow" target="_blank" class="schema-info address address-' . $i . '"><div class="address-inner">';
      
        if($location['address_line_1'] || $location['unit_number']){
          $addressCode .= '<div class="schema-info-wrapper address-line-1">';
        }
          if($location['address_line_1']){
            $addressCode .= '<span class="schema-info address-main">' . $location['address_line_1'] . ', </span>';  
          }
          if($location['unit_number']){
            $addressCode .= '<span class="schema-info address-unit">' . $location['unit_number'] . ', </span>';    
          }
        if($location['address_line_1'] || $location['unit_number']){
          $addressCode .= '</div>';
        }

        if($location['city'] || $location['region'] || $location['postal_code']){
          $addressCode .= '<div class="schema-info-wrapper address-line-2">';
        }
          if($location['city']){
            $addressCode .= '<span class="schema-info city">' . $location['city'] . ', </span>';  
          }
          if($location['region']){
            $addressCode .= '<span class="schema-info state">' . $location['region'] . '</span>';  
          }
          if($location['postal_code']){
            $addressCode .= '<span class="schema-info zip">' . $location['postal_code'] . '</span>';  
          }

        if($location['city'] || $location['region'] || $location['postal_code']){
          $addressCode .= '</div>';
        }

        $addressCode .= '</div></a>';
        $all_addresses .= $addressCode;
        $addresses += [ 'address_' . $i => strval ($addressCode) ];

      }
    }
    if (!empty($location_number)) {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
  else{
    return '';
  }
}

function companyAddressTxt($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      if ($location['address_line_1'] || $location['unit_number'] || $location['city'] || $location['region'] || $location['postal_code']) {
        $addressCode  = '<span class="schema-info-container address address-' . $i . '"><span class="address-inner">';
        if($location['address_line_1'] || $location['unit_number']){
          $addressCode .= '<span class="schema-info-wrapper address-line-1">';
        }
          if($location['address_line_1']){
            $addressCode .= '<span class="schema-info address-main">' . $location['address_line_1'] . ', </span>';  
          }
          if($location['unit_number']){
            $addressCode .= '<span class="schema-info address-unit">' . $location['unit_number'] . ', </span>';    
          }
        if($location['address_line_1'] || $location['unit_number']){
          $addressCode .= '</span>';
        }

        if($location['city'] || $location['region'] || $location['postal_code']){
          $addressCode .= '<span class="schema-info-wrapper address-line-2">';
        }
          if($location['city']){
            $addressCode .= '<span class="schema-info city">' . $location['city'] . ', </span>';  
          }
          if($location['region']){
            $addressCode .= '<span class="schema-info state">' . $location['region'] . '</span>';  
          }
          if($location['postal_code']){
            $addressCode .= '<span class="schema-info zip">' . $location['postal_code'] . '</span>';  
          }

        if($location['city'] || $location['region'] || $location['postal_code']){
          $addressCode .= '</span>';
        }

        $addressCode .= '</span></span>';
        $all_addresses .= $addressCode;
        $addresses += [ 'address_' . $i => strval ($addressCode) ];
      }
      $all_addresses .= $address_code;
      $addresses += [ 'address_' . $i => strval ($address_code) ];
    }
    if (!empty($location_number)) {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
}

function companyPhone($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_phones = '';
    $phones = array();
    $i = 0;
    foreach($locations as $location){ 
      $i++;   
      $phone_txt = $location['phone'];
      if($location['phone']){
        $phone_code = '<div class="schema-info-container phone-' . $i . '"><a href="tel:' . urlencode($phone_txt) . '" target="_blank" rel="nofollow" class="schema-info phone">' . $phone_txt . '</a></div>'; 
      } else {
        $phone_code = '';
      }       
      $all_phones .= $phone_code;
      $phones += [ 'phone_' . $i => strval ($phone_code) ];
    }
    if (!empty($location_number)) {
      return $phones['phone_' . $location_number];
    } else{
      return $all_phones;
    }
  }
  else{
    return '';
  }
}

function companyPhoneTxt($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_phones = '';
    $phones = array();
    $i = 0;
    foreach($locations as $location){    
      $phone_txt = $location['phone'];
      $i++;
      if(!empty($phone_txt)){
      $phone_code = '<span class="company-phone phone-' . $i . '">' . $phone_txt . '</span>';  
      } else {
        $phone_code = '';
      } 
      $all_phones .= $phone_code;
      $phones += [ 'phone_' . $i => strval ($phone_code) ];
    }
    if (!empty($location_number)) {
      return $phones['phone_' . $location_number];
    } else{
      return $all_phones;
    }
  }
  else{
    return '';
  }
}

function companyEmail($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_emails = '';
    $emails = array();
    $i = 0;
    foreach($locations as $location){
      $email_txt = $location['email'];
      $i++;
      if(!empty($email_txt)){
      $email_code = '<div class="schema-info-container email-' . $i . '"><a href="mailto:' . $email_txt  . '" rel="nofollow" target="_blank" class="schema-info email">' . $email_txt . '</a></div>'; 
      $all_emails .= $email_code;
      } else {
        $email_code = '';
      } 
      $emails += [ 'email_' . $i => strval ($email_code) ];
    }
    if (!empty($location_number)) {
      return $emails['email_' . $location_number];
    } else{
      return $all_emails;
    }
  }
  else{
    return '';
  }
}

function companyEmailTxt($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_emails = '';
    $emails = array();
    $i = 0;
    foreach($locations as $location){
      $email_txt = $location['email'];
      $i++;
      if(!empty($email_txt)){
      $email_code = '<a href="mailto:' . $email_txt  . '" class="company-email email-' . $i . '" rel="nofollow">' . $email_txt . '</a>';
      } else {
        $email_code = '';
      } 
      $all_emails .= $email_code;
      $emails += [ 'email_' . $i => strval ($email_code) ];
    }
    if (!empty($location_number)) {
      return $emails['email_' . $location_number];
    } else{
      return $all_emails;
    }
  }
  else{
    return '';
  }
}

function companyLogo($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_logos = '';
    $logos = array();
    $i = 0;
    foreach($locations as $location){
      $logo = $location['logo'];
      $logo_url = $logo['url'];
      $i++;
      $logo_code = '<div class="location-logo"><img src="' . $logo_url  . '" class="location-logo logo-' . $i . '" /></div>';
      $all_logos .= $logo_code;
      $logos += [ 'logo_' . $i => strval ($logo_code) ];
    }
    if (!empty($location_number)) {
      return $logos['logo_' . $location_number];
    } else{
      return $all_logos;
    }
  }
  else{
    return '';
  }
}

function locationType($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_types = '';
    $types = array();
    $i = 0;
    foreach($locations as $location){
      $type = $location['schema_type'];
      $i++;
      
      $all_types .= $type;
      $types += [ 'logo_' . $i => strval ($logo_code) ];
    }
    if (!empty($location_number)) {
      return $types['type_' . $location_number];
    } else{
      return $all_types;
    }
  }
  else{
    return '';
  }
}

function fullLocationInfo($location, $logo, $name){
  return '<div class="location-info-block"></div>';
}

function displayfullAddress($location_number) {
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $i++;
      $addressCode  = '';
      if ($location['address_line_1'] || $location['unit_number'] || $location['city'] || $location['region'] || $location['postal_code'] || $location['phone'] || $location['email']){

        $addressCode .= '<div class="company-info location-' . $i . '">';

        if ($location['location_name']){
          $addressCode .= '<div class="schema-info-container title"><h5 class="schema-info">' . $location['location_name'] . '</h5></div>';
        }

        if ($location['address_line_1'] || $location['unit_number'] || $location['city'] || $location['region'] || $location['postal_code']) {
          $full_address = $location['address_line_1'] . ' ' . $location['unit_number'] . ' ' . $location['city'] . ', ' . $location['region'] . ' ' . $location['postal_code'];
          $addressCode .= '<a href="';
          $addressCode .= ($location['maps_url']) ? $location['maps_url'] : 'http://maps.google.com/?q=' . urlencode($full_address);
          $addressCode .= '" rel="nofollow" target="_blank" class="schema-info-container address"><div class="address-inner">';
        
          if($location['address_line_1'] || $location['unit_number']){
            $addressCode .= '<div class="schema-info-wrapper address-line-1">';
          }
            if($location['address_line_1']){
              $addressCode .= '<span class="schema-info address-main">' . $location['address_line_1'] . ', </span>';  
            }
            if($location['unit_number']){
              $addressCode .= '<span class="schema-info address-unit">' . $location['unit_number'] . ', </span>';    
            }
          if($location['address_line_1'] || $location['unit_number']){
            $addressCode .= '</div>';
          }

          if($location['city'] || $location['region'] || $location['postal_code']){
            $addressCode .= '<div class="schema-info-wrapper address-line-2">';
          }
            if($location['city']){
              $addressCode .= '<span class="schema-info city">' . $location['city'] . ', </span>';  
            }
            if($location['region']){
              $addressCode .= '<span class="schema-info state">' . $location['region'] . '</span>';  
            }
            if($location['postal_code']){
              $addressCode .= '<span class="schema-info zip">' . $location['postal_code'] . '</span>';  
            }

          if($location['city'] || $location['region'] || $location['postal_code']){
            $addressCode .= '</div>';
          }
          $addressCode .= '</div></a>';

        }

        if($location['phone']){
          $addressCode .= '<div class="schema-info-container phone"><a href="tel:' . urlencode($location['phone']) . '" target="_blank" rel="nofollow" class="schema-info">' . $location['phone'] . '</a></div>';
        }

        if($location['email']){
          $addressCode .= '<div class="schema-info-container email"><a href="mailto:' . $location['email'] . '" rel="nofollow" target="_blank" class="schema-info">' . $location['email'] . '</a></div>';
        }

        $addressCode  .= '</div>';

      }

      $all_addresses .= $addressCode;
      $addresses += [ 'address_' . $i => strval ($addressCode) ];
    }
    if (!empty($location_number)) {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
}

function displayAddress($location_number) {
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $i++;
      $addressCode  = '';
      if ($location['address_line_1'] || $location['unit_number'] || $location['city'] || $location['region'] || $location['postal_code'] ){

        $addressCode .= '<div class="company-info location-' . $i . '">';

        if ($location['address_line_1'] || $location['unit_number'] || $location['city'] || $location['region'] || $location['postal_code']) {
          $full_address = $location['address_line_1'] . ' ' . $location['unit_number'] . ' ' . $location['city'] . ', ' . $location['region'] . ' ' . $location['postal_code'];
          $addressCode .= '<a href="';
          $addressCode .= ($location['maps_url']) ? $location['maps_url'] : 'http://maps.google.com/?q=' . urlencode($full_address);
          $addressCode .= '" rel="nofollow" target="_blank" class="schema-info-container address"><div class="address-inner">';
        
          if($location['address_line_1'] || $location['unit_number']){
            $addressCode .= '<div class="schema-info-wrapper address-line-1">';
          }
            if($location['address_line_1']){
              $addressCode .= '<span class="schema-info address-main">' . $location['address_line_1'] . ', </span>';  
            }
            if($location['unit_number']){
              $addressCode .= '<span class="schema-info address-unit">' . $location['unit_number'] . ', </span>';    
            }
          if($location['address_line_1'] || $location['unit_number']){
            $addressCode .= '</div>';
          }

          if($location['city'] || $location['region'] || $location['postal_code']){
            $addressCode .= '<div class="schema-info-wrapper address-line-2">';
          }
            if($location['city']){
              $addressCode .= '<span class="schema-info city">' . $location['city'] . ', </span>';  
            }
            if($location['region']){
              $addressCode .= '<span class="schema-info state">' . $location['region'] . '</span>';  
            }
            if($location['postal_code']){
              $addressCode .= '<span class="schema-info zip">' . $location['postal_code'] . '</span>';  
            }

          if($location['city'] || $location['region'] || $location['postal_code']){
            $addressCode .= '</div>';
          }
          $addressCode .= '</div></a>';

        }

        $addressCode  .= '</div>';

      }

      $all_addresses .= $addressCode;
      $addresses += [ 'address_' . $i => strval ($addressCode) ];
    }
    if (!empty($location_number)) {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
}

function displayContactInfo($location_number) {
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $i++;
      $addressCode  = '';
      if ($location['phone'] || $location['email']){

        $addressCode .= '<div class="company-info location-' . $i . '">';

        if($location['phone']){
          $addressCode .= '<div class="schema-info-container phone"><a href="tel:' . urlencode($location['phone']) . '" target="_blank" rel="nofollow" class="schema-info">' . $location['phone'] . '</a></div>';
        }

        if($location['email']){
          $addressCode .= '<div class="schema-info-container email"><a href="mailto:' . $location['email'] . '" rel="nofollow" target="_blank" class="schema-info">' . $location['email'] . '</a></div>';
        }

        $addressCode  .= '</div>';

      }

      $all_addresses .= $addressCode;
      $addresses += [ 'address_' . $i => strval ($addressCode) ];
    }
    if (!empty($location_number)) {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
}

function displayPhone($location_number) {
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $i++;
      $addressCode  = '';
      if ($location['phone']){

        $addressCode .= '<div class="company-info location-' . $i . '">';

        $addressCode .= '<div class="schema-info-container phone"><a href="tel:' . urlencode($location['phone']) . '" target="_blank" rel="nofollow" class="schema-info">' . $location['phone'] . '</a></div>';

        $addressCode  .= '</div>';

      }

      $all_addresses .= $addressCode;
      $addresses += [ 'address_' . $i => strval ($addressCode) ];
    }
    if (!empty($location_number)) {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
}

function displayEmail($location_number) {
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $i++;
      $addressCode  = '';
      if ($location['email']){

        $addressCode .= '<div class="company-info location-' . $i . '">';

        $addressCode .= '<div class="schema-info-container email"><a href="mailto:' . urlencode($location['email']) . '" target="_blank" rel="nofollow" class="schema-info">' . $location['email'] . '</a></div>';

        $addressCode  .= '</div>';

      }

      $all_addresses .= $addressCode;
      $addresses += [ 'address_' . $i => strval ($addressCode) ];
    }
    if (!empty($location_number)) {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
}

function getCoordinates($address){
  $address = urlencode($address);
  $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
  $response = file_get_contents($url);
  $json = json_decode($response,true);

  $lat = $json['results'][0]['geometry']['location']['lat'];
  $lng = $json['results'][0]['geometry']['location']['lng'];

  return array($lat, $lng);
}

function schemaInfo(){
  // Global Info
    $locations = get_field('locations', 'options');
    $myoptions = get_option( 'themesettings_');
    $company_logo = ($myoptions['company_name']) ? '"logo" : "' . $myoptions['company_logo'] . '", "image" : "' . $myoptions['company_logo'] . '", ' : '"logo" : "' . $myoptions['default_logo_png']['url'] . '", "image" : "' . $myoptions['default_logo_png']['url'] . '", ' ;
    $company_name = ($myoptions['company_name']) ? '"name" : "' . $myoptions['company_name'] . '", ' : '"name" : "' . get_bloginfo('name') . '", ';
    $company_description = ($myoptions['description']) ? '"description" : "' . $myoptions['description'] . '", ' : '"description" : "' . get_bloginfo('description') . '", ';
    $company_id = '"@id" : "' . esc_url(home_url('/')) . '", ';
    $company_url = '"url" : "' . esc_url(home_url('/')) . '", ';


    $json = '<script type="application/ld+json">{"@context": { "@vocab": "http://schema.org/" },';
    $json .= (empty($locations)) ? '"@type": "Organization", ' : '';
    $json .= (!empty($locations) && sizeof($locations) == 1) ? '"@type" : "' . $locations[0]['schema_type'] . '", ' : '';
    $json .= (empty($locations) || sizeof($locations) == 1) ? $company_name : '';
    $json .= (empty($locations) || sizeof($locations) == 1) ? $company_logo : '';
    $json .= (empty($locations) || sizeof($locations) == 1) ? $company_url : '';

  // Social JSON

    $social_links = '';

    if ($myoptions['facebook'] || $myoptions['twitter'] || $myoptions['google'] || $myoptions['linkedin'] || $myoptions['tumblr'] || $myoptions['pinterest'] || $myoptions['flickr'] || $myoptions['instagram'] || $myoptions['youtube'] || $myoptions['vimeo']) {
      $links = array(
        'facebook'  => $myoptions['facebook'], 
        'twitter'   => $myoptions['twitter'], 
        'google'    => $myoptions['google'], 
        'linkedin'  => $myoptions['linkedin'], 
        'tumblr'    => $myoptions['tumblr'], 
        'pinterest' => $myoptions['pinterest'], 
        'flickr'    => $myoptions['flickr'], 
        'instagram' => $myoptions['instagram'], 
        'youtube'   => $myoptions['youtube'], 
        'vimeo'     => $myoptions['vimeo']
      );
      foreach ($links as $profile => $profile_link) {
        if (!empty($profile_link)) {
          $social_links .= '"' . $profile_link . '", ';
        }
      }
      $json .= (empty($locations) || sizeof($locations) == 1) ? '"sameAs" : [' . rtrim($social_links, ', ') . '], ' : '';
    }

  // Address JSON
    if($locations){
      if (sizeof($locations) > 1) {
        $json .= '"@graph" : [';
        $parent_company = $company_id . '"@type": "Organization", ' . $company_name . $company_url . $company_logo . '"sameAs" : [' . rtrim($social_links, ', ') . '], ';
        $json .= '{' . rtrim($parent_company, ', ') . '}, ';    
        $all_locations = '';   
        foreach($locations as $location){
          $location_info  = '"@type" : "' . $location['schema_type'] . '", ';
          $location_info .= '"parentOrganization": {"@type": "Organization",' . rtrim($company_name, ', ') . '}, ';
          // Location Name
            if($location['location_name']){
              $location_info .= '"name" : "' . $location['location_name'] . '", ';
              $location_info .= '"@id" : "' . esc_url(home_url()) . '#' . seoUrl($location['location_name']) . '", ';
            } elseif ($myoptions['company_name']) {
              $location_info .= '"name" : "' . $myoptions['company_name'] . '" ';
              $location_info .= '"@id" : "' . esc_url(home_url()) . '#' . seoUrl($myoptions['company_name']) . '", ';
            } else {
              $location_info .= '"name" : "' . get_bloginfo('name') . '", ';
              $location_info .= '"@id" : "' . esc_url(home_url()) . '#' . seoUrl(get_bloginfo('name')) . '", ';
            }
          
          // Location Address

            if ($location['address_line_1'] || $location['unit_number'] || $location['city'] || $location['region'] || $location['postal_code']) {
              $location_info .= '"address" : {"@type" : "PostalAddress",';
              $address = '';
              $coordAdd = '';
              if($location['address_line_1'] || $location['unit_number']){
                $address .= '"streetAddress" : "' . $location['address_line_1'] . ' ' . $location['unit_number'] . '", ';  
                $coordAdd .= $location['address_line_1'] . ',';
              }
              if($location['city']){
                $address .= '"addressLocality" : "' . $location['city'] . '", ';  
                $coordAdd .= ' ' . $location['city'] . ',';
              }
              if($location['region']){
                $address .= '"addressRegion" : "' . $location['region'] . '", ';  
                $coordAdd .= ' ' . $location['region'];
              }
              if($location['postal_code']){
                $address .= '"postalCode" : "' . $location['postal_code'] . '", ';  
                $coordAdd .= ' ' . $location['postal_code'];
              }
              $location_info .= rtrim($address, ', ');
              $location_info .= '}, ';
              $coords = ($coordAdd) ? getCoordinates($coordAdd) : '';
              $location_info .= ($coords) ? '"geo" : { "@type":"GeoCoordinates", "latitude" : ' . $coords[0] . ', "longitude" : ' . $coords[1] . '},' : '';
            }

            // Location Map

              $location_info .= ($location['maps_url']) ? '"hasMap": { "@type": "Map", "mapType": "VenueMap", "url": "' . $location['maps_url']. '"}, ' : '';
            
          // Location Phone

            $location_info .= ($location['phone']) ? '"telephone" : "' . $location['phone'] . '", ' : '';

          // Location Email

            $location_info .= ($location['email']) ? '"email" : "' . $location['email'] . '", ' : '';

          // Location Image

            $location_info .= ($location['logo']) ? '"image" : "' . $location['logo'] . '", ' : '';

          // Location URL

            $location_info .= ($location['url']) ? '"url" : "' . $location['url'] . '", ' : '';

          // Menu URL

            $location_info .= ($location['menu_url']) ? '"menu" : "' . $location['menu_url'] . '", ' : '';

          // Location hours

            if ($location['hours_of_operation']) {
              $hours = $location['hours_of_operation'];
              $time = '"openingHoursSpecification" : [';
              $allHours = '';
              foreach($hours as $hour){
                $allHours = '{"@type": "OpeningHoursSpecification",';
                $days = $hour['days_of_the_week'];
                if ($days) {
                  $allDays = '"dayOfWeek": [';
                  foreach($days as $day){
                    $allDays .= '"' . $day . '", ';
                  }
                  $allHours .= rtrim($allDays, ', ') . '], ';
                }

                if ($hour['opening_time']) {
                  $allHours .= '"opens" : "' . date('H:i',strtotime($hour['opening_time'])) . '", ';
                }
                
                if ($hour['closing_time']) {
                  $allHours .= '"closes" : "' . date('H:i',strtotime($hour['closing_time'])) . '", ';
                }
                $time .= rtrim($allHours, ', ') . '}, ';
              }
              $location_info .= rtrim($time, ', ') . '],';
            }
        
          $all_locations .= '{' . rtrim($location_info, ', ') . '}, ';
        }
        
        $json .= rtrim($all_locations, ', ') . ']';
      } else {
        // Location Address
          if ($locations[0]['address_line_1'] || $locations[0]['unit_number'] || $locations[0]['city'] || $locations[0]['region'] || $locations[0]['postal_code']) {
            $json .= '"address" : {"@type" : "PostalAddress",';
            $address = '';
            $coordAdd = '';
            if($locations[0]['address_line_1'] || $locations[0]['unit_number']){
              $address .= '"streetAddress" : "' . $locations[0]['address_line_1'] . ' ' . $locations[0]['unit_number'] . '", ';  
              $coordAdd .= $locations[0]['address_line_1'] . ',';
            }
            if($locations[0]['city']){
              $address .= '"addressLocality" : "' . $locations[0]['city'] . '", ';  
              $coordAdd .= ' ' . $locations[0]['city'] . ',';
            }
            if($locations[0]['region']){
              $address .= '"addressRegion" : "' . $locations[0]['region'] . '", ';  
              $coordAdd .= ' ' . $locations[0]['region'];
            }
            if($locations[0]['postal_code']){
              $address .= '"postalCode" : "' . $locations[0]['postal_code'] . '", ';  
              $coordAdd .= ' ' . $locations[0]['postal_code'];
            }
            $json .= rtrim($address, ', ');
            $json .= '}, ';
            $coords = ($coordAdd) ? getCoordinates($coordAdd) : '';
            $json .= ($coords) ? '"geo" : { "@type":"GeoCoordinates", "latitude" : ' . $coords[0] . ', "longitude" : ' . $coords[1] . '},' : '';
          }

          // Location Map
          
            $json .= ($locations[0]['maps_url']) ? '"hasMap": { "@type": "Map", "mapType": "VenueMap", "url": "' . $locations[0]['maps_url']. '"}, ' : '';
          
        // Location Phone

          $json .= ($locations[0]['phone']) ? '"telephone" : "' . $locations[0]['phone'] . '", ' : '';

        // Location Email

          $json .= ($locations[0]['email']) ? '"email" : "' . $locations[0]['email'] . '", ' : '';

        // Menu URL

          $json .= ($locations[0]['menu_url']) ? '"menu" : "' . $locations[0]['menu_url'] . '", ' : '';

        // Location hours
          if ($locations[0]['hours_of_operation']) {
            $hours = $locations[0]['hours_of_operation'];
            $time = '"openingHoursSpecification" : [';
            $allHours = '';
            foreach($hours as $hour){
              $allHours = '{"@type": "OpeningHoursSpecification",';
              $days = $hour['days_of_the_week'];
              if ($days) {
                $allDays = '"dayOfWeek": [';
                foreach($days as $day){
                  $allDays .= '"' . $day . '", ';
                }
                $allHours .= rtrim($allDays, ', ') . '], ';
              }

              if ($hour['opening_time']) {
                $allHours .= '"opens" : "' . date('H:i',strtotime($hour['opening_time'])) . '", ';
              }
              
              if ($hour['closing_time']) {
                $allHours .= '"closes" : "' . date('H:i',strtotime($hour['closing_time'])) . '", ';
              }
              $time .= rtrim($allHours, ', ') . '}, ';
            }
            $json .= rtrim($time, ', ') . '],';
          }
      }
      
    }

  return rtrim($json, ', ') . '} </script>';
}

?>