<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Group_Control_Box_Shadow extends Group_Control_Base {

	protected static $fields;

	public static function get_type() {
		return 'box-shadow';
	}

	protected function init_fields() {
		$controls = [];

		$controls['box_shadow_type'] = [
			'label' => _x( 'Box Shadow', 'Box Shadow Control', 'elementor' ),
			'type' => Controls_Manager::SWITCHER,
			'label_on' => __( 'Yes', 'elementor' ),
			'label_off' => __( 'No', 'elementor' ),
			'return_value' => 'yes',
			'separator' => 'before',
			'render_type' => 'ui',
		];

		$controls['box_shadow'] = [
			'label' => _x( 'Box Shadow', 'Box Shadow Control', 'elementor' ),
			'type' => Controls_Manager::BOX_SHADOW,
			'condition' => [
				'box_shadow_type!' => '',
			],
			'render_type' => 'ui',
		];

		$controls['box_shadow_position'] = [
			'label' => _x( 'Position', 'Box Shadow Control', 'elementor' ),
			'type' => Controls_Manager::SELECT,
			'options' => [
				' ' => _x( 'Outline', 'Box Shadow Control', 'elementor' ),
				'inset' => _x( 'Inset', 'Box Shadow Control', 'elementor' ),
			],
			'condition' => [
				'box_shadow_type!' => '',
			],
			'default' => ' ',
			'selectors' => [
				'{{SELECTOR}}' => 'box-shadow: {{box_shadow.HORIZONTAL}}px {{box_shadow.VERTICAL}}px {{box_shadow.BLUR}}px {{box_shadow.SPREAD}}px {{box_shadow.COLOR}} {{VALUE}};',
			],
		];

		return $controls;
	}
}
