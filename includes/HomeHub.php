<?php
  include_once("cardFunctions.php");
?>

<div class="HomeHub">
	<div id="container">

    <!--
      These are our filter options. The "data-filter" classes are used to identify which
      grid items to show.
      -->
    <br/>
    <div>
	    <ol class="GridFilters" id="filters">
	      <li data-filter="all">Reset filters</li>
	      <li data-filter="instagram">Instagram</li>
	      <li data-filter="video">Videos</li>
	      <li data-filter="news">News</li>
	      <li data-filter="tour">Tour</li>
	      <li data-filter="blog">Blog</li>
	      <li data-filter="press">Press</li>
	    </ol>
    </div>
    <br/>

    <div id="main" role="main">

      <ul class="Grid" id="tiles">
        <!--
          These are our grid items. Notice how each one has classes assigned that
          are used for filtering. The classes match the "data-filter" properties above.
          -->
		<?php $imgW = 300;?>
        <?php printVideoContent(); ?>
    <!--
          <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/1.png" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["tour]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/2.png"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/3.png"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/4.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/5.png"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/6.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/7.png"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["blog"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/8.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Video</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/9.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Art</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/10.png" width="<?php echo $imgW;?>">
          <p>Berlin Fashion</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/11.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["press"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/12.png"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["press"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/13.png"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/14.png"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/15.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Video</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/16.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["tour"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/17.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/18.png"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/19.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Fashion</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/20.png"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["tour"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/21.png"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/22.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/23.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/24.png"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/25.png"  width="<?php echo $imgW;?>">
          <p>Paris Art</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/26.png"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/27.png"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/28.png"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
-->
       <!--  <li data-filter-class='["london", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/1.png" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/2.png"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/3.png"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/4.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/5.png"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/6.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/7.png"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["tokyo", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/8.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Video</p>
        </li>
        <li data-filter-class='["tokyo", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/9.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Art</p>
        </li>
        <li data-filter-class='["berlin", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/10.png" width="<?php echo $imgW;?>">
          <p>Berlin Fashion</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/1.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/2.png"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/3.png"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/4.png"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["amsterdam"," video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/5.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/6.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/7.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/8.png"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["amsterdam", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/9.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Fashion</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/10.png"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/1.png"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/2.png"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/3.png"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/4.png"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/5.png"  width="<?php echo $imgW;?>">
          <p>Paris Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/6.png"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/7.png"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/8.png"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/9.png"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/10.png" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>




         -->
          <!-- 
        <li data-filter-class='["london", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/1.png" height="283" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/2.png" height="300" width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/3.png" height="252" width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/4.png" height="158" width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/5.png" height="300" width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/6.png" height="297" width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/7.png" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["tokyo", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/8.png" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>Tokyo Video</p>
        </li>
        <li data-filter-class='["tokyo", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/9.png" height="398" width="<?php echo $imgW;?>">
          <p>Tokyo Art</p>
        </li>
        <li data-filter-class='["berlin", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/10.png" height="267" width="<?php echo $imgW;?>">
          <p>Berlin Fashion</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/1.png" height="283" width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/2.png" height="300" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/3.png" height="252" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/4.png" height="158" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["amsterdam"," video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/5.png" height="300" width="<?php echo $imgW;?>">
          <p>Amsterdam Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/6.png" height="297" width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/7.png" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/8.png" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["amsterdam", "fashion"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/9.png" height="398" width="<?php echo $imgW;?>">
          <p>Amsterdam Fashion</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/10.png" height="267" width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/1.png" height="283" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/2.png" height="300" width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/3.png" height="252" width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/4.png" height="158" width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/5.png" height="300" width="<?php echo $imgW;?>">
          <p>Paris Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/6.png" height="297" width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/7.png" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/8.png" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/9.png" height="398" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="<?php echo $rootDir;?>/media/img/home-test/10.png" height="267" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li> -->
        <!-- End of grid blocks -->
      </ul>

    </div>
  </div>
</div>