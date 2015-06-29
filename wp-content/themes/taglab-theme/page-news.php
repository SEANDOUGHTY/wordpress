<!--The Name of the Template-->
<?php
/*
	Template Name: News Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about TAGlab-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!--The Title-->
					<h1 class="small-12 paragraph-title"><?php the_title(); ?></h1>
					<!--The Paragraph-->
					<div class="small-12 large-9 small-centered columns paragraph-content">
						<p><?php the_content(); ?></p>
					</div>
				<?php endwhile; endif;?>
			</div>
		</div>

		<div class="row">					
			<div class='small-12 small-centered columns page-content'>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="small-11 large-10 small-centered columns"  data-equalizer='grid'>
							<!--Depending the URL posts of a certain year will be displayed-->
							<?php
							global $wp_query;
							if (!empty($wp_query->query_vars['page'])) {
								$the_year_page = $wp_query->query_vars['page'];
							}
							//There exists a year ('YYYY') in the url
							if ( $the_year_page != '' ) : 
								$args = array(
									'post_type' => 'news_feed',
									'orderby' => 'date',
									'order' => 'ASC',
									'year' => $the_year_page,
									'posts_per_page' => '-1'
								);
							//There is no year in the URL so we defult to the current year
							else : 
								$today = getdate(); /* we will only want to get current year */
								$args = array(
									'post_type' => 'news_feed',
									'orderby' => 'date',
									'order' => 'ASC',
									'year' => $today['year'],
									'posts_per_page' => '-1'
								);
							endif;
							?>
							<!--Accessing the Posts from news_feed-->
							<?php $loop = new WP_Query( $args ); ?>
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type (news_feed)-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
								<!--Card Container-->
								<div class="small-12 medium-6 large-4 columns end">
									<div class="small-11 small-centered columns card" data-equalizer-watch='grid'>
										<article class='post' data-equalizer-watch='grid'>
										<!--THUMBNAIL-->
										<!--Purpose: If there exists a thumbnail then display the thumbnail-->
										<?php if (has_post_thumbnail()) : ?>
											<?php $thumbnail = '';
								        		$thumbnail = get_the_post_thumbnail($post->ID,'featured');
    										?>
											<div class="card-thumbnail">
												<div class='card-thumbnail-img' >
													 <?php echo $thumbnail; ?>
												</div>
											</div>	
										<?php endif; ?>
										
										<!--The Date-->
										<p class='date'> <?php the_time('F Y'); ?> </p>
											
										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
										<div class='card-content'>
											<!--The Title-->
											<h2> <?php the_title();?> </h2>
											<!--The Content-->
											<p> <?php
													if (is_sticky()) {
  														global $more;    // Declare global $more (before the loop).
  														$more = 1;       // Set (inside the loop) to display all content, including text below more.
  														the_content();
													} else {
  														global $more;
  														$more = 0;
  														the_content('Read the rest of this entry »');
													}
											?></p>
											<!--CARD LINK-->
											<!--Purpose: Give the link to the full article-->
											<a href='<?php the_permalink();?>'>Read Full Article</a>
										</div>
										</article>
									</div>
								</div>
							<?php endwhile; ?>
							<!--If the page is blank-->
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class="small-11 large-10 small-centered columns">
				<ul>
					<?php $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = 'news_feed' AND post_status = 'publish' ORDER BY post_date DESC");?>
					<?php foreach($years as $year) : ?>
						<li><a href="<?php echo get_site_url() . '/news/' . $year; ?>"><?php echo $year; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>