<?php 
global $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$accesspresslite_layout = $accesspresslite_settings['accesspresslite_home_page_layout'];
$accesspresslite_welcome_post_id = $accesspresslite_settings['welcome_post'];
$accesspresslite_event_category = $accesspresslite_settings['event_cat'];
$featured_post1 = $accesspresslite_settings['featured_post1'];
$featured_post2 = $accesspresslite_settings['featured_post2'];
$featured_post3 = $accesspresslite_settings['featured_post3'];
$show_fontawesome_icon = $accesspresslite_settings['show_fontawesome'];
$testimonial_category = $accesspresslite_settings['testimonial_cat'];
$accesspresslite_featured_bar = $accesspresslite_settings['featured_bar'];
$accesspresslite_welcome_post_char = (isset($accesspresslite_settings['welcome_post_char']) ? $accesspresslite_settings['welcome_post_char'] : 650 );
$accesspresslite_show_event_number = (isset($accesspresslite_settings['show_event_number']) ? $accesspresslite_settings['show_event_number'] : 3 ) ;
$big_icons = $accesspresslite_settings['big_icons'];
$disable_event = $accesspresslite_settings['disable_event'];
if($disable_event == 1){
	$welcome_class = "full-width";
}else{
	$welcome_class = "";
}
if( $accesspresslite_layout !== 'Layout2') { ?>
<div id="home-content" class="site-content">

	    	<section id="call-to-action">
    	<div class="ak-container">
    		<h4>Le mot du Maire</h4><br/><br/>
    		<p>Grâce à votre participation et à votre collaboration dans les précédents évènements de la commune, la municipalité a pris la décision de vous informer et de communiquer sur nos activités par le biais de ce site internet. Nous espérons vous compter encore plus nombreux lors de nos prochaines manifestations.</p><p> Merci pour votre investissement et votre soutien.</p>
<p>Monsieur le Maire.</p>
    	</div>
</section>

<section id="top-section" class="ak-container">
	
	<div id="featured-post-1" class="featured-post">

		<figure class="featured-image">
		<a href="#">
		<div class="featured-overlay">
			<span class="overlay-plus font-icon-plus"></span>
		</div>

		<img src="http://localhost/wordpress/wp-content/themes/accesspress-lite.2.46.6/accesspress-lite/images/actualite.jpg" alt="actualites">
		</a>
		</figure>

		<h2><a href="#">Actualités</a></h2>

		<div class="featured-content">
			<p>Retrouvez toutes les actualités de votre commune classées par ordre chronologique. Tenez-vous informer !</p>
			<a href="#" class="read-more bttn">En savoir plus</a>
		</div>
	</div>

	<div id="featured-post-2" class="featured-post">

		<figure class="featured-image">
		<a href="#">
		<div class="featured-overlay">
			<span class="overlay-plus font-icon-plus"></span>
		</div>

		<img src="http://localhost/wordpress/wp-content/themes/accesspress-lite.2.46.6/accesspress-lite/images/info.jpg" alt="information">
		</a>
		</figure>

		<h2><a href="#">Plus d'infos</a></h2>

		<div class="featured-content">
			<p>Sortie au musée, horaires de la bibliothèque, ... Retrouvez toutes les informations pratiques de vos activités culturelles favorites. </p>
			<a href="#" class="read-more bttn">En savoir plus</a>
		</div>
	</div>

	<div id="featured-post-3" class="featured-post">

		<figure class="featured-image">
		<a href="#">
		<div class="featured-overlay">
			<span class="overlay-plus font-icon-plus"></span>
		</div>

		<img src="http://localhost/wordpress/wp-content/themes/accesspress-lite.2.46.6/accesspress-lite/images/activites.jpg" alt="activites du mois">
		</a>
		</figure>

		<h2><a href="#">Activités du mois</a></h2>

		<div class="featured-content">
			<p>Envie d'évasion ou de pratiques sportives ? Les activités proposées par la ville n'attendent plus que vous.</p>
			<a href="#" class="read-more bttn">En savoir plus</a>
		</div>
	</div>
		

	</section>		
<section id="top-section" class="ak-container">
<div id="welcome-text" class="clearfix <?php echo esc_attr($welcome_class); ?>">
	<?php
		
			if(!empty($accesspresslite_welcome_post_id)){
			$posttype = get_post_type($accesspresslite_welcome_post_id);
			$postparam = ($posttype == 'page') ? 'page_id': 'p';
			$args = array(
				'post_type' => $posttype,
				$postparam => $accesspresslite_welcome_post_id
				);
			$query1 = new WP_Query( );
			$query1->query('showposts=1');
				while ($query1->have_posts()) : $query1->the_post(); ?>
					 
					<h1><a href="<?php the_permalink(); ?>"><?php echo get_the_date('j'); ?> <?php echo get_the_date('M'); ?> - <?php the_title(); ?></a></h1>
					
					<?php 
					if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); 
					?>

					<figure class="welcome-text-image">
						<a href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
						</a>
					</figure>	
					<?php } ?>
					
					<div  class="welcome-detail<?php if( !has_post_thumbnail() ){ echo " welcome-detail-full-width"; } ?>">
					
					<?php if($accesspresslite_settings['welcome_post_content'] == 0 || empty($accesspresslite_settings['welcome_post_content'])){ ?>
						<p><?php echo accesspresslite_excerpt( get_the_content() , $accesspresslite_welcome_post_char ) ?></p>
						<?php if(!empty($accesspresslite_settings['welcome_post_readmore'])){?>
							<a href="<?php the_permalink(); ?>" class="read-more bttn"><?php echo esc_attr($accesspresslite_settings['welcome_post_readmore']); ?></a>
						<?php } 
					}else{ 
						
						the_content();
					} ?>
					
					</div>
					
				<?php endwhile;	
				wp_reset_postdata(); 
				}
				
				else{ ?>
				
				

				

			<?php } ?>
