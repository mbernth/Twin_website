<?php
/* 
 * Adds SVg icons to website
 */
 
add_filter( 'genesis_before', 'monobrighton_icomoon_icons', 1 );
function monobrighton_icomoon_icons() {
	
	echo '
		<svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
				<symbol id="icon-list2" viewBox="0 0 1024 1024">
					<title>Hamburger menu icon</title>
					<path class="path1" d="M819.2 460.8h-614.4c-28.262 0-51.2 22.938-51.2 51.2s22.938 51.2 51.2 51.2h614.4c28.314 0 51.2-22.938 51.2-51.2s-22.886-51.2-51.2-51.2zM204.8 358.4h614.4c28.314 0 51.2-22.938 51.2-51.2s-22.886-51.2-51.2-51.2h-614.4c-28.262 0-51.2 22.938-51.2 51.2s22.938 51.2 51.2 51.2zM819.2 665.6h-614.4c-28.262 0-51.2 22.886-51.2 51.2s22.938 51.2 51.2 51.2h614.4c28.314 0 51.2-22.886 51.2-51.2s-22.886-51.2-51.2-51.2z" />
				</symbol>
			</defs>
		</svg>
	';
	
}