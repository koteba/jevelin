<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$id = ( isset($atts['id']) ) ? $atts['id'] : '';
$style = ( isset($atts['style']) ) ? $atts['style'] : 'style1';
?>

<div class="sh-table-element sh-table-element-<?php echo esc_attr( $style ); ?> fw-table" id="table-<?php echo esc_attr( $id ); ?>">
	<table>
		<?php foreach ( $atts['table']['rows'] as $row_key => $row ) : ?>
			<?php if ( $row['name'] == 'heading-row' ) : ?>
				<thead>
					<tr class="<?php echo esc_attr($row['name']); ?>">
						<?php foreach ( $atts['table']['cols'] as $col_key => $col ) : ?>
							<th class="<?php echo esc_attr($col['name']); ?>">
								<?php echo $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
							</th>
						<?php endforeach; ?>
					</tr>
				</thead>
			<?php elseif ( $row['name'] == 'default-row' ) : ?>
				<tr class="<?php echo esc_attr($row['name']); ?>">
					<?php foreach ( $atts['table']['cols'] as $col_key => $col ) : ?>
						<td class="<?php echo esc_attr($col['name']); ?>">
							<?php echo $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
</div>
