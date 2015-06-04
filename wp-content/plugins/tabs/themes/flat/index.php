<?php

function tabs_body_flat($post_id)
	{
		
		
		
		$tabs_bg_img = get_post_meta( $post_id, 'tabs_bg_img', true );
		$tabs_themes = get_post_meta( $post_id, 'tabs_themes', true );
		$tabs_total_items = get_post_meta( $post_id, 'tabs_total_items', true );		
		$tabs_column_number = get_post_meta( $post_id, 'tabs_column_number', true );
		$tabs_auto_play = get_post_meta( $post_id, 'tabs_auto_play', true );
		$tabs_stop_on_hover = get_post_meta( $post_id, 'tabs_stop_on_hover', true );
		$tabs_slider_navigation = get_post_meta( $post_id, 'tabs_slider_navigation', true );
		$tabs_slide_speed = get_post_meta( $post_id, 'tabs_slide_speed', true );
				
		$tabs_slider_pagination = get_post_meta( $post_id, 'tabs_slider_pagination', true );
		$tabs_pagination_slide_speed = get_post_meta( $post_id, 'tabs_pagination_slide_speed', true );
		$tabs_slider_pagination_count = get_post_meta( $post_id, 'tabs_slider_pagination_count', true );
		
		$tabs_slider_pagination_bg = get_post_meta( $post_id, 'tabs_slider_pagination_bg', true );		
		
		
		$tabs_slider_touch_drag = get_post_meta( $post_id, 'tabs_slider_touch_drag', true );
		$tabs_slider_mouse_drag = get_post_meta( $post_id, 'tabs_slider_mouse_drag', true );
		
		$tabs_content_source = get_post_meta( $post_id, 'tabs_content_source', true );
		$tabs_content_year = get_post_meta( $post_id, 'tabs_content_year', true );
		$tabs_content_month = get_post_meta( $post_id, 'tabs_content_month', true );
		$tabs_content_month_year = get_post_meta( $post_id, 'tabs_content_month_year', true );
		
		$tabs_post_content = get_post_meta( $post_id, 'tabs_post_content', true );			
		$tabs_posttype = get_post_meta( $post_id, 'tabs_posttype', true );			
		$tabs_taxonomy = get_post_meta( $post_id, 'tabs_taxonomy', true );		
		$tabs_taxonomy_category = get_post_meta( $post_id, 'tabs_taxonomy_category', true );	
			
		$tabs_post_ids = get_post_meta( $post_id, 'tabs_post_ids', true );

	
		
		$tabs_default_bg_color = get_post_meta( $post_id, 'tabs_default_bg_color', true );	
		$tabs_active_bg_color = get_post_meta( $post_id, 'tabs_active_bg_color', true );
		
		$tabs_items_title_color = get_post_meta( $post_id, 'tabs_items_title_color', true );			
		$tabs_items_title_font_size = get_post_meta( $post_id, 'tabs_items_title_font_size', true );		

		$tabs_items_content_color = get_post_meta( $post_id, 'tabs_items_content_color', true );
		$tabs_items_content_font_size = get_post_meta( $post_id, 'tabs_items_content_font_size', true );

		
		$tabs_items_thumb_size = get_post_meta( $post_id, 'tabs_items_thumb_size', true );
		$tabs_items_thumb_max_hieght = get_post_meta( $post_id, 'tabs_items_thumb_max_hieght', true );
		
		$tabs_ribbon_name = get_post_meta( $post_id, 'tabs_ribbon_name', true );		
		
		$tabs_content_title = get_post_meta( $post_id, 'tabs_content_title', true );	
		$tabs_content_body = get_post_meta( $post_id, 'tabs_content_body', true );
		
		
		$tabs_body = '';
		$tabs_body = '<style type="text/css"></style>';
		
		
		
		$tabs_body .= '
		<div id="responsiveTabs-'.$post_id.'"  class="tabs-container tabs-'.$tabs_themes.'" style="background-image:url('.$tabs_bg_img.')">';
		$total_row = count($tabs_content_title);
		

		$tabs_body.= '<ul  id="tabs-'.$post_id.'" class="tabs-nav">';
		
		
		
		foreach ($tabs_content_title as $index => $tabs_title)
		{
				$tabs_body.= '<li class="tabs-nav-items">';
				$tabs_body.= '<a style="color:'.$tabs_items_title_color.';font-size:'.$tabs_items_title_font_size.'" href="#tab-'.$post_id.'-'.$index.'">'.$tabs_title.'</a>';		
				$tabs_body.= '</li>';
			}					
		$tabs_body.= '</ul>';
		
		foreach ($tabs_content_body as $index => $tabs_content)
			{
				$tabs_body.= '<div style="color:'.$tabs_items_content_color.';font-size:'.$tabs_items_content_font_size.'" id="tab-'.$post_id.'-'.$index.'" class="tabs-content">';
				$tabs_body.= $tabs_content;		
				$tabs_body.= '</div>';
			
			}
		
		
		
		
		



			
		$tabs_body .= '</div>';
		
		
		$tabs_body .= '<style type="text/css">
		
		#responsiveTabs-'.$post_id.' ul.tabs-nav li.tabs-nav-items,
		#responsiveTabs-'.$post_id.'  .r-tabs-accordion-title{
			
			background: '.$tabs_default_bg_color.';
			}
		
		
		#responsiveTabs-'.$post_id.' ul.tabs-nav li.r-tabs-state-active ,
		#responsiveTabs-'.$post_id.' div.r-tabs-state-active ,
		#responsiveTabs-'.$post_id.' .r-tabs-panel.r-tabs-state-active{
			
			background: '.$tabs_active_bg_color.';
			}
		
		#responsiveTabs-'.$post_id.'  .r-tabs-accordion-title a{
			
			color:'.$tabs_items_title_color.';
			
			}
		
		
		
		
		
		</style>';		
		
		
		
		$tabs_body .= "<script type='text/javascript'>
        jQuery(document).ready(function ($) {
			$('#responsiveTabs-".$post_id."').responsiveTabs({
				collapsible: true

			});


        });
    </script>";		

		
		
		return $tabs_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}