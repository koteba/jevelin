<?php if (!defined('FW')) die('Forbidden');

/**
 * @var array $option
 * @var array $data
 * @var string $id
 * @var array $set
 */

$wrapper_attr = array(
	'class' => $option['attr']['class'],
	'id'    => $option['attr']['id'],
);
unset($option['attr']['class'], $option['attr']['id']);

$icons = &$set['icons'];

// build $groups array based on $icons
$groups = array();
foreach ($icons as $icon_tab) {
	$group_id = $icon_tab['group'];
	$groups[$group_id] = $set['groups'][$group_id];
}

ksort($icons);
ksort($groups);

?>
<div <?php echo fw_attr_to_html($wrapper_attr) ?>>

	<input <?php echo wp_kses_post( fw_attr_to_html($option['attr'])); ?> type="hidden" />

	<div class="js-option-type-new-icon-container">

		<?php if (count($groups) > 1): ?>
		<div class="fw-backend-option-fixed-width">
			<select class="js-option-type-new-icon-dropdown">
				<?php
					echo wp_kses( fw_html_tag('option', array('value' => 'all'), htmlspecialchars(esc_html__('All Categories', 'jevelin'))), jevelin_allowed_html_form() );
					foreach ($groups as $group_id => $group_title) {
						$selected = (isset($set['icons'][$data['value']]['group']) && $set['icons'][$data['value']]['group'] === $group_id);
						echo wp_kses( fw_html_tag('option', array('value' => esc_attr( $group_id ), 'selected' => esc_attr( $selected) ), esc_attr( htmlspecialchars($group_title))), jevelin_allowed_html_form() );
					}
				?>
			</select>
			<div class="fw-icon-search-holder">
				<input type="text" class="fw-icon-search" placeholder="<?php esc_html_e( 'Search icon', 'jevelin' ); ?>">
				<div class="fw-current-icon"><i class="fw-show-current"></i></div>
			</div>
		</div>
		<?php endif; ?>

		<div class="option-type-new-icon-list js-option-type-new-icon-list <?php echo esc_attr($set['container-class']) ?>">
			<?php
				foreach ($icons as $icon_id => $icon_tab) {
					$active = ($data['value'] == $icon_id) ? 'active' : '';
					echo wp_kses( fw_html_tag('i', array(
						'class' => "$icon_id js-option-type-new-icon-item $active",
						'data-value' => esc_attr( $icon_id ),
						'data-group' => esc_attr( $icon_tab['group'] )
					), true), jevelin_allowed_html_icon_option() );
				}
			?>
		</div>

	</div>

</div>
