<?php
/**	Name: Footer
 *	Purpose: To build the footer area for all pages of the website 
 *	@package taglab
 */
?>		
		<footer>
			<div class='footer-wrap'>
				<div class='row'>
					<div class='small-12 columns medium-4 small-centered columns'>
						<!--Social Network Icons-->
						<div class='small-12 small-centered columns socialicon-container'>
							<a href="https://www.facebook.com/taglab.hci" target="_blank"><img class="social-icon-footer" src="<?php echo get_template_directory_uri() . '/img/socialmedia/facebook.png' ?>"></a>
							<a href="https://twitter.com/tag_lab" target="_blank"><img class="social-icon-footer" src="<?php echo get_template_directory_uri() . '/img/socialmedia/twitter.png' ?>"></a>
						</div>
						<center style='color: white';><p>40 St. George St. Toronto ON M5S 2E4 | inquiries@taglab.ca</p></center>
					</div>
				</div>
			</div>
		</footer>
		<!--Loading the specified JS from the functions.php-->
		<?php wp_footer(); ?>	
	</body>
</html>