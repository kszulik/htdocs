<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class BookedCalendar extends Widget_Base
{
    protected $_has_template_content = false;

    public function get_name()
    {
        return 'booked-calendar';
    }

    public function get_title()
    {
        return __('Booked Calendar', 'angel');
    }

    public function get_icon()
    {
        return 'angel-element-icon eicon-archive-posts';
    }

    public function get_categories()
    {
        return [ 'angel' ];
    }
    
    public function get_keywords()
    {
        return [ 'booked', 'calendar', 'appointment', 'schedule' ];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_design_header',
            [
                'label'     => __('Header', 'angel'),
                'tab'       => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'header_background',
            [
                'label'     => __('Header Background', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar thead th' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} table.booked-calendar tr.days'  => 'background-color: transparent !important',
                    '{{WRAPPER}} table.booked-calendar thead'    => 'background-color: transparent !important',
                ],
            ]
        );



        $this->add_control(
            'border_color',
            [
                'label' => __('Border Color', 'angel'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar thead th'                    => 'border-color: {{VALUE}} !important;',
                    '{{WRAPPER}} table.booked-calendar tr.days th'                  => 'border-color: {{VALUE}} !important;',
                    '{{WRAPPER}} table.booked-calendar td:first-child'              => 'border-left-color: {{VALUE}} !important;',
                    '{{WRAPPER}} table.booked-calendar td'                          => 'border-color: {{VALUE}} !important;',
                    '{{WRAPPER}} table.booked-calendar'                             => 'border-bottom-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .booked-calendar-wrap .booked-appt-list .timeslot' => 'border-color: {{VALUE}} ;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_design_date',
            [
                'label'     => __('Date', 'angel'),
                'tab'       => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'date_background',
            [
                'label'     => __('Date Background', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td .date' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label'     => __('Date Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'date_hover_background',
            [
                'label'     => __('Date Hover Background', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td:hover .date span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'date_hover_color',
            [
                'label'     => __('Date Hover Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td:hover .date span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'current_date_color',
            [
                'label'     => __('Current Date Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td.today .date span' => 'color: {{VALUE}} !important;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'current_date_border_color',
            [
                'label'     => __('Current Date Border Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td.today .date span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'current_date_hover_background',
            [
                'label'     => __('Current Date Hover Background', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td.today:hover .date span' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'current_date_hover_color',
            [
                'label'     => __('Current Date Hover Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar td.today:hover .date span' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_design_apointments',
            [
                'label'     => __('Appointments', 'angel'),
                'tab'       => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'background',
            [
                'label'     => __('Background', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar .booked-appt-list'                 => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .booked-calendar-wrap .booked-appt-list .timeslot:hover' => 'background-color: rgba(255, 255, 255, 0.3);',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => __('Text Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booked-calendar-wrap .booked-appt-list h2'                                     => 'color: {{VALUE}};',
                    '{{WRAPPER}} .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-time'               => 'color: {{VALUE}};',
                    '{{WRAPPER}} .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-time i.booked-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'active_date_background_color',
            [
                'label'     => __('Active Date Background Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.booked-calendar tr.week td.active .date'                      => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} table.booked-calendar tr.week td.active:hover .date'                => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} table.booked-calendar tr.entryBlock'                                => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .booked-calendar-wrap .booked-appt-list .timeslot .spots-available' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'section_style_appointment_button',
            [
                'label'     => __('Appointment Button', 'angel'),
                'tab'       => Controls_Manager::TAB_STYLE
            ]
        );

        $this->start_controls_tabs('tabs_appointment_button_style');

        $this->start_controls_tab(
            'tab_appointment_button_normal',
            [
                'label' => __('Normal', 'angel'),
            ]
        );

        $this->add_control(
            'appointment_button_text_color',
            [
                'label'     => __('Text Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booked-calendar .booked-appt-list .timeslot .timeslot-people button' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'appointment_button_background',
            [
                'label'     => __('Background Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booked-calendar .booked-appt-list .timeslot .timeslot-people button' => 'background: {{VALUE}} !important; border-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'tab_appointment_button_hover',
            [
                'label' => __('Hover', 'angel'),
            ]
        );

        $this->add_control(
            'appointment_button_text_color_hover',
            [
                'label'     => __('Text Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'appointment_button_background_hover',
            [
                'label'     => __('Background Color', 'angel'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover' => 'background: {{VALUE}} !important; border-color: {{VALUE}} !important',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    public function render()
    {
        echo do_shortcode('[booked-calendar]');
    }
}
