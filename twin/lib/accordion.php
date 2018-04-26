<?php



//* Flexible grids
// =====================================================================================================================


//* Add gallery slider function

add_action( 'genesis_entry_content', 'accordion_acf', 15 );
function accordion_acf() {
	$groups = get_field( 'accordion' );
	$i = 0;  //this is a variable which sets up the counter starting at 0
	$loopCount = 0;
	$loopCounter = 0;

	if( $groups ) { // Start accordion
		
		foreach($groups as $group) {
			echo '<div id="accordion" class="accordion">';
			
					echo	'<div class="accordion__group">';
					echo 		'<div class="accordion__heading">
									<h2><a class="accordion__toggle collapsed" href="#accordion__collapse__'.$loopCount.'0'.$loopCounter.'" data-toggle="collapse" data-parent="#accordion">
										' . $group['headline']. '
									</a></h2>
								</div>';
					echo 	'</div>';
			
					echo 	'<div id="accordion__collapse__'.$loopCount.'0'.$loopCounter.'" class="accordion__body collapse">
								<div class="accordion__inner">';
								if( $group['list'] ) {
									foreach($group['list'] as $list) {
					
									echo'' . $list['years']. ' ' . $list['activity']. '';
					
									$loopCounter ++;
									}
								}
					echo '		</div>';
					echo 	'</div>';
						
			echo '</div>';
			$loopCount ++;
		}
		
	
	}// End accordion
	
}