
jQuery(document).ready(function($)
	{
		

		$(document).on('click', '.tabs-content-buttons .add-tabs', function()
			{	
				
				var row = $(".tabs-content tr:last-child").attr("index");
				
				
				if($.isNumeric(row))
					{
						var row = parseInt(row)+1;
						
					}

				else
					{
						var row = 0;
					}
				
				
				$(".tabs-content").append('<tr  index="'+row+'" valign="top"><td class="tab-new" style="vertical-align:middle;"><span class="removeTabs">X</span><br/><br/><input width="100%" placeholder="Tabs Header" type="text" name="tabs_content_title['+row+']" value="" /><br /><br /><textarea placeholder="Tabs Content" name="tabs_content_body['+row+']" ></textarea></td></tr>');
				
				
				
				setTimeout(function(){
					
					$(".tabs-content tr:last-child td").removeClass("tab-new");
					
					}, 300);
				
				
				
				
				
			})	
		
		
		
		$(document).on('click', '#tabs_metabox .removeTabs', function()
			{	
				if (confirm('Do you really want to delete this tab ?')) {
					
					$(this).parent().parent().remove();
				}
				
				
				
				
				
			})	
	
 		

	});	

