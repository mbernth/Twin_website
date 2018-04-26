<?php


//* Flexible grids
// =====================================================================================================================

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'quote_scripts' );
function quote_scripts() {
	
		wp_enqueue_script( 'mono-modernizr-custom', get_bloginfo( 'stylesheet_directory' ) . '/js/modernizr.custom.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'quotes', get_stylesheet_directory_uri() . '/js/quotes.js', array( 'jquery' ), '1.0.0' , true);
		wp_enqueue_script( 'quote_action', get_stylesheet_directory_uri() . '/js/quote_action.js', array( 'jquery' ), '1.0.0' , true);

}

add_action( 'wp_enqueue_scripts', 'accordion_script' );
function accordion_script() {
		wp_enqueue_script( 'faq-bootstrap', get_bloginfo( 'stylesheet_directory' ) . '/js/bootstrap.min.js', array( 'jquery' ), '1.0.0' );
}

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_flexible_grids', 15 );
function mono_flexible_grids() {
	
	if ( is_single() || is_page() ) {
	
	$loopCount = 0;
	
	
	
	if( have_rows('content_row') ):
	
		
	
		// loop through the rows of data
    	while ( have_rows('content_row') ) : the_row();
			$headline = 	get_sub_field('row_headline');
			$rowbutton = get_sub_field('row_button');
			$rowbuttonmanual = get_sub_field('row_button_manual_url');
			$rowtext = 	get_sub_field('row_button_clone');
			$coll = get_sub_field('columns_no');

        	if( get_row_layout() == 'row_setup' ):
			
			// This will hide a whole row
			if (get_sub_field('hide_row')){
				
				}else{
				// Add background color and ID if needed
				echo '<article class="gridcontainer  ';
						the_sub_field('background_colour');
						echo ' coll' . $coll . '';
					if (get_sub_field('row_id')){
						echo '" id="';
					 	the_sub_field('row_id');
					}
				echo '" >';
				// Add row headline
				if ($headline){
					echo '<h1 class="row_headline">' . $headline . '</h1>';
				}
				
				
				echo '<div class="wrap">';
					$selected = get_sub_field('background_colour');
					$content = get_sub_field('content');
					
					
					while ( have_rows('column') ) : the_row();
							
							// Column fields
							if (get_sub_field('content')){
							$colbtn = get_sub_field('column_content_button');
							
							echo '<section class="wysiwyg">';
								
								if( ($selected == 'non black' || $selected == 'non grey' || $selected == 'non')){
									if($headline){
									echo '<h1>' . $headline . '</h1>';
									}
								}
								
								the_sub_field('content');
								// Column botton
								if ($colbtn['button_text']){
									if ($colbtn['page_link']){
									echo '<a class="button" href="' . $colbtn['page_link']. '"><span>';
									}else{
									echo '<a class="button" href="' . $colbtn['url_link']. '" target="_blank""><span>';
									}
									echo '' . $colbtn['button_text']. '';
									echo '</span></a>';
								}
							echo '</section>';
							}
							
							// Cloned accordion
							if (get_sub_field('page_accordion')){
							$accord = get_sub_field('page_accordion');
							$groups = $accord['accordion'];
							$loopCount = 0;
							$loopCounter = 0;
								
							echo '<section>';
							
							if( $groups ) { // Start accordion
		
							foreach($groups as $group) {
								echo '<div id="accordion" class="accordion">';
			
								echo '<div class="accordion__group">';
								echo 	'<div class="accordion__heading">
											<h2><a class="accordion__toggle collapsed" href="#accordion__collapse__'.$loopCount.'0'.$loopCounter.'" data-toggle="collapse" data-parent="#accordion">
												' . $group['headline']. ' <svg class="icon-arrow-down5"><use xlink:href="#icon-arrow-down5"></use></svg> <svg class="icon-arrow-up4"><use xlink:href="#icon-arrow-up4"></use></svg>
											</a></h2>
										</div>';
								echo '</div>';
			
								echo '<div id="accordion__collapse__'.$loopCount.'0'.$loopCounter.'" class="accordion__body collapse">
										<div class="accordion__inner">
										<table>';
										if( $group['list'] ) {
											foreach($group['list'] as $list) {
					
											echo'<tr><td>' . $list['years']. '</td><td>' . $list['activity']. '</td></tr>';
					
											$loopCounter ++;
											}
										}
								echo 	'</table></div>';
								echo '</div>';
						
								echo '</div>';
								$loopCount ++;
							}
		
	
							}// End accordion
							
							echo '</section>';
							}
							
							
							// Image fields
							if (get_sub_field('image_link')){
								// Image Array
								$image =  get_sub_field('image_link');
								$btn = get_sub_field ( 'image_button' );
								
								if( get_sub_field('content') && $selected == 'non' || $selected == 'non black' || $selected == 'non grey' || $selected == 'non') {
									// Full field images
									echo '<section class="backimage" style="background-image: url('.$image['url'].');"></section>';
									
									}else{
										
									echo '<section>';
										echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'"  class="gridimage" />';
										// Image button
										if ($btn['button_text']){
											if ($btn['page_link']){
												echo '<a class="button" href="' . $btn['page_link']. '"><span>';
											}else{
												echo '<a class="button" href="' . $btn['url_link']. '" target="_blank""><span>';
											}
											echo '' . $btn['button_text']. '';
											echo '</span></a>';
										}
									echo '</section>';
										
								}
							}
							
							
							// Video fields
							if (get_sub_field('video_embeding_code')){
							echo '<section>';
								the_sub_field('video_embeding_code');
							echo '</section>';
							}
				
							// Widget fields
							if (get_sub_field('widget_content')){
							echo '<section">';
								the_sub_field('widget_content');
							echo '</section>';
							}
				
							// Quotes fields
							if (get_row_layout() == 'quotes_content'){
								$items = get_field( 'quotes', 'option' );
								if($items) {
								echo '<section>';
									echo '<div id="cbp-qtrotator" class="cbp-qtrotator">';
										foreach($items as $item) {	
											echo '<div class="cbp-qtcontent">
													<figure>
														<img src="' . $item['photo'] .'" alt="' . $item['quote_name'] .'" title="' . $item['quote_name'] .', ' . $item['titel'] .'">';
													if ($item['foto']){
														echo '<figcaption>Foto: ' . $item['foto'] .'</figcaption>';
													}
											echo '</figure>
													<div>
											      		<blockquote>' . $item['quote'] .'</blockquote>
														<footer>' . $item['quote_name'] .'<br><em>' . $item['titel'] .'</em></footer>
													</div>
												  </div>';
										}
									echo '</div>';
								echo '</section>';
								}
							}
							
							// Accordion fields
							/*
							if ( get_row_layout() == 'cv_liste' ){
							$m = 0;
							
								
							if ( have_rows( 'cv_item' ) ) {
							
							$i = 0;
							while ( have_rows( 'cv_item' ) ) : the_row();
							$items = get_sub_field ('headline');
								
								if ($items):
								
								echo '<p>';
									the_sub_field( 'headline' );
									
								
								echo '<br>';
								
								if ( have_rows( 'cv' ) ) :
									echo ''.$items.'';
									while ( have_rows( 'cv' ) ) : the_row();
										
										the_sub_field( 'start_date' );
										the_sub_field( 'end_date' );
										the_sub_field( 'story' );
										echo '<b> - '.$i.'</b>';
										echo '<br>';
									$i++;
									
									endwhile;
									
								else :
									// no rows found
								endif;
								
								echo '<p>';
								
								endif;
								echo '<b> - '.$m.'</b>';
							$m++;
							endwhile;
							
							}
							// no rows found
								
							}
							*/	
							if (get_row_layout() == 'cv_liste'){
								
								
								/*
								$groups = get_sub_field( 'cv_item' );
								$i = 0;
								
								
								foreach($groups as $group) {
								$items = $group['cv'];
								
									
									echo ''.$group['headline'].''.$i.'<br>';
									foreach($items as $item) {
										echo ''.$item['start_date'].''.$i.'<br>';
										$i++;
									}
								
								}
								$i++;
								
								
								*/
								
								while ( have_rows( 'cv_item' ) ) : the_row();
								$i = 0;
								$m = 0;
								
								echo '<section>';
								
								
									
								
									echo '<div id="accordion" class="accordion">';
									echo	'<div class="accordion__group">';
									echo 		'<div class="accordion__heading">
														<a class="accordion__toggle collapsed" href="#accordion__collapse__'.$i.'0'.$m.'" data-toggle="collapse" data-parent="#accordion">';
														the_sub_field( 'headline' );
									echo 				'</a>';
									echo 		'</div>';
									echo 	'</div>';
									
								
									if ( have_rows( 'cv' ) ){
										
									echo 	'<div id="accordion__collapse__'.$i.'0'.$m.'" class="accordion__body collapse">
												<div class="accordion__inner">';
										
										echo '<dl class="cv_list">';
										while ( have_rows( 'cv' ) ) : the_row();
											echo '<dt>';
											the_sub_field( 'start_date' );
											if (get_sub_field( 'end_date' )){
												echo '-';
												the_sub_field( 'end_date' );
											}
											echo '</dt>';
											echo '<dd>';
											the_sub_field( 'story' );
											echo '</dd>';
										$m++;
										endwhile;
										echo '</dl>';
										
									echo 		'</div>';
									echo 	'</div>';
									
										
									}
									
									echo '</div>';
									
								echo '</section>';
								echo ''.$i.'';
								echo ''.$m.'';
								
								
								$i++;
								endwhile;
							}
							
							// Accordion fields End
				
				
					endwhile;
				
				echo '</div>';
				
				// Row button field
				if ($rowtext['button_text']){
					if ($rowtext['page_link']){
						echo '<a class="button" href="' . $rowtext['page_link']. '"><span>';
						}else{
						echo '<a class="button" href="' . $rowtext['url_link']. '" target="_blank""><span>';
					}
						echo '' . $rowtext['button_text']. '';
						echo '</span></a>';
				}
				echo '</article>';
			
			}
			endif;
			$loopCount ++;
			
			
			
    	endwhile;
	
	else :

    // no layouts found

	endif;
	
	}

}