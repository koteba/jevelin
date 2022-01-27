<?php
/**
 * Footer Copyrights HTML
 */
if( jevelin_framework() == 'redux' ) :
	$style = jevelin_option( 'copyright_style' );
	$copyright_style_social = ( jevelin_option( 'copyright_style_social', 'on' ) == 'on' ) ? true : false;
else :
	$style_val = jevelin_option('copyright_style');
	$style = ( isset( $style_val['style'] ) ) ? esc_attr($style_val['style']) : 'style1';
	$style_atts = jevelin_get_picker( $style_val );
	$copyright_style_social = isset( $style_atts['social'] ) ? $style_atts['social'] : true;
endif;

$logo = '
<div class="sh-copyrights-logo">
	<img src="'.esc_attr( jevelin_option_image('copyright_logo') ).'" class="sh-copyrights-image" alt="" />
</div>';

if( jevelin_option('copyright_text_multi_lines') == 'on' ) :
	$copyright_text = wp_kses_post( jevelin_option('copyright_text') );
else :
	$copyright_text = wp_kses_post( jevelin_remove_p( jevelin_option('copyright_text') ) );
endif;

$copyrights = '';
$dev = 'https://shufflehound.com';
if( jevelin_option( 'copyright_deveveloper_all', true ) == true ) :
	$copyrights = '<span class="developer-copyrights '.(( jevelin_option('copyright_deveveloper', true) == false ) ? ' sh-hidden' : '' ).'">
		'.esc_html__( 'WordPress Theme built by', 'jevelin' ).' <a href="'.esc_attr( $dev ).'" target="blank"><strong>'.esc_html__( 'Shufflehound', 'jevelin' ).'</strong>.</a>
		</span>';
endif;

$text = '
<div class="sh-copyrights-text">
	'.$copyrights.'
	<span>'.$copyright_text.'</span>
</div>';
?>
	<div class="sh-copyrights">
		<div class="container container-padding">
			<?php if( $style == 'style3' ) : ?>

				<div class="sh-copyrights-style3">
					<div class="sh-table-full text-left">
						<div class="sh-copyrights-style3-item sh-table-cell">
							<?php if( jevelin_option_image('copyright_logo') ) : ?>
								<?php echo wp_kses( $logo, jevelin_allowed_html_basic() ); ?>
							<?php endif; ?>
						</div>
						<div class="sh-copyrights-style3-item sh-table-cell text-center">
							<?php echo do_shortcode( wp_kses_post( $text ) ); ?>
						</div>
						<div class="sh-copyrights-style3-item sh-table-cell text-right">
							<?php if( $copyright_style_social == true ) : ?>
								<div class="sh-table-cell">
									<div class="sh-copyrights-social">
										<?php echo jevelin_social_media('footer'); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>


			<?php elseif( $style == 'style2' ) : ?>

				<div class="sh-copyrights-style2">
					<div class="sh-table-full">
						<?php if( jevelin_option_image('copyright_logo') ) : ?>
							<div class="sh-table-cell">
								<?php echo wp_kses( $logo, jevelin_allowed_html_basic() ); ?>
							</div>
						<?php endif; ?>
						<div class="sh-table-cell">
							<?php echo do_shortcode( wp_kses_post( $text ) ); ?>
						</div>
					</div>
				</div>

			<?php else : ?>

				<div class="sh-copyrights-style1">
					<div class="sh-table-full">
						<?php if( jevelin_option_image('copyright_logo') ) : ?>
							<div class="sh-table-cell">
								<?php echo wp_kses( $logo, jevelin_allowed_html_basic() ); ?>
							</div>
						<?php endif; ?>
						<div class="sh-table-cell">
							<?php echo do_shortcode( wp_kses( $text, jevelin_allowed_html_basic() ) ); ?>
						</div>
					</div>
				</div>
				<?php if( $copyright_style_social == true ) : ?>
					<div class="sh-copyrights-style1" style="float: right;">
						<div class="sh-table-cell">
							<div class="sh-copyrights-social">
								<?php echo jevelin_social_media('footer'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

			<?php endif; ?>

		</div>
	</div>
