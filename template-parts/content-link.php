<article>
	<?php 
	echo '<p>Time of this Post </p>';
	echo esc_html( human_time_diff(get_the_time('U'), current_time('timestamp') ) ) . 'ago';
	echo '<p>Content of this Post </p>';
	the_content(); 
	echo '<p>Author of this Post </p>';
	the_author();
	echo '<p>Title of this Post </p>';
	the_title();
	?>
</article>