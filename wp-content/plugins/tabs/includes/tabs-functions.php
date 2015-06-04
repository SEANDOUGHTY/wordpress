<?php



function tabs_get_all_post_ids($postid)
	{
		
		$tabs_post_ids = get_post_meta( $postid, 'tabs_post_ids', true );
		$tabs_posttype = get_post_meta( $postid, 'tabs_posttype', true );
		
		
		$return_string = '';
		$return_string .= '<ul style="margin: 0;">';
		
		
		
		$args_product = array(
		'post_type' => $tabs_posttype,
		'posts_per_page' => -1,
		);

		$product_query = new WP_Query( $args_product );
	
		if($product_query->have_posts()): while($product_query->have_posts()): $product_query->the_post();
		

	   $return_string .= '<li><label ><input class="tabs_post_ids" type="checkbox" name="tabs_post_ids['.get_the_ID().']" value ="'.get_the_ID().'" ';
		
		if ( isset( $tabs_post_ids[get_the_ID()] ) )
			{
			$return_string .= "checked";
			}

		$return_string .= '/>';

		$return_string .= get_the_title().'</label ></li>';
			
		endwhile; 
		
		else:
		$return_string .= '<span style="color:#f00;">Sorry No Post Found, Please select at least one posttype above or make sure you have at least one post in your posttype selection.';
		endif; wp_reset_query();
		
		
		$return_string .= '</ul>';
		echo $return_string;
	
	}






function tabs_get_taxonomy_category($postid)
	{

	$tabs_taxonomy = get_post_meta( $postid, 'tabs_taxonomy', true );
	if(empty($tabs_taxonomy))
		{
			$tabs_taxonomy= "";
		}
	$tabs_taxonomy_category = get_post_meta( $postid, 'tabs_taxonomy_category', true );
	
		
		if(empty($tabs_taxonomy_category))
			{
			 	$tabs_taxonomy_category =array('none'); // an empty array when no category element selected
				
			
			}

		
		
		if(!isset($_POST['taxonomy']))
			{
			$taxonomy =$tabs_taxonomy;
			}
		else
			{
			$taxonomy = $_POST['taxonomy'];
			}
		
		
		$args=array(
		  'orderby' => 'name',
		  'order' => 'ASC',
		  'taxonomy' => $taxonomy,
		  );
	
	$categories = get_categories($args);
	
	
	if(empty($categories))
		{
		echo "No Items Found!";
		}
	
	
		$return_string = '';
		$return_string .= '<ul style="margin: 0;">';
	
	foreach($categories as $category){
		
		if(array_search($category->cat_ID, $tabs_taxonomy_category))
		{
	   $return_string .= '<li class='.$category->cat_ID.'><label ><input class="tabs_taxonomy_category" checked type="checkbox" name="tabs_taxonomy_category['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';
		}
		
		else
			{
				   $return_string .= '<li class='.$category->cat_ID.'><label ><input class="tabs_taxonomy_category" type="checkbox" name="tabs_taxonomy_category['.$category->cat_ID.']" value ="'.$category->cat_ID.'" />'.$category->cat_name.'</label ></li>';			
			}
		
		

		
		}
	
		$return_string .= '</ul>';
		
		echo $return_string;
	
	if(isset($_POST['taxonomy']))
		{
			die();
		}
	
		
	}

add_action('wp_ajax_tabs_get_taxonomy_category', 'tabs_get_taxonomy_category');
add_action('wp_ajax_nopriv_tabs_get_taxonomy_category', 'tabs_get_taxonomy_category');
























































function tabs_dark_color($input_color)
	{
		if(empty($input_color))
			{
				return "";
			}
		else
			{
				$input = $input_color;
			  
				$col = Array(
					hexdec(substr($input,1,2)),
					hexdec(substr($input,3,2)),
					hexdec(substr($input,5,2))
				);
				$darker = Array(
					$col[0]/2,
					$col[1]/2,
					$col[2]/2
				);
		
				return "#".sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
			}

		
		
	}
	
	
	

function tabs_get_content($tabs_post_content, $post_id, $shortcode_id )
	{


			$post_content = get_post($post_id); 
			$post_content = $post_content->post_content;


				if($tabs_post_content=="full")
					{
						$tabs_post_content =  apply_filters('the_content', $post_content);
					}
				else if($tabs_post_content=="excerpt")
					{
						
						$tabs_post_excerpt_count = get_post_meta( $shortcode_id, 'tabs_post_excerpt_count', true );
						$tabs_post_excerpt_text = get_post_meta( $shortcode_id, 'tabs_post_excerpt_text', true );						
					

						$tabs_post_content =  wp_trim_words( $post_content , $tabs_post_excerpt_count, '<a class="read-more" href="'.get_permalink($post_id).'"> '.$tabs_post_excerpt_text.'</a>' );
	
					}				
			
			return $tabs_post_content;
	
	
	}
	
	
	
	
	
	
	
	function tabs_share_plugin()
		{
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwordpress.org%2Fplugins%2Ftabs&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>

<br />
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo tabs_share_url; ?>"></div>

<br />
<br />
<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo tabs_share_url; ?>" data-text="<?php echo tabs_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php
			
			
			
		
		
		}
	
	
	
	
	
	
	
	
	
	