<?php
	
function everythingIsCool($content){
	   $content .= '<p>Check out my super cool website at <a href="http://everythingiscool.com">http://everythingiscool.com!</a></p>';
	   return $content;
	}
add_filter( 'the_content', 'everythingIsCool');

if ( ! function_exists( 'everything_is_awesome' ) ) {
	function everything_is_awesome($content){
	   $add_me = '<p>Check out my super awesome website at <a href="http://everythingisawesome.com">http://everythingisawesome.com!</a></p>';
	   $add_me .= $content;
	   return $add_me;
	}
	add_filter( 'the_content', 'everything_is_awesome');
}

