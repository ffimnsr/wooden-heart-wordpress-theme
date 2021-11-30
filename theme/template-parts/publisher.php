<?php if ( 'post' === get_post_type() ) : ?>
<div class="text-gray-400 mt-3">
	<?php
	woodenheart_posted_on();
	woodenheart_posted_by();
	?>
</div>
<?php endif; ?>
