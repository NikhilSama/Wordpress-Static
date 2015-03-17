<?php
/**
 * Recipe Archive Meta
 *
 * @package   Recipe Hero
 * @author    Captain Theme <info@captaintheme.com>
 * @version   1.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$date = get_the_date();

?>

<div class="recipe-archive-meta">

	<div class="entry-meta">
		<?php chef_posted_on(); ?>
	</div><!-- .entry-meta -->

	<?php recipe_hero_get_template( 'single/rating.php' ); ?>

</div>