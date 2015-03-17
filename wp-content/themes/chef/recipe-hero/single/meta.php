<?php
/**
 * Recipe Single Meta
 *
 * @package   Recipe Hero
 * @author    Captain Theme <info@captaintheme.com>
 * @version   1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="recipe-single-meta">

	<div class="entry-meta">
		<?php chef_posted_on(); ?>
	</div><!-- .entry-meta -->

	<?php recipe_hero_get_template( 'single/rating.php' ); ?>
	
</div>