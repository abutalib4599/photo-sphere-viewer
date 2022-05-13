<?php

namespace Elementor;

class Photo_Sphere_Viewer extends Widget_Base {

    public function get_name() {
        return 'photo-sphere-viewer';
    }

    public function get_title() {
        return __('Photo Sphere Viewer', 'photo-sphere-viewer');
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return ['photo-sphere-viewer'];
    }

    protected function register_controls() {
        /**
         * !Content Section
         */
        $this->start_controls_section(
            '_content_section',
            [
                'label' => __('Content', 'photo-sphere-viewer'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'viewer_width',
            [
                'label'      => __('Width', 'photo-sphare-viewer'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range'      => [
                    'px' => [
                        'min'  => 300,
                        'max'  => 3000,
                        'step' => 5,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .photo-sphere-viewer' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'viewer_height',
            [
                'label'       => __('Height', 'photo-sphere-viewer'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px', '%', 'vh'],
                'default'     => [
                    'unit' => 'vh',
                    'size' => 70,
                ],
                'selectors'   => [
                    '{{WRAPPER}} .photo-sphere-viewer' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'render_type' => 'template',
            ]
        );

        $this->add_control(
            'caption',
            [
                'label'       => __('Caption', 'photo-sphere-viewer'),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Bryce Canyon National Park', 'photo-sphere-viewer'),
                'placeholder' => __('Type your title here', 'photo-sphere-viewer'),
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'image',
            [
                'label'       => __('Image', 'photo sphere viewer'),
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => PSV_ASSETS_URL . 'img/bryce-canyon-national-park.jpg',

                ],
                'render_type' => 'template',
            ]
        );
        $this->add_control(
            'heading_navbar',
            [
                'label'     => __('Navbar', 'photo sphere viewer'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'navbar_options',
            [
                'label'       => __('Select Options', 'photo sphere viewer'),
                'label_block' => true,
                'type'        => Controls_Manager::SELECT2,
                'multiple'    => true,
                'options'     => [
                    'autorotate' => __('AutoRotate', 'photo sphere viewer'),
                    'download'   => __('Download', 'photo sphere viewer'),
                    'fullscreen' => __('FullScreen', 'photo sphere viewer'),
                    'caption'    => __('Caption', 'photo sphere viewer'),
                    'zoom'       => __('Zoom', 'photo sphere viewer'),
                ],
                'default'     => ['autorotate', 'caption', 'fullscreen'],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'settings_controls',
            [
                'label' => __('Controls', 'photo sphere viewer'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->start_controls_tabs(
            'tab_standard'
        );
        $this->start_controls_tab(
            'standard',
            [
                'label' => __('Standard', 'photo sphere viewer'),
            ]
        );
        $this->add_control(
            'min_fov',
            [
                'label'   => __('MinFov', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 179,
                'step'    => 1,
                'default' => 30,
            ]
        );
        $this->add_control(
            'max_fov',
            [
                'label'   => __('MaxFov', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 179,
                'step'    => 1,
                'default' => 90,
            ]
        );
        $this->add_control(
            'default_zoom_level',
            [
                'label'   => __('Zoom Level', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 30,
            ]
        );
        $this->add_control(
            'default_longitude',
            [
                'label'   => __('Default LongiTude', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );
        $this->add_control(
            'default_latitude',
            [
                'label'   => __('Default Latitude', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );
        $this->add_control(
            'longitude_range',
            [
                'label'   => __('LongiTude Range', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );
        $this->add_control(
            'latitude_range',
            [
                'label'   => __('Latitude Range', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );
        $this->add_control(
            'auto_rotate_delay',
            [
                'label'   => __('Auto Rotate Delay', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 7000,
                'step'    => 5,
                'default' => 100,
            ]
        );
        $this->add_control(
            'fisheye',
            [
                'label'        => __('Fisheye', 'photo-sphere-viewer'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'photo-sphere-viewer'),
                'label_off'    => __('No', 'photo-sphere-viewer'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'mousewheel',
            [
                'label'        => __('MouseWheel', 'photo-sphere-viewer'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'photo-sphere-viewer'),
                'label_off'    => __('No', 'photo-sphere-viewer'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'mousewheel_ctrl_key',
            [
                'label'        => __('MouseWheel CTRL Key', 'photo-sphere-viewer'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'photo-sphere-viewer'),
                'label_off'    => __('No', 'photo-sphere-viewer'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'touch_move_two_fingers',
            [
                'label'        => __('Touch Move Two Fingers', 'photo-sphere-viewer'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'photo-sphere-viewer'),
                'label_off'    => __('No', 'photo-sphere-viewer'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'mouse_move',
            [
                'label'        => __('Mouse Move', 'photo-sphere-viewer'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'photo-sphere-viewer'),
                'label_off'    => __('No', 'photo-sphere-viewer'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'capture_cursor',
            [
                'label'        => __('Capture Cursor', 'photo-sphere-viewer'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'photo-sphere-viewer'),
                'label_off'    => __('No', 'photo-sphere-viewer'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'advanced',
            [
                'label' => __('Advanced', 'photo sphere viewer'),
            ]
        );
        $this->add_control(
            'move_speed',
            [
                'label'   => __('Move Speed', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );
        $this->add_control(
            'mouse_wheel_speed',
            [
                'label'   => __('Mouse Wheel Speed', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );

        $this->add_control(
            'zoom_button_increment',
            [
                'label'   => __('Zoom Button Increment', 'photo-sphere-viewer'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            /**
             * ! Style Section
             */
            '_style_section',
            [
                'label' => __('Navbar', 'photo-sphere-viewer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'navbar_background',
            [
                'label'     => __('Background', 'photo-sphere-viewer'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .psv-navbar' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_heading',
            [
                'label'     => __('Title', 'photo-sphere-viewer'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __('Color', 'photo-sphere-viewer'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .psv-caption-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __('Typography', 'photo-sphere-viewer'),
                'selector' => '{{WRAPPER}} .psv-caption-content',
            ]
        );
        $this->add_control(
            'title_alignment',
            [
                'label'     => __('Alignment', 'photo-sphere-viewer'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __('Left', 'photo-sphere-viewer'),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'photo-sphere-viewer'),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'photo-sphere-viewer'),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .psv-caption' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $image    = $settings['image'];
        extract($settings);
        $this->add_render_attribute('viewer', 'class', 'photo-sphere-viewer viewer');
        $id = wp_unique_id('psv-container-');

        $this->add_render_attribute([
            'viewer' => [
                'data-settings' => [
                    wp_json_encode(array_filter([
                        'container'           => sanitize_key($id),
                        'panorama'            => $image['url'],
                        'caption'             => $caption,
                        'navbar'              => $navbar_options,
                        'minFov'              => $min_fov, //1 to 179
                        'maxFov'              => $max_fov, //1 to 179
                        'defaultZoomLvl'      => $default_zoom_level,
                        'defaultLong'         => $default_longitude,
                        'defaultLat'          => $default_latitude,
                        'longitudeRange'      => $longitude_range,
                        'latitudeRange'       => $latitude_range,
                        'autorotateDelay'     => $auto_rotate_delay,
                        'fisheye'             => ('yes' === $fisheye) ? true : false,
                        'mousewheel'          => ('yes' === $mousewheel) ? true : false,
                        'mousewheelCtrlKey'   => ('yes' === $mousewheel_ctrl_key) ? true : false,
                        'touchmoveTwoFingers' => ('yes' === $touch_move_two_fingers) ? true : false,
                        'mousemove'           => ('yes' === $mouse_move) ? true : false,
                        'captureCursor'       => ('yes' === $capture_cursor) ? true : false,
                        // advanced
                        'moveSpeed'           => $move_speed,
                        'mousewheelSpeed'     => $mouse_wheel_speed,
                        'zoomButtonIncrement' => $zoom_button_increment,
                        'canvasBackground'    => '#333',
                    ])),
                ],
            ],
        ]);
        printf('<div id="%1$s" %2$s></div>', esc_attr($id), $this->get_render_attribute_string('viewer'));
    }
}
