<?php

  function printCardDetails($type, $title, $date) {

    if ($type=="Instagram") { ?>
      <div class="Card-text">
        <div class="Card-title"><?php echo $title ?></div>
        <div class="Card-date"><?php echo $date ?></div>
      </div>
    <?php } else { ?>
      <div class="Card-title">
        <div class="Card-title-text">
          <div class="Card-title-text-container">
            <div class="Card-title-text-container-value">
              <?php echo $title ?>
            </div>
          </div>
        </div>
        <div class="Card-title-date">
          <div class="Card-title-date-value">
            <?php echo $date ?>
          </div>
        </div>
      </div>
    <?php }
  }

  function printPicturesCardDetails($type, $title, $date) {
    ?>
    <div class="Card-title">
      <div class="Card-title-text">
        <div class="Card-title-text-container">
          <div class="Card-title-text-container-value">
            <?php echo $title ?>
          </div>
        </div>
      </div>
      <div class="Card-title-date">
        <div class="Card-title-date-value">
          <?php echo $date ?>
        </div>
      </div>
    </div>
    <?php
  }

  function printCardDetailsForFullLength($type, $title, $date) {
    $newDate = date("F j, Y g:i A", strtotime($date));
    ?>
    <div class="FullLength-card-title">
      <?php echo $title;?>
    </div>
    <div class="FullLength-card-date">
      Posted: <?php echo $newDate;?>
    </div>
    <?php
  }

  function printCardHeaderWithDetail($type, $title, $date) {
    ?>
      <div class='Card Card--<?php echo $type;?>'>
        <div class="Card-container">
          <?php printCardDetails($type, $title, $date); ?>
          <div class="Card-content">
    <?php
  }

  function printCardHeader($type) {
    ?>
      <div class='Card Card--<?php echo $type;?>'>
        <div class="Card-container">
          <div class="Card-content">
    <?php
  }


  function printCardFooterWithDetail($type, $title, $date) {
    ?>
          </div>
          <?php printCardDetails($type, $title, $date); ?>
        </div>
      </div>
    <?php
  }

  function printCardFooter() {
    ?>
          </div>
        </div>
      </div>
    <?php
  }

  // ==============================
  // VIDEOS

  // Video page content
  function printVideoContent() {
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/videos.php'));
    $rows = $data->rows;

    for ($i=0; $i<count($rows); $i++) { 
      $name = $rows[$i]->name;
      ?>
      <li class="CardTile CardTile--videos" data-filter-class='["<?php echo $name; ?>"]'>
        <?php printCardVideo($rows[$i]); ?>
      </li>
      <?php
    }
  }

  // function r(n) { $(".Card--video").eq(n).removeClass("Card--isLoading"); } function nn(n) { if (n <100) { r(n); setTimeout(function() { nn(n+1) }, 200) } } nn(0)
  function printCardVideo($cardData) {
    // $type  = 'Video';
    // $title = 'New Video: “What I Like About Me” -Album: Happy Times';
    // $date  = 'Thursday, January 8th, 2015';
    
    $type      = 'Video'; 
    $title     = stripslashes($cardData->description);
    $date      = $cardData->imagedate;
    $youtubeId = $cardData->alttext;


    printCardHeader($type);
    // hub_video_thumbnail
    // <div class="Card--video-thumb-thumbnail cursor-pointer" href="#" data-v_code="vsRDsUOlhS8"></div>
    ?>
      <div class="Card-content-container">
        <div class="Card--video-thumb" onclick="youTubeVideoPopupAdd('<?php echo $youtubeId;?>')">
          <img class="Card--video-thumb-img" src="http://img.youtube.com/vi/<?php echo $youtubeId;?>/mqdefault.jpg" class="shadow_box_small">
          <div class="Card--video-thumb-play cursor-pointer" href="#" data-v_code="<?php echo $youtubeId;?>"></div>
        </div>
      </div>
    <?php 
    printCardFooterWithDetail($type, $title, $date);
  }

  // ==============================
  // TOUR

  // Tour page content
  function printTourContent() {
    // Create upcoming shows
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/tour_upcoming.php'));
    $rows = $data->rows;
    $name = "tour-upcoming";
    for ($i=0; $i<count($rows); $i++) { 
      //$name = $rows[$i]->name;
      ?>
      <li class="CardTile CardTile--tour CardTile--tour--upcoming" data-filter-class='["<?php echo $name; ?>"]'>
        <?php printCardTour($rows[$i]); ?>
      </li>
      <?php
    }

    // Create past shows
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/tour_past.php'));
    $rows = $data->rows;
    $name = "tour-past";
    for ($i=0; $i<count($rows); $i++) { 
      //$name = $rows[$i]->name;
      ?>
      <li class="CardTile CardTile--tour CardTile--tour--past" data-filter-class='["<?php echo $name; ?>"]'>
        <?php printCardTour($rows[$i]); ?>
      </li>
      <?php
    }

  }

  function printDateBox($date, $className) {
      // Get the year, month, and date
      //$temp_date = $date;//$showdata['date_mysql'];
      $atoms = explode('-',$date);
      // list($year,$month,$day) = split("-",$your_date_variable_in_php);
      $temp_year = $atoms[0];
      $temp_month = date("M", mktime(0, 0, 0, $atoms[1]));
      $temp_day = ltrim($atoms[2], '0');
      // <abbr class="dtstart" title="< ? php echo $showdata['iso_date']; ? >">
      ?>
      <div class="<?php echo $className;?>">
        <div class='DateBox-container'>
          <div class='DateBox-month'>
            <?php echo $temp_month; ?>
          </div>
          <div class='DateBox-day'>
            <?php echo $temp_day; ?>
          </div>
        </div>
        <div class='DateBox-year'>
          <?php echo $temp_year; ?> 
        </div>
      </div>
      <?php
  }

  // This is used just because it's used within gigpress...
  // But it doesn't do what it is intended for, as defined here:
  // ... https://codex.wordpress.org/Function_Reference/wptexturize
  // function wptexturize($text) {
  //   return $text;
  // }


  // https://codex.wordpress.org/Function_Reference/esc_url
  // https://developer.wordpress.org/reference/functions/esc_url/
  // https://core.trac.wordpress.org/browser/tags/4.2.2/src/wp-includes/formatting.php#L3101
  // function esc_url($url) {
  //   return $url;
  // }

  function strTimeToFormattedTime($strTime) {
    $timeparts = explode(':', $strTime);
    $AMPM;
    $hour = intval($timeparts[0]);
    if ($timeparts[2] == '01') {
      return '';
    } else {
      // Determine AM or PM
      if ($hour >= 12) {
        $AMPM = "PM";
      } else {
        $AMPM = "AM";
      }

      // Correct the hour to not be 24 hour style.
      if (intval($timeparts[0]) > 12) {
        $hour = $hour - 12;
      } else {
        if ($hour == 0) {
          $hour = 12;
        }
      }

      //return ltrim($timepart0, '0') . ":" . $timeparts[1];
      return $hour . ":" . $timeparts[1] . " " . $AMPM;
    }
  }

  function printCardTour($show) {
    // $type  = 'Video';
    // $title = 'New Video: “What I Like About Me” -Album: Happy Times';
    // $date  = 'Thursday, January 8th, 2015';
    
    $type                       = 'Tour'; 
    $target                     = " target ='_blank' ";
    $showdata                   = array();
    //$title                    = stripslashes($cardData->description);
    $showdata['show_date']      = $show->show_date;
    $showdata['show_expire']    = $show->show_expire;
    //$youtubeId                = $cardData->alttext;
    
    // $showdata['address_url'] = ($show->venue_address) ? 'http://maps.google.com/maps?&amp;q='. urlencode($show->venue_address). ',' . urlencode($show->venue_city) . ',' . urlencode($show->venue_country) : '';
    // $showdata['address']     = ($show->venue_address) ? '<a href="' . $showdata['address_url'] . '" class="gigpress-address"' . $target . '>' . wptexturize($show->venue_address) . '</a>' : '';
    
    $showdata['address_plain']  = ($show->venue_address) ? wptexturize($show->venue_address) : '';
    $showdata['address_url']    = ($show->venue_address) ? 'http://maps.google.com/maps?&amp;q='. urlencode($show->venue_address). ',' . urlencode($show->venue_city) . ',' . urlencode($show->venue_country) : '';
    $showdata['address']        = ($show->venue_address) ? '<a href="' . $showdata['address_url'] . '" class="gigpress-address"' . $target . '>' . wptexturize($show->venue_address) . '</a>' : '';
    $showdata['city']           = wptexturize($show->venue_city); 
    $showdata['country']        = ($gpo['country_view'] == 'long') ? wptexturize($gp_countries[$show->venue_country]) : $show->venue_country;
    $showdata['venue']          = ($show->venue_url) ? '<a href="' . esc_url($show->venue_url) . '"' . $target . '>' . wptexturize($show->venue_name) . '</a>' : wptexturize($show->venue_name);
    //$showdata['venue_id']       = $show->venue_id;
    $showdata['venue_plain']    = wptexturize($show->venue_name);
    $showdata['venue_phone']    = wptexturize($show->venue_phone);
    $showdata['venue_url']      = ($show->venue_url) ? esc_url($show->venue_url) : ''; 

    $timeparts = explode(':', $show->show_time);
    $showdata['admittance'] = (!empty($show->show_ages) && $show->show_ages != 'Not sure') ? wptexturize($show->show_ages) : '';
    //$showdata['artist'] = wptexturize($show->artist_name);
    //$showdata['artist_id'] = $show->artist_id;
    //$showdata['calendar_summary'] = $show->artist_name . ' ' . __("at", "gigpress") . ' ' . $show->venue_name;

    $showdata['ticket_url'] = ($show->show_tix_url) ? esc_url($show->show_tix_url) : '';
    $showdata['ticket_phone'] = wptexturize($show->show_tix_phone);
    $showdata['time'] = strTimeToFormattedTime($show->show_time); //($timeparts[2] == '01') ? '' : ltrim($timeparts[0], '0') . ":" . $timeparts[1]; //($timeparts[2] == '01') ? '' : (date($gpo['time_format'], mktime($timeparts[0], $timeparts[1]));

    $showdata['calendar_details'] = '';
      //if($show->tour_name) $showdata['calendar_details'] .= $gpo['tour_label'] . ': ' . $show->tour_name . '. ';
      // if($show->show_price) $showdata['calendar_details'] .= __("Price", "gigpress") . ': ' . $show->show_price . '. ';
      // if($show->show_tix_phone) $showdata['calendar_details'] .= __("Box office", "gigpress") . ': ' . $show->show_tix_phone . '. ';
      // if($show->show_venue_phone) $showdata['calendar_details'] .= __("Venue phone", "gigpress") . ': ' . $show->venue_phone . '. ';
      // if($show->show_notes) $showdata['calendar_details'] .= __("Notes", "gigpress") . ': ' . $show->show_notes . ' ';

      // Added Time and Ticket phone number
      if($showdata['time']) $showdata['calendar_details']       .= "Time: " . $showdata['time'] . '. ';
      if($show->show_price) $showdata['calendar_details']       .= "Price: " . $show->show_price . '. ';
      if($show->show_tix_phone) $showdata['calendar_details']   .= "Box office: " . $show->show_tix_phone . '. ';
      if($show->show_venue_phone) $showdata['calendar_details'] .= "Venue phone: " . $show->venue_phone . '. ';
      if($show->show_notes) $showdata['calendar_details']       .= "Notes: " . wptexturize($show->show_notes) . ' ';

      
      if($showdata['ticket_phone']) $showdata['calendar_details']       .= "Tickets phone: " . $showdata['ticket_phone'] . ' ';

      $showdata['calendar_details'] .= $showdata['admittance'];
      //$showdata['calendar_details'] = str_replace(array(";",",","\n","\r"), array('\;','\,',' ',' '), $showdata['calendar_details']);

    $showdata['calendar_location'] = $show->venue_name . ', ';
      if($show->venue_address) $showdata['calendar_location'] .= $show->venue_address . ', ';
      $showdata['calendar_location'] .= $show->venue_city . ', ' . $show->venue_country;
    
    $showdata['calendar_start'] = $show->show_date; //($timeparts[2] == '01') ? str_replace('-', '', $show->show_date) : str_replace(array('-',':',' '), array('','','T'), get_gmt_from_date($show->show_date . ' ' . $show->show_time)) . 'Z';
    $showdata['calendar_end']   = $show->show_expire;
    // if($timeparts[2] == '01') {
    //   $showdata['calendar_end'] = ($show->show_expire == $show->show_date) ? $showdata['calendar_start'] : date('Ymd', strtotime($show->show_expire . '+1 day')); 
    // } else {
    //   $showdata['calendar_end'] = ($show->show_expire == $show->show_date) ? $showdata['calendar_start'] : str_replace(array('-',':',' '), array('','','T'), get_gmt_from_date($show->show_expire . ' ' . $show->show_time)) . 'Z';   
    // }
    //$showdata['date'] = ($show->show_related && $gpo['relatedlink_date'] == 1 && $scope == 'public') ? '<a href="' . gigpress_related_link($show->show_related, "url") . '">' . mysql2date($gpo['date_format'], $show->show_date) . '</a>' : mysql2date($gpo['date_format'], $show->show_date);
    //$showdata['date_long'] = mysql2date($gpo['date_format_long'], $show->show_date);    
    //$showdata['date_mysql'] = $show->show_date;   
    //$showdata['end_date'] = ($show->show_date != $show->show_expire) ? mysql2date($gpo['date_format'], $show->show_expire) : '';
    //$showdata['end_date_long'] = ($show->show_date != $show->show_expire) ? mysql2date($gpo['date_format_long'], $show->show_expire) : '';
    //$showdata['end_date_mysql'] = $show->show_expire;   
    //$showdata['ical'] = '<a href="' . GIGPRESS_ICAL . '&amp;show_id=' . $show->show_id . '">' . __("Download iCal", "gigpress") . '</a>';
    //$showdata['id'] = $show->show_id;
    //$showdata['iso_date'] = $show->show_date." ".$show->show_time;
    //$showdata['iso_end_date'] = $show->show_expire." ".$show->show_time;
    $showdata['notes'] = wptexturize($show->show_notes);
    $showdata['price'] = wptexturize($show->show_price);
    //$showdata['related_id'] = ($show->show_related) ? $show->show_related : 0;
    //$showdata['related_url'] = ($show->show_related) ? gigpress_related_link($show->show_related, 'url') : '';
    //$showdata['related_edit'] = ($show->show_related) ? gigpress_related_link($show->show_related, 'edit') : '';
    //$showdata['related_link'] = ($show->show_related) ? gigpress_related_link($show->show_related, 'view') : '';
    //$showdata['rss_date'] = mysql2date('D, d M Y', $show->show_date, false). " ". $show->show_time." " . gigpress_get_O_offset(get_option('gmt_offset'));
    $showdata['status'] = $show->show_status;
    switch($showdata['status']) {
      //case 'active': $showdata['ticket_link'] = ($show->show_tix_url && $show->show_expire >= GIGPRESS_NOW) ? '<a href="' . esc_url($show->show_tix_url)  . '"' . $target . ' class="gigpress-tickets-link">' . __("Buy ticket", "gigpress") . '</a>' : '';
      //case 'active': $showdata['ticket_link'] = ($show->show_tix_url && $show->show_expire >= GIGPRESS_NOW) ? '(<a href="' . esc_url($show->show_tix_url)  . '"' . $target . ' class="gigpress-tickets-link">' . 'Tickets &amp information' . '</a>)' : '';
      case 'active': $showdata['ticket_link'] = ($show->show_tix_url && $show->isUpcoming == 1) ? '(<a href="' . esc_url($show->show_tix_url)  . '"' . $target . ' class="gigpress-tickets-link">' . 'Tickets &amp information' . '</a>)' : '';
      break;
      case 'soldout' : $showdata['ticket_link'] = '<strong class="gigpress-soldout">' . "Sold Out" . '</strong>';
      break;
      case 'cancelled' : $showdata['ticket_link'] = '<strong class="gigpress-cancelled">' . "Cancelled" . '</strong>';
      break;
    }

    // DETAILS FOR THE IMAGE
    //$showdata['img_url'] = $show->show_img_url;
    $showdata['img_url'] = "http://splashnboots.com/childrensmusic/wp-content/uploads/2015/06/11355926_848138241888687_1795764461_n.jpg";
    
    //$showdata['tour'] = wptexturize($show->tour_name);
    //$showdata['tour_id'] = $show->tour_id;
    // if($showdata['related_url']) { $showdata['permalink'] = $showdata['related_url']; }
    //   elseif($gpo['shows_page']) { $showdata['permalink'] = esc_url($gpo['shows_page']); }
    //   else { $showdata['permalink'] = get_bloginfo('home'); }

    printCardHeader($type);
    // hub_video_thumbnail
    // <div class="Card--video-thumb-thumbnail cursor-pointer" href="#" data-v_code="vsRDsUOlhS8"></div>
     //onclick="youTubeVideoPopupAdd('<?php echo $youtubeId; ? >')">

    $isMultiDate = ($showdata['show_date'] != $showdata['show_expire']);

    ?>
      <div class="Card-content-container">
        <div class="Card--Tour-header">
          <div class="DateBox <?php if($isMultiDate) echo "DateBox--multi";?>">
            <?php printDateBox($showdata['show_date'], "DateBox-dtstart"); ?>
            <?php if ($isMultiDate) { ?>
                <div class="DateBox-dtTO">to</div>
            <?php printDateBox($showdata['show_expire'], "DateBox-dtend"); ?>
            <?php } ?>
            <div class='clearfix'></div>
          </div>
          <div class="Card--Tour-venue <?php if($isMultiDate) echo "Card--Tour-venue--multi";?>">
            <div class='Card--Tour-venue-name'>
              <?php echo $showdata['venue']; ?><br/>
            </div>
            <?php if ($showdata['address'])     echo "<div class='Card--Tour-venue-address'>" . $showdata['address'] . "</div>"; ?>
            <div class='Card--Tour-venue-cityState'>
            <?php if ($showdata['city'])        echo "<span class='Card--Tour-venue-city'>" . $showdata['city'] . "</span>"; ?>
            <?php if ($showdata['state'])       echo "<span class='Card--Tour-venue-state'>" . ($showdata['city'] ? ", " : "") . $showdata['state'] . "</span>"; ?>
              </div>
            <?php //echo $showdata['country']; ?>
            <?php if ($showdata['venue_phone']) echo $showdata['venue_phone'] . "<br/>"; ?>
          </div>
        </div>
        <div>
          <?php if (isset($showdata['img_url']) && $showdata['img_url'] != "") {?>
              <div class="Card--Tour-image">
                <img class="gigpress-image-img" src="<?php echo $showdata['img_url']; ?>" style="width:100%" />
              </div>
          <?php } ?>
        </div>
        <div>
          <?php if ($showdata['calendar_details']) { ?>
            <div class="Card--Tour-details">
              <?php if ($showdata['calendar_details']) echo $showdata['calendar_details'] . "<br/>"; ?>
              <?php if ($showdata['ticket_link']) echo $showdata['ticket_link'] . "<br/>" ;?>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php 
    printCardFooter(); //$type, $title, $date);
  }

  
  // ==============================
  // PICTURES

  // Picture page content
  function printPicturesContent() {
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/instagram.php'));
    $rows = $data->rows;
    $groupingNum = 15;

    for ($i=0; $i<count($rows); $i++) { 
      //$name = $rows[$i]->name;
      //<li class="CardTile" data-filter-class='["< ? php echo $name; ? > "]'>
      $class = "CardTile CardTile--pictures"; 
      if ($i >= $groupingNum) {
        $class = $class . " CardTile--DN"; //displayNone";
      } else {
        $class = $class . " CardTile--initial";
      }
      ?>
      <li class="<?php echo $class;?>">
        <?php printCardPicture($rows[$i]); ?>
      </li>
      <?php
    }
  }

  function printCardPicture($cardData) {
    global $templateDir;
    // $type  = 'Video';
    // $title = 'New Video: “What I Like About Me” -Album: Happy Times';
    // $date  = 'Thursday, January 8th, 2015';
    
    $type          = 'Instagram'; //'Picture'; 
    //$type          = 'pic'; //
    $title         = stripslashes($cardData->post_title);
    $date          = $cardData->post_date;
    //$newDate       = date("F j, Y g:i A", strtotime($date));
    $newDate       = date("F j, Y", strtotime($date));
    $img           = $cardData->post_content;
    // "<img class =\"insta-image\" width=\"640\" height=\"640\" src=\"http://splashnboots.com/childrensmusic/wp-content/uploads/2015/04/11085091_549057275237308_1115789286_n.jpg\" />"
    $strposStart   = strpos($img, "src=\"");
    $imgAlt        = substr($img, $strposStart+5); // 5 = src="
    $strposEnd     = strpos($imgAlt, "\"");
    $imgUrl        = substr($imgAlt,0, $strposEnd);

    $tempImgUrl    = $templateDir. "/media/img/general/1x1.gif"; // 1x1 transparent gif.

    //printCardHeader($type, $title, $date);
    printCardHeader($type);
    // hub_video_thumbnail
    // <div class="Card--video-thumb-thumbnail cursor-pointer" href="#" data-v_code="vsRDsUOlhS8"></div>
    // <img class="Card--picture-thumb-img" src="http://img.youtube.com/vi/< ? php echo $youtubeId; ? >/mqdefault.jpg" class="shadow_box_small">
    // onclick="function() { console.log('clicked') }"
    // style="display: none"

    // <!-- <? php echo $img; ? > -->
    // <!-- <? php echo $imgUrl;? > -->
    // <!-- <? php echo $strposStart; ? > -->
    // <!-- <? php echo $imgAlt; ? > -->
    // <!-- <? php echo $strposEnd; ? > -->
    // <!-- <? php echo $imgUrl; ? > -->
    // echo $type;
    // echo $title;
    // echo $date;
    // echo $imgUrl;
    
/*
    ?>
      <div class="Card-content-container">
        <div class="Card--pic-thumb" >
          <img class="Card--pic-thumb-img ImgLoader ImgLoader--canCheck" src="<?php echo $tempImgUrl;?>" data-img="<?php echo $imgUrl;?>"/>
        </div>
      </div>
    <?php 
    */
    // <img class="Card-img ImgLoader" src="<?php echo $tempImgUrl;? >" data-img="<?php echo $imgUrl;? >"/>
    ?>
    <div class="Card-img ImgLoader" data-img="<?php echo $imgUrl;?>"></div>
    <?php 
    printCardFooterWithDetail($type, $title, $newDate);  
  }


  // ==============================
  // PRESS
  // http://splashnboots.com/SNBAPI/get/press.php

  // Picture page content
  function printPressContent() {
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/press.php'));
    $rows = $data->rows;

    echo "<div class='FullLength'>";

    for ($i=0; $i<count($rows); $i++) { 
      $name = $rows[$i]->name;
      printCardPress($rows[$i]);
    }

    echo "</div>"; // .FullLengthWrapper
/*
    for ($i=0; $i<count($rows); $i++) { 
      $name = $rows[$i]->name;
      ? >
      <li class="CardTile">
        < ? php printCardPress($rows[$i]); ? >
      </li>
    }
      < ? php
    */
  }

  function printCardPress($cardData) {
    // $type  = 'Video';
    // $title = 'New Video: “What I Like About Me” -Album: Happy Times';
    // $date  = 'Thursday, January 8th, 2015';
    
    $type      = 'Press'; 
    $title     = stripslashes($cardData->post_title);
    $date      = $cardData->post_date;
    $content   = $cardData->post_content;

    //printCardHeader($type);
    //printCardHeader($type, $title, $date);
    // hub_video_thumbnail
    // <div class="Card--video-thumb-thumbnail cursor-pointer" href="#" data-v_code="vsRDsUOlhS8"></div>
    // <div class="Card-content-container">
    ?>
      <div class="FullLength-card FullLength-card--<?php echo $type;?>">
        <?php 
          printCardDetailsForFullLength($type, $title, $date);
          echo $content;
        ?>
      </div>
    <?php 
    //printCardFooter($type, $title, $date);
  }

  // ==============================
  // NEWS
  // http://splashnboots.com/SNBAPI/get/press.php

  // Picture page content
  function printNewsContent() {
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/news.php'));
    $rows = $data->rows;

    echo "<div class='FullLength'>";

    for ($i=0; $i<count($rows); $i++) { 
      $name = $rows[$i]->name;
        //printCardNews($rows[$i]);
      printCardNews($rows[$i]);
    }

    echo "</div>";
  }

  function printCardNews($cardData) {
    $type      = 'News'; 
    $title     = stripslashes($cardData->post_title);
    $date      = $cardData->post_date;
    $content   = $cardData->post_content;

    ?>
      <div class="FullLength-card FullLength-card--<?php echo $type;?>">
        <?php 
          printCardDetailsForFullLength($type, $title, $date);
          echo $content;
        ?>
      </div>
    <?php 
  }

?>