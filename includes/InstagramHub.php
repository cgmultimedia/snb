<div class="HomeHub">
	<div id="container">
    <header>
      <h1>Splash'N Boots</h1>
      <p>Look at the fun things you can write here!! So much fun in a bun!!</p>
    </header>

    <!--
      These are our filter options. The "data-filter" classes are used to identify which
      grid items to show.
      -->
    <br/>
    <div style="display: none;">
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
          <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/1.jpg" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["tour]'>
          <img src="media/img/instagram-test/2.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="media/img/instagram-test/3.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="media/img/instagram-test/4.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="media/img/instagram-test/5.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["video"]'>
          <img src="media/img/instagram-test/6.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/7.jpg"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["blog"]'>
          <img src="media/img/instagram-test/8.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Video</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/9.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Art</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="media/img/instagram-test/10.jpg" width="<?php echo $imgW;?>">
          <p>Berlin Fashion</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/11.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["press"]'>
          <img src="media/img/instagram-test/12.jpg"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["press"]'>
          <img src="media/img/instagram-test/13.jpg"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="media/img/instagram-test/14.jpg"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/15.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Video</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="media/img/instagram-test/16.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["tour"]'>
          <img src="media/img/instagram-test/17.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/18.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/19.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Fashion</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="media/img/instagram-test/20.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["tour"]'>
          <img src="media/img/instagram-test/21.jpg"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="media/img/instagram-test/22.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/23.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/24.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="media/img/instagram-test/25.jpg"  width="<?php echo $imgW;?>">
          <p>Paris Art</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/26.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["instagram"]'>
          <img src="media/img/instagram-test/27.jpg"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["news"]'>
          <img src="media/img/instagram-test/28.jpg"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>

       <!--  <li data-filter-class='["london", "art"]'>
          <img src="media/img/instagram-test/1.jpg" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="media/img/instagram-test/2.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="media/img/instagram-test/3.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="media/img/instagram-test/4.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="media/img/instagram-test/5.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="media/img/instagram-test/6.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="media/img/instagram-test/7.jpg"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["tokyo", "video"]'>
          <img src="media/img/instagram-test/8.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Video</p>
        </li>
        <li data-filter-class='["tokyo", "art"]'>
          <img src="media/img/instagram-test/9.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Art</p>
        </li>
        <li data-filter-class='["berlin", "fashion"]'>
          <img src="media/img/instagram-test/10.jpg" width="<?php echo $imgW;?>">
          <p>Berlin Fashion</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="media/img/instagram-test/1.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="media/img/instagram-test/2.jpg"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/3.jpg"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/4.jpg"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["amsterdam"," video"]'>
          <img src="media/img/instagram-test/5.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="media/img/instagram-test/6.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="media/img/instagram-test/7.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="media/img/instagram-test/8.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["amsterdam", "fashion"]'>
          <img src="media/img/instagram-test/9.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Fashion</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="media/img/instagram-test/10.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="media/img/instagram-test/1.jpg"  width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="media/img/instagram-test/2.jpg"  width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="media/img/instagram-test/3.jpg"  width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="media/img/instagram-test/4.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "art"]'>
          <img src="media/img/instagram-test/5.jpg"  width="<?php echo $imgW;?>">
          <p>Paris Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="media/img/instagram-test/6.jpg"  width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="media/img/instagram-test/7.jpg"  width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/8.jpg"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/9.jpg"  width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="media/img/instagram-test/10.jpg" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>




         -->
          <!-- 
        <li data-filter-class='["london", "art"]'>
          <img src="media/img/instagram-test/1.jpg" height="283" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="media/img/instagram-test/2.jpg" height="300" width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="media/img/instagram-test/3.jpg" height="252" width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="media/img/instagram-test/4.jpg" height="158" width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="media/img/instagram-test/5.jpg" height="300" width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="media/img/instagram-test/6.jpg" height="297" width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="media/img/instagram-test/7.jpg" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["tokyo", "video"]'>
          <img src="media/img/instagram-test/8.jpg" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>Tokyo Video</p>
        </li>
        <li data-filter-class='["tokyo", "art"]'>
          <img src="media/img/instagram-test/9.jpg" height="398" width="<?php echo $imgW;?>">
          <p>Tokyo Art</p>
        </li>
        <li data-filter-class='["berlin", "fashion"]'>
          <img src="media/img/instagram-test/10.jpg" height="267" width="<?php echo $imgW;?>">
          <p>Berlin Fashion</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="media/img/instagram-test/1.jpg" height="283" width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="media/img/instagram-test/2.jpg" height="300" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/3.jpg" height="252" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/4.jpg" height="158" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["amsterdam"," video"]'>
          <img src="media/img/instagram-test/5.jpg" height="300" width="<?php echo $imgW;?>">
          <p>Amsterdam Video</p>
        </li>
        <li data-filter-class='["tokyo", "fashion"]'>
          <img src="media/img/instagram-test/6.jpg" height="297" width="<?php echo $imgW;?>">
          <p>Tokyo Fashion</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="media/img/instagram-test/7.jpg" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["berlin", "video"]'>
          <img src="media/img/instagram-test/8.jpg" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>Berlin Video</p>
        </li>
        <li data-filter-class='["amsterdam", "fashion"]'>
          <img src="media/img/instagram-test/9.jpg" height="398" width="<?php echo $imgW;?>">
          <p>Amsterdam Fashion</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="media/img/instagram-test/10.jpg" height="267" width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="media/img/instagram-test/1.jpg" height="283" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li>
        <li data-filter-class='["tokyo", "sport"]'>
          <img src="media/img/instagram-test/2.jpg" height="300" width="<?php echo $imgW;?>">
          <p>Tokyo Sport</p>
        </li>
        <li data-filter-class='["amsterdam", "art"]'>
          <img src="media/img/instagram-test/3.jpg" height="252" width="<?php echo $imgW;?>">
          <p>Amsterdam Art</p>
        </li>
        <li data-filter-class='["berlin", "sport"]'>
          <img src="media/img/instagram-test/4.jpg" height="158" width="<?php echo $imgW;?>">
          <p>Berlin Sport</p>
        </li>
        <li data-filter-class='["paris", "art"]'>
          <img src="media/img/instagram-test/5.jpg" height="300" width="<?php echo $imgW;?>">
          <p>Paris Art</p>
        </li>
        <li data-filter-class='["berlin", "art"]'>
          <img src="media/img/instagram-test/6.jpg" height="297" width="<?php echo $imgW;?>">
          <p>Berlin Art</p>
        </li>
        <li data-filter-class='["london", "art"]'>
          <img src="media/img/instagram-test/7.jpg" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>London Art</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/8.jpg" height="<?php echo $imgW;?>" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["london", "video"]'>
          <img src="media/img/instagram-test/9.jpg" height="398" width="<?php echo $imgW;?>">
          <p>London Video</p>
        </li>
        <li data-filter-class='["paris", "video"]'>
          <img src="media/img/instagram-test/10.jpg" height="267" width="<?php echo $imgW;?>">
          <p>Paris Video</p>
        </li> -->
        <!-- End of grid blocks -->
      </ul>

    </div>
  </div>
</div>