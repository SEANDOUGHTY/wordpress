<?php


function tabs_posttype_register() {
 
        $labels = array(
                'name' => _x('Tabs', 'tabs'),
                'singular_name' => _x('Tabs', 'tabs'),
                'add_new' => _x('New Tabs', 'tabs'),
                'add_new_item' => __('New Tabs'),
                'edit_item' => __('Edit Tabs'),
                'new_item' => __('New Tabs'),
                'view_item' => __('View Tabs'),
                'search_items' => __('Search Tabs'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'tabs' , $args );

}

add_action('init', 'tabs_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_tabs()
	{
		$screens = array( 'tabs' );
		foreach ( $screens as $screen )
			{
				add_meta_box('tabs_metabox',__( 'Tabs Options','tabs' ),'meta_boxes_tabs_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_tabs' );


function meta_boxes_tabs_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_tabs_input', 'meta_boxes_tabs_input_nonce' );
	
	
	$tabs_bg_img = get_post_meta( $post->ID, 'tabs_bg_img', true );
	$tabs_themes = get_post_meta( $post->ID, 'tabs_themes', true );
	
	
	$tabs_default_bg_color = get_post_meta( $post->ID, 'tabs_default_bg_color', true );	
	$tabs_active_bg_color = get_post_meta( $post->ID, 'tabs_active_bg_color', true );
	
	$tabs_items_title_color = get_post_meta( $post->ID, 'tabs_items_title_color', true );	
	$tabs_items_title_font_size = get_post_meta( $post->ID, 'tabs_items_title_font_size', true );
	
	$tabs_items_content_color = get_post_meta( $post->ID, 'tabs_items_content_color', true );	
	$tabs_items_content_font_size = get_post_meta( $post->ID, 'tabs_items_content_font_size', true );		
	

	
	
	$tabs_content_title = get_post_meta( $post->ID, 'tabs_content_title', true );	
	$tabs_content_body = get_post_meta( $post->ID, 'tabs_content_body', true );
	
	



?>




    <div class="para-settings">
        <div class="option-box">
            <p class="option-title">Shortcode</p>
            <p class="option-info">Copy this shortcode and paste on page or post where you want to display tabs, Use PHP code to your themes file to display tabs.</p>
        	<textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[tabs <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[tabs id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        </div>
        
        
        
        <ul class="tab-nav"> 
            <li nav="1" class="nav1">Tabs Style</li>
            <li nav="2" class="nav2">Tabs Content</li>
            
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            
            <li style="display: block;" class="box1 tab-box active">
				<div class="option-box">
                    <p class="option-title">Themes</p>
                    <p class="option-info"></p>
                    <select name="tabs_themes"  >
                    <option class="tabs_themes_flat" value="flat" <?php if($tabs_themes=="flat")echo "selected"; ?>>Flat</option>
                  
                    </select>
                </div>
                
             
				<div class="option-box">
                    <p class="option-title">Background Image</p>
                    <p class="option-info"></p>

					<script>
                    jQuery(document).ready(function(jQuery)
                        {
                                jQuery(".tabs_bg_img_list li").click(function()
                                    { 	
                                        jQuery('.tabs_bg_img_list li.bg-selected').removeClass('bg-selected');
                                        jQuery(this).addClass('bg-selected');
                                        
                                        var tabs_bg_img = jQuery(this).attr('data-url');
                    
                                        jQuery('#tabs_bg_img').val(tabs_bg_img);
                                        
                                    })	
                    
                                        
                        })
                    
                    </script>
                    
                    
                    

					<?php
                    
                    
                    
                        $dir_path = tabs_plugin_dir."css/bg/";
                        $filenames=glob($dir_path."*.png*");
                    
                    
                        $tabs_bg_img = get_post_meta( $post->ID, 'tabs_bg_img', true );
                        
                        if(empty($tabs_bg_img))
                            {
                            $tabs_bg_img = "";
                            }
                    
                    
                        $count=count($filenames);
                        
                    
                        $i=0;
                        echo "<ul class='tabs_bg_img_list' >";
                    
                        while($i<$count)
                            {
                                $filelink= str_replace($dir_path,"",$filenames[$i]);
                                
                                $filelink= tabs_plugin_url."css/bg/".$filelink;
                                
                                
                                if($tabs_bg_img==$filelink)
                                    {
                                        echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                                    }
                                else
                                    {
                                        echo '<li   data-url="'.$filelink.'">';
                                    }
                                
                                
                                echo "<img  width='70px' height='50px' src='".$filelink."' />";
                                echo "</li>";
                                $i++;
                            }
                            
                        echo "</ul>";
                        
                        echo "<input style='width:100%;' value='".$tabs_bg_img."'    placeholder='Please select image or left blank' id='tabs_bg_img' name='tabs_bg_img'  type='text' />";
                    
                    
                    
                    ?>  

                    
                    
                </div>
                
                
				<div class="option-box">
                    <p class="option-title">Default Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="tabs_default_bg_color" id="tabs_default_bg_color" value="<?php if(!empty($tabs_default_bg_color)) echo $tabs_default_bg_color; else echo "#01ce6a"; ?>" />
                </div>
                
				<div class="option-box">
                    <p class="option-title">Active Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="tabs_active_bg_color" id="tabs_active_bg_color" value="<?php if(!empty($tabs_active_bg_color)) echo $tabs_active_bg_color; else echo "#02e576"; ?>" />
                </div>                
                
                
				<div class="option-box">
                    <p class="option-title">Tabs Header Font Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="tabs_items_title_color" id="tabs_items_title_color" value="<?php if(!empty($tabs_items_title_color)) echo $tabs_items_title_color; else echo "#28c8a8"; ?>" />
                </div>                  
                
                
				<div class="option-box">
                    <p class="option-title">Tabs Header Font Size</p>
                    <p class="option-info"></p>
                    <input type="text" name="tabs_items_title_font_size" placeholder="ex:14px number with px" id="tabs_items_title_font_size" value="<?php if(!empty($tabs_items_title_font_size)) echo $tabs_items_title_font_size; else echo "14px"; ?>" />
                </div>                    
                
                
				<div class="option-box">
                    <p class="option-title">Tabs Content Font Color</p>
                    <p class="option-info"></p>
					<input type="text" name="tabs_items_content_color" id="tabs_items_content_color" value="<?php if(!empty($tabs_items_content_color)) echo $tabs_items_content_color; else echo "#fff"; ?>" />
                </div>                  
                
                
                
				<div class="option-box">
                    <p class="option-title">Tabs Content Font Size</p>
                    <p class="option-info"></p>
                    <input type="text" name="tabs_items_content_font_size" id="tabs_items_content_font_size" value="<?php if(!empty($tabs_items_content_font_size)) echo $tabs_items_content_font_size; else echo "13px"; ?>" />
                </div>                  

                
            </li> 
            
            <li style="display: none;" class="box2 tab-box">
            
				<div class="option-box">
                    <p class="option-title">Tabs Content</p>
                    <p class="option-info"></p>
                    <div class="tabs-content-buttons" >
                        <div class="button add-tabs">Add</div>
                        <br />
                    </div>
                    
                    
                    
                    <table class="tabs-content" width="100%">
                        
                        <?php
                        $total_row = count($tabs_content_title);
                        
                        if(empty($tabs_content_title))
                            {
                                $tabs_content_title = array(0);
                            }
                        
                        foreach ($tabs_content_title as $index => $tabs_title)
                            {
        
                            
                            ?>
                            <tr index='<?php echo $index; ?>' valign="top">
        
                                <td style="vertical-align:middle;">
                                <span class="removeTabs">X</span>
                                <br/><br/>
                                <input width="100%" placeholder="Tabs Header" type="text" name="tabs_content_title[<?php echo $index; ?>]" value="<?php if(!empty($tabs_title)) echo $tabs_title; ?>" />
                                <br /><br />
                                <textarea placeholder="Tabs Content" name="tabs_content_body[<?php echo $index; ?>]" ><?php if(!empty($tabs_content_body[$index])) echo $tabs_content_body[$index]; ?></textarea>
                                </td>           
                            </tr>
                            <?php
                            
                            
                            }
                        
                        ?>
                        
                        
                        
                        
                        
                        
                        
        
        
                             
                         </table>
                    
                    
                    
                    
                    
                    
                </div>  
            
            </li>
            
                
            
        </ul>
        

        
    </div>



<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_tabs_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_tabs_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_tabs_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_tabs_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$tabs_bg_img = sanitize_text_field( $_POST['tabs_bg_img'] );	
	$tabs_themes = sanitize_text_field( $_POST['tabs_themes'] );


	$tabs_default_bg_color = sanitize_text_field( $_POST['tabs_default_bg_color'] );	
	$tabs_active_bg_color = sanitize_text_field( $_POST['tabs_active_bg_color'] );


	$tabs_items_title_color = sanitize_text_field( $_POST['tabs_items_title_color'] );	
	$tabs_items_title_font_size = sanitize_text_field( $_POST['tabs_items_title_font_size'] );	

	$tabs_items_content_color = sanitize_text_field( $_POST['tabs_items_content_color'] );	
	$tabs_items_content_font_size = sanitize_text_field( $_POST['tabs_items_content_font_size'] );	


	
	
	$tabs_content_title = stripslashes_deep( $_POST['tabs_content_title'] );	
	$tabs_content_body = stripslashes_deep( $_POST['tabs_content_body'] );		
	

	
			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'tabs_bg_img', $tabs_bg_img );	
	update_post_meta( $post_id, 'tabs_themes', $tabs_themes );


	update_post_meta( $post_id, 'tabs_default_bg_color', $tabs_default_bg_color );
	update_post_meta( $post_id, 'tabs_active_bg_color', $tabs_active_bg_color );


	update_post_meta( $post_id, 'tabs_items_title_color', $tabs_items_title_color );
	update_post_meta( $post_id, 'tabs_items_title_font_size', $tabs_items_title_font_size );

	update_post_meta( $post_id, 'tabs_items_content_color', $tabs_items_content_color );
	update_post_meta( $post_id, 'tabs_items_content_font_size', $tabs_items_content_font_size );

	

	
	update_post_meta( $post_id, 'tabs_content_title', $tabs_content_title );
	update_post_meta( $post_id, 'tabs_content_body', $tabs_content_body );	
	






}
add_action( 'save_post', 'meta_boxes_tabs_save' );


























?>