<?php 
//include header.php
get_header();

//The loop for post
while (have_posts()) {
	the_post();
	the_title();
	the_content();
}

//include footer.php
get_footer(); 
?>