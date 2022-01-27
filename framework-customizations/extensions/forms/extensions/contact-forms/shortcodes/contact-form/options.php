<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type'  => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'jevelin' ),
				'options' => array(
					'form' => array(
						'label' => false,
						'type'  => 'form-builder',
						'value' => array(
							'json' => json_encode( array(
								array(
									'type'      => 'form-header-title',
									'shortcode' => 'form_header_title',
									'width'     => '',
									'options'   => array(
										'title'    => '',
										'subtitle' => '',
									)
								)
							) )
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'jevelin' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Options', 'jevelin' ),
						'type'    => 'tab',
						'options' => array(
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group' => array(
										'type' => 'group',
										'options' => array(
											'subject_message'    => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'jevelin' ),
												'desc' => esc_html__( 'This text will be used as subject message for the email', 'jevelin' ),
												'value' => esc_html__( 'New message', 'jevelin' ),
											),
										)
									),
									'submit-button-group' => array(
										'type' => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'jevelin' ),
												'desc' => esc_html__( 'This text will appear in submit button', 'jevelin' ),
												'value' => esc_html__( 'Send', 'jevelin' ),
											),
										)
									),
									'success-group' => array(
										'type' => 'group',
										'options' => array(
											'success_message'    => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'jevelin' ),
												'desc' => esc_html__( 'This text will be displayed when the form will successfully send', 'jevelin' ),
												'value' => esc_html__( 'Message sent!', 'jevelin' ),
											),
										)
									),
									'failure_message'    => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'jevelin' ),
										'desc' => esc_html__( 'This text will be displayed when the form will fail to be sent', 'jevelin' ),
										'value' => esc_html__( 'Oops something went wrong.', 'jevelin' ),
									),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'jevelin' ),
										'help' => esc_html__( 'We recommend you to use an email that you verify often', 'jevelin' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'jevelin' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer', 'jevelin' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),


			'styling' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Styling', 'jevelin' ),
				'options' => array(

					'text_color' => array(
					    'type'  => 'color-picker',
					    'label' => esc_html( 'Text Color', 'jevelin' ),
					    'desc'  => esc_html( 'Select text color', 'jevelin' ),
					),

					'input_text_color' => array(
					    'type'  => 'rgba-color-picker',
					    'label' => esc_html( 'Input Text Color', 'jevelin' ),
					    'desc'  => esc_html( 'Select input text color', 'jevelin' ),
					    'value' => ''
					),

					'input_border_color' => array(
					    'type'  => 'rgba-color-picker',
					    'label' => esc_html( 'Input Border Color', 'jevelin' ),
					    'desc'  => esc_html( 'Select border color', 'jevelin' ),
					    'value' => ''
					),

					'input_background_color' => array(
					    'type'  => 'rgba-color-picker',
					    'label' => esc_html( 'Input Background Color', 'jevelin' ),
					    'desc'  => esc_html( 'Select background color', 'jevelin' ),
					    'value' => ''
					),

					'submit_background_color' => array(
					    'type'  => 'rgba-color-picker',
					    'label' => esc_html( 'Submit Background Color', 'jevelin' ),
					    'desc'  => esc_html( 'Select submit background color', 'jevelin' ),
					    'value' => ''
					),

					'submit_background_hover_color' => array(
					    'type'  => 'rgba-color-picker',
					    'label' => esc_html( 'Submit Background Hover Color', 'jevelin' ),
					    'desc'  => esc_html( 'Select submit background hover color', 'jevelin' ),
					    'value' => ''
					),

					'submit_width' => array(
						'type' => 'switch',
						'label' => esc_html__( 'Submit Button Width', 'jevelin' ),
						'desc' => esc_html__( 'Choose submit button width', 'jevelin' ),
						'value' => 'standard',
						'left-choice' => array(
							'value' => 'standard',
							'label' => esc_html__('Standard', 'jevelin'),
						),
						'right-choice' => array(
							'value' => 'full',
							'label' => esc_html__('Full', 'jevelin'),
						),
					),

					'style' => array(
						'label' => esc_html__('Style', 'jevelin'),
						'desc'  => esc_html__('Choose main style', 'jevelin'),
						'type'  => 'radio',
						'value' => '1',
						'choices' => array(
							'style1' => esc_html__('Style 1', 'jevelin'),
							'style2' => esc_html__('Style 2', 'jevelin'),
							'style3' => esc_html__('Style 3', 'jevelin'),
							'style4' => esc_html__('Style 4 (for subscribe form - 100% border radius)', 'jevelin'),
							'style6' => esc_html__('Style 5 (for subscribe form - 10px border radius)', 'jevelin'),
							'style5' => esc_html__('Style 6', 'jevelin'),
							'style7' => esc_html__('Style 7', 'jevelin'),

						)
					),

				),
			),



		),
	)
);
