<?php
// <div id="hub_post_id_12167" class="hub_post">
  function printCardHeader($type, $title, $date) {
    echo "<!-- ".$type."-".$title."-".$date."-->";
    // <div class='Card Card--video Card--isLoading'>
    ?>
      <div class='Card Card--video'>
        <div class="Card-container">
          <div class="Card-title">
            <div class="Card-title-typeBox Card-title-typeBox--<?php echo $type?>">
            </div>
            <div class="Card-title-bubble">
              <div class="Card-title-outter">
                <div class="Card-title-inner">
                  <div class="Card-title-element">
                    <?php echo $title ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="Card-title-date">
              <?php echo $date ?>
            </div>
          </div>
          <div class="Card-content">
    <?php
  }

  function printCardFooter() {
          // <div>
          //   <hr>
          // </div>
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


    printCardHeader($type, $title, $date);
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
    printCardFooter();
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
      $class = "CardTile CardTile--static CardTile--pictures"; 
      if ($i >= $groupingNum) {
        $class = $class . " CardTile--displayNone";
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
    $title         = stripslashes($cardData->post_title);
    $date          = $cardData->post_date;
    $img           = $cardData->post_content;
    // "<img class =\"insta-image\" width=\"640\" height=\"640\" src=\"http://splashnboots.com/childrensmusic/wp-content/uploads/2015/04/11085091_549057275237308_1115789286_n.jpg\" />"
    $strposStart   = strpos($img, "src=\"");
    $imgAlt        = substr($img, $strposStart+5); // 5 = src="
    $strposEnd     = strpos($imgAlt, "\"");
    $imgUrl        = substr($imgAlt,0, $strposEnd);

    $tempImgUrl    = $templateDir. "/media/img/general/1x1-white.gif";

    printCardHeader($type, $title, $date);
    // hub_video_thumbnail
    // <div class="Card--video-thumb-thumbnail cursor-pointer" href="#" data-v_code="vsRDsUOlhS8"></div>
    // <img class="Card--picture-thumb-img" src="http://img.youtube.com/vi/< ? php echo $youtubeId; ? >/mqdefault.jpg" class="shadow_box_small">
    // onclick="function() { console.log('clicked') }"
    // style="display: none"
    ?>
      <div class="Card-content-container">
        <div class="Card--pic-thumb" >
          <img class="Card--pic-thumb-img ImgLoader ImgLoader--canCheck" src="<?php echo $tempImgUrl;?>" data-img="<?php echo $imgUrl;?>"/>
          <!-- <?php echo $img;?> -->
          <!-- <?php echo $imgUrl;?> -->
          <!-- <?php echo $strposStart; ?> -->
          <!-- <?php echo $imgAlt; ?> -->
          <!-- <?php echo $strposEnd; ?> -->
          <!-- <?php echo $imgUrl; ?> -->
        </div>
      </div>
    <?php 
    printCardFooter();
  }


  // ==============================
  // PRESS
  // http://splashnboots.com/SNBAPI/get/press.php

  // Picture page content
  function printPressContent() {
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/press.php'));
    $rows = $data->rows;
?>
<?php
    for ($i=0; $i<count($rows); $i++) { 
      $name = $rows[$i]->name;
      ?>
      <li class="CardTile">
        <?php printCardPress($rows[$i]); ?>
      </li>
      <?php
    }
  }

  function printCardPress($cardData) {
    // $type  = 'Video';
    // $title = 'New Video: “What I Like About Me” -Album: Happy Times';
    // $date  = 'Thursday, January 8th, 2015';
    
    $type      = 'Press'; 
    $title     = stripslashes($cardData->post_title);
    $date      = $cardData->post_date;
    $content   = $cardData->post_content;

    printCardHeader($type, $title, $date);
    // hub_video_thumbnail
    // <div class="Card--video-thumb-thumbnail cursor-pointer" href="#" data-v_code="vsRDsUOlhS8"></div>
    ?>
      <div class="Card-content-container">
        <?php echo $content;?>
      </div>
    <?php 
    printCardFooter();
  }

  // ==============================
  // NEWS
  // http://splashnboots.com/SNBAPI/get/press.php

  // Picture page content
  function printNewsContent() {
    $data = json_decode(file_get_contents('http://splashnboots.com/SNBAPI/get/news.php'));
    $rows = $data->rows;
?>
<?php
    for ($i=0; $i<count($rows); $i++) { 
      $name = $rows[$i]->name;
      ?>
      <li class="CardTile">
        <?php printCardPress($rows[$i]); ?>
      </li>
      <?php
    }
  }

  function printCardNews($cardData) {
    global $wp_query; 
    $posts = $wp_query->posts;
    $type      = 'News'; 
    $title     = stripslashes($cardData->post_title);
    $date      = $cardData->post_date;
    $content   = do_shortcode( $cardData->post_content);

    printCardHeader($type, $title, $date);
    // hub_video_thumbnail
    // <div class="Card--video-thumb-thumbnail cursor-pointer" href="#" data-v_code="vsRDsUOlhS8"></div>
    ?>
      <div class="Card-content-container">
        <?php echo $content;?>
      </div>
    <?php 
    printCardFooter();
  }

?>