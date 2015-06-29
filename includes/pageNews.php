<?php
  include_once("cardFunctions.php");
  // NOTE: printCardNews($cardData)  is defined within cardFunctions
?>

<div class="NewsPage">
	<div id="container">
	    <div id="main" role="main">
	    	<div class='FullLength'>
				<?php //printNewsContent(); ?>
				<?php 

					$cat = "";

					$announcementId = get_cat_ID('announcement');
					if ($announcementId > 0) {
						$cat = $announcementId;
					}

					$blogId = get_cat_ID('blog');
					if ($blogId > 0) {
						if ($cat != "") {
							$cat .= ",";
						}
						$cat .= $blogId;
					}

					if ($cat != "") {
						$args = array(
							'posts_per_page'=> -1,
							'cat'			=> $cat,
							'orderby' 		=> 'date'
						);
						$my_query = new WP_Query( $args );
						if ( $my_query->have_posts() ) { 
							$i=0;
							while ( $my_query->have_posts() ) { 
								$i++;
								$my_query->the_post();
								
								//the_content();
								//print_r($post);
								$post_id =$post->ID;
								$post_categories = wp_get_post_categories( $post_id );
								$cats = array();
									
								foreach($post_categories as $c){
									$cat = get_category( $c );
									$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
								}

								// Hide if 
								if ($i>10) { ?><div class='NewsPage-initialHide'><?php } 
									printCardNews($post);
									// the_title();
									// echo "<p></p>";

									// print_r($cats);

								if ($i>10) { ?></div><?php } 
							}
						}
						wp_reset_postdata();
					}
				?>
			</div> <!--/.FullLength -->
	    </div>
	</div>
</div>