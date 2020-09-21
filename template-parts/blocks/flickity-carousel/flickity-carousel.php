<?php

/**
 * Flickity Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flickity-carousel-' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'flickity-carousel';

if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$images = get_field( 'carousel_images' );

$size = 'slider_image'; // (thumbnail, medium, large, full or custom size)

?>
<div id="<?php echo esc_attr( $id ); ?>" class='<?php echo esc_attr( $className ); ?>'>
<?php if ( $images ) {
	echo '<div class="gallery-carousel" data-cellalign="' . get_field( 'cellalign' ) . '">';
	foreach ( $images as $image ) {
		echo wp_get_attachment_image( $image['ID'], $size );
	}
	echo '</div>';
} else {
	echo 'No images found. Add/select some.';
} ?>
</div>
