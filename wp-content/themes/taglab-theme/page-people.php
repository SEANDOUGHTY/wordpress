<!--The Name of the Template-->
<?php
/*
        Template Name: People Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>

<!--Storing page URL-->
<?php $page_url = get_the_permalink(); ?>

<!--The Content on the Publications Page-->
<div class="content">
        <section class='row'>
                <!--PAGE CONTENT-->
                <!--Purpose: Displays a small blurb about the Page-->
                <div class="row">
                        <div class="small-12 small-centered columns paragraph">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                        <!--The Title-->
                                        <h1 class="small-12 paragraph-title">Meet Our Team</h1>
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
                                                        <!--Accessing the Posts from people-->
                                                        <?php $args = array( 'post_type' => 'people',   'posts_per_page' => '-1'); ?>
                                                        <?php $loop = new WP_Query( $args ); ?>
                                                        <?php $CurrentPeopleCounter = 0; ?>
                                                        <!--THE LOOP-->
                                                        <!--Purpose: To loop through all given posts of the given Post Type (people)-->
                                                        <!--Condition: The loop will end when there are no more posts-->
                                                        <?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
                                                                <?php if(has_term("current",'type')): ?>
                                                                        <?php $CurrentPeopleCounter = $CurrentPeopleCounter + 1; ?>
                                                                        <!--Card Container-->
                                                                        <div class="small-12 medium-4 large-3 columns end">
                                                                                <div class="small-11 small-centered columns card" data-equalizer-watch='grid'>
                                                                                <article class='post' data-equalizer-watch='grid'>
                                                                                <!--THUMBNAIL-->
                                                                                <!--Purpose: If there exists a thumbnail then display the thumbnail-->
                                                                                <?php if (has_post_thumbnail()) : ?>
                                                                                        <?php $thumbnail = '';
                                                                                        $thumbnail = get_the_post_thumbnail($post->ID,'featured');
                                                                                ?>
                                                                                <?php endif; ?>

                                                                               <?php $slug = basename(get_permalink()); ?>

                                                                                <!--CARD CONTENT-->
                                                                                <!--Purpose: If there exists content display the content as an excerpt-->





                                                                                <div class='person-card'>
                                                                                <!--The Content-->
                                                                                        <p class='person-image'><a href=<?php echo $page_url, $slug?>> <?php echo $thumbnail; ?> </a></p>

                                                                                        <h2 class='person-title'> <?php the_title();?> </h2>

                                                                                        <?php $position = get_field( "position" ); ?>
                                                                                        <p class='person-position'> <?php echo $position ?> </p>

                                                                                        <?php $secondary_position = get_field( "secondary_position" ); ?>
                                                                                        <p class='person-secondary_position'>
                                                                                                <?php
                                                                                                if( $secondary_position ) {
                                                                                                        echo $secondary_position;
                                                                                                }
                                                                                                else {
                                                                                                        echo null;
                                                                                                }
                                                                                                ?>
                                                                                        <p/>


                                                                                        <?php $email = get_field( "email" ); ?>
                                                                                        <p><a class='person-email' href= <?php echo 'mailto:', $email?>><?php echo $email?></a>

                                                                                        </br>
                                                                                        <?php $website = get_field( "website" ); ?>
                                                                                        <a class='person-website' href= <?php echo $website ?>>
                                                                                                <?php
                                                                                                if( $website ) {
                                                                                                        echo 'Visit my website';
                                                                                                }
                                                                                                else {
                                                                                                        echo null;
                                                                                                }
                                                                                                ?>
                                                                                        </a>

                                                                                        </br></br>
                                                                                        <a class='person-readmore' href=<?php echo $page_url, $slug; ?>>Read more</a>
                                                                                        </p>


                                                                                </div>
                                                                                </article>
                                                                                </div>
                                                                        </div>
                                                                <?php endif; ?>
                                                        <?php endwhile; ?>
                                                        <?php endif; ?>
                                                        <?php if($CurrentPeopleCounter == 0): ?>
                                                                <center><p> The team went missing!! </p></center>
                                                        <?php endif; ?>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
<!--
COLLABORATORS
-->
		</br><center><h1>Collaborators</h1></center>
                <div class="row">
                        <div class='small-12 small-centered columns page-content'>
                                <div id="primary" class="content-area">
                                        <div id="content" class="site-content" role="main">
                                                <!--The Grid of Posts-->
                                                <div class="small-11 large-10 small-centered columns"  data-equalizer='grid'>
                                                        <!--Accessing the Posts from people-->
                                                        <?php $args = array( 'post_type' => 'people',   'posts_per_page' => '-1'); ?>
                                                        <?php $loop = new WP_Query( $args ); ?>
                                                        <?php $CollaboratorsPeopleCounter = 0; ?>
                                                        <!--THE LOOP-->
                                                        <!--Purpose: To loop through all given posts of the given Post Type (people)-->
                                                        <!--Condition: The loop will end when there are no more posts-->
                                                        <?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
                                                                <?php if(has_term("collaborators",'type')): ?>
                                                                        <?php $CollaboratorsPeopleCounter = $CollaboratorsPeopleCounter + 1; ?>
                                                                        <!--Card Container-->
                                                                        <div class="small-12 medium-4 large-3 columns end">
                                                                                <div class="small-11 small-centered columns card" data-equalizer-watch='grid'>
                                                                                <article class='post' data-equalizer-watch='grid'>
                                                                                <!--THUMBNAIL-->
                                                                                <!--Purpose: If there exists a thumbnail then display the thumbnail-->
                                                                                <?php if (has_post_thumbnail()) : ?>
                                                                                        <?php $thumbnail = '';
                                                                                        $thumbnail = get_the_post_thumbnail($post->ID,'featured');
                                                                                ?>
                                                                                <?php endif; ?>

                                                                               <?php $slug = basename(get_permalink()); ?>

                                                                                <!--CARD CONTENT-->
                                                                                <!--Purpose: If there exists content display the content as an excerpt-->





                                                                                <div class='person-card'>
                                                                                <!--The Content-->
                                                                                        <p class='person-image'><a href=<?php echo $page_url, $slug?>> <?php echo $thumbnail; ?> </a></p>

                                                                                        <h2 class='person-title'> <?php the_title();?> </h2>

                                                                                        <?php $position = get_field( "position" ); ?>
                                                                                        <p class='person-position'> <?php echo $position ?> </p>

                                                                                        <?php $secondary_position = get_field( "secondary_position" ); ?>
                                                                                        <p class='person-secondary_position'>
                                                                                                <?php
                                                                                                if( $secondary_position ) {
                                                                                                        echo $secondary_position;
                                                                                                }
                                                                                                else {
                                                                                                        echo null;
                                                                                                }
                                                                                                ?>
                                                                                        <p/>


                                                                                        <?php $email = get_field( "email" ); ?>
                                                                                        <p><a class='person-email' href= <?php echo 'mailto:', $email?>><?php echo $email?></a>

                                                                                        </br>
                                                                                        <?php $website = get_field( "website" ); ?>
                                                                                        <a class='person-website' href= <?php echo $website ?>>
                                                                                                <?php
                                                                                                if( $website ) {
                                                                                                        echo 'Visit my website';
                                                                                                }
                                                                                                else {
                                                                                                        echo null;
                                                                                                }
                                                                                                ?>
                                                                                        </a>

                                                                                        </br></br>
                                                                                        <a class='person-readmore' href=<?php echo $page_url, $slug; ?>>Read more</a>
                                                                                        </p>


                                                                                </div>
                                                                                </article>
                                                                                </div>
                                                                        </div>
                                                                <?php endif; ?>
                                                        <?php endwhile; ?>
                                                        <?php endif; ?>
                                                        <?php if($CollaboratorsPeopleCounter == 0): ?>
                                                                <center><p> The team went missing!! </p></center>
                                                        <?php endif; ?>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>



<!-- ALUMNI SECTION
	-names only
-->
		</br><center><h1>Alumni</h1><center>
		<div class="row">					
			<div class='small-12 small-centered columns page-content'>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="small-11 large-10 small-centered columns">
							<div class="small-12 columns end">
								<div class="small-11 small-centered columns alumni-card">

							<?php $args = array( 'post_type' => 'people',	'posts_per_page' => '-1', 'orderby'=> 'title', 'order' => 'ASC' ); ?>
							<?php $loop = new WP_Query( $args ); ?>
							<?php $AlumniPeopleCounter = 0; ?>
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type (people)-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
								<?php if(has_term("alumni",'type')): ?>
									<?php $AlumniPeopleCounter = $AlumniPeopleCounter + 1; ?>
									<!--Card Container-->
									<div class="small-12 medium-6 large-3 columns end">
										<div class="small-11 small-centered columns">
<!--										<article class='post'>-->

										<?php $slug = basename(get_permalink()); ?>	

										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
										




<!--										<div class='person-card'>-->
										<!--The Content-->
						
											<a class='alumni-name' href = <?php echo $slug ?>> <?php the_title();?> </a>


<!--										</div>-->


<!--										</article>-->
										</div>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php if($AlumniPeopleCounter == 0): ?>
								<center><p> The team went missing!! </p></center>
							<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<!--Loading the footer.php above each file-->
<?php get_footer(); ?><!--The Name of the Template--


