$( function() {
				/*
				// - how to call the plugin:
				
				$( '#cbp-qtrotator' ).cbpQTRotator( [options] );
				// - options:
				{
					// default transition speed (ms)
					speed : 700,
					// default transition easing
					// easing : 'ease',
					// rotator interval (ms)
					interval : 8000
				}
				// - destroy:
				$( '#cbp-qtrotator' ).cbpQTRotator( 'destroy' );
				*/
	
				$.CBPQTRotator.defaults = {
				// default transition speed (ms)
				speed : 1000,
				// default transition easing
				easing : 'ease',
				// rotator interval (ms)
				interval : 20000
				};

				$( '#cbp-qtrotator' ).cbpQTRotator();

} );