</div>

<?php if($disable_event != 1): ?>
<div id="latest-events">

			<?php
			if(is_active_sidebar('event-sidebar')) {
				dynamic_sidebar('event-sidebar');
			}else{
				if(!empty($accesspresslite_event_category)){

	            $loop = new WP_Query( array(
	                'cat' => $accesspresslite_event_category,
	                'posts_per_page' => $accesspresslite_show_event_number,
	            )); ?>

	        <h1><a href="<?php echo get_category_link($accesspresslite_event_category); ?>"><?php echo get_cat_name($accesspresslite_event_category); ?></a></h1>

	        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

	        	<div class="event-list clearfix">
	        		
	        		<figure class="event-thumbnail">
						<a href="<?php the_permalink(); ?>">
						<?php 
						if( has_post_thumbnail() ){
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'event-thumbnail', false ); 
						?>
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
						<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/demo/event-fallback.jpg" alt="<?php the_title(); ?>">
						<?php } ?>
						
						<?php 
						if($accesspresslite_settings['show_eventdate'] == 1){ ?>
							<div class="event-date">
							<span class="event-date-day"><?php echo get_the_date('j'); ?></span>
							<span class="event-date-month"><?php echo get_the_date('M'); ?></span>
							</div>
						<?php
						}?>
						</a>
					</figure>	

					<div class="event-detail">
		        		<h4 class="event-title">
		        			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		        		</h4>

		        		<div class="event-excerpt">
		        			<?php echo accesspresslite_excerpt( get_the_content() , 100 ) ?>
		        		</div>
	        		</div>
	        	</div>
	        <?php endwhile; ?>
	        <?php wp_reset_postdata(); 

	        } else { ?>
	        
	        <h1>Horaires et Contact</h1>
		      
		        <div class="event-list clearfix">
						<figure class="event-thumbnail">
							<img src="<?php echo get_template_directory_uri().'/images/demo/event-fallback.jpg'; ?>" alt="horaires">
							
							
						</figure>	

						<div class="event-detail">
			        		<h4 class="event-title">Nos horaires</h4>

			        		<div class="event-excerpt">
			        			<span>Nous sommes ouverts tous les jours du lundi au vendredi de 9h à 12h et de 14h à 17h.</span>
			        		</div>
		        		</div>
		        	</div>
		        	<div class="event-list clearfix">
		        		<figure class="event-thumbnail">
							<a href="contact"><img src="<?php echo get_template_directory_uri().'/images/demo/event-3.jpg'; ?>" alt="contact">
							
							</a>
						</figure>	

						<div class="event-detail">
			        		<h4 class="event-title">Nous contacter</h4>

			        		<div class="event-excerpt">
			        			<span><i class="fa fa-phone"></i> 04 68 53 50 59</span><br>
			        			<span><a href="contact">Cliquez ici pour accéder au formulaire de contact</a>

			        		</div>
		        		</div>
		        	</div>
		        	<div class="event-list clearfix">
		        		<figure class="event-thumbnail">
							<a href="#"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11743.796850452278!2d2.7698376!3d42.6200331!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x66aacbfe3df98220!2sMairie!5e0!3m2!1sfr!2sfr!4v1461776892174" width="135" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
							
							</a>
						</figure>	

						<div class="event-detail">
			        		<h4 class="event-title">Nous trouver</h4>

			        		<div class="event-excerpt">
			        			<span>13 Carrer de l'aire<br>66300 Llupia</span>

			        		</div>
		        		</div>
		        	</div>
		        <?php 
	        	}
	        } ?>
</div>
<?php endif; ?>

</section>


<?php } 
?>

<?php if( $accesspresslite_layout !== 'Default' || empty($accesspresslite_layout) ){?>
<section id="ak-blog">
	<section class="ak-container" id="ak-blog-post">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php 
			while ( have_posts() ) : the_post(); 
			get_template_part( 'content' );
			endwhile;
			?>

			<?php accesspresslite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<?php wp_reset_query();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div id="secondary-right" class="widget-area right-sidebar sidebar">
	<h1>Nous contacter</h1>
		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		<?php endif; ?>
	</div>
	</section>

</section>

<?php }
wp_reset_query(); ?>

