<?php
$config['form']['toolbar'] = [
    'buttons' => [
        'save' => [
            'label' => 'lang:admin::lang.button_save',
            'class' => 'btn btn-primary',
            'data-request-submit' => 'true',
            'data-request' => 'onSave',
        ],
        'saveClose' => [
            'label' => 'lang:admin::lang.button_save_close',
            'class' => 'btn btn-default',
            'data-request' => 'onSave',
            'data-request-submit' => 'true',
            'data-request-data' => 'close:1',
        ],
    ],
];

$config['form']['general'] = [
    'label' => 'lang:system::lang.settings.text_tab_general',
    'description' => 'lang:system::lang.settings.text_tab_desc_general',
    'icon' => 'fa fa-sliders',
    'priority' => 0,
    'url' => admin_url('settings/edit/general'),
    'form' => [
        'tabs' => [
            'fields' => [
                'site_name' => [
                    'label' => 'lang:system::lang.settings.label_site_name',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'text',
                    'span' => 'left',
                ],
                'site_email' => [
                    'label' => 'lang:system::lang.settings.label_site_email',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'text',
                    'span' => 'right',
                ],
                'site_url' => [
                    'label' => 'lang:system::lang.settings.label_site_url',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'text',
                    'span' => 'left',
                    'default' => root_url(),
                ],
                'country_id' => [
                    'label' => 'lang:system::lang.settings.label_country',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'select',
                    'span' => 'right',
                    'options' => ['System\Models\Countries_model', 'getDropdownOptions'],
                ],
                'site_location_mode' => [
                    'label' => 'lang:system::lang.settings.label_site_location_mode',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'radio',
                    'span' => 'left',
                    'default' => 'multiple',
                    'options' => [
                        'single' => 'lang:system::lang.settings.text_single',
                        'multiple' => 'lang:system::lang.settings.text_multiple',
                    ],
                    'comment' => 'lang:system::lang.settings.help_site_location_mode',
                    'commentAbove' => '<span class="text-danger">System</span>',
                ],
                'site_logo' => [
                    'label' => 'lang:system::lang.settings.label_site_logo',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'mediafinder',
                ],
                'maps' => [
                    'label' => 'lang:system::lang.settings.text_tab_title_maps',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'section',
                ],
                'distance_unit' => [
                    'label' => 'lang:system::lang.settings.label_distance_unit',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'radio',
                    'options' => [
                        'mi' => 'lang:system::lang.settings.text_miles',
                        'km' => 'lang:system::lang.settings.text_kilometers',
                    ],
                ],
                'default_geocoder' => [
                    'label' => 'lang:system::lang.settings.label_default_geocoder',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'radio',
                    'default' => 'chain',
                    'comment' => 'lang:system::lang.settings.help_default_geocoder',
                    'options' => [
                        'nominatim' => 'lang:system::lang.settings.text_nominatim',
                        'google' => 'lang:system::lang.settings.text_google_geocoder',
                        'chain' => 'lang:system::lang.settings.text_chain_geocoder',
                    ],
                ],
                'maps_api_key' => [
                    'label' => 'lang:system::lang.settings.label_maps_api_key',
                    'tab' => 'lang:system::lang.settings.text_tab_restaurant',
                    'type' => 'text',
                    'comment' => 'lang:system::lang.settings.help_maps_api_key',
                ],

                'language' => [
                    'label' => 'lang:system::lang.settings.text_tab_title_language',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'section',
                ],
                'default_language' => [
                    'label' => 'lang:system::lang.settings.label_site_language',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'select',
                    'default' => 'en',
                    'span' => 'left',
                    'options' => ['System\Models\Languages_model', 'getDropdownOptions'],
                    'placeholder' => 'lang:admin::lang.text_please_select',
                ],
                'detect_language' => [
                    'label' => 'lang:system::lang.settings.label_detect_language',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'switch',
                    'default' => FALSE,
                    'comment' => 'lang:system::lang.settings.help_detect_language',
                ],
                'currency' => [
                    'label' => 'lang:system::lang.settings.text_tab_title_currency',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'section',
                ],
                'default_currency_code' => [
                    'label' => 'lang:system::lang.settings.label_site_currency',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'span' => 'left',
                    'type' => 'select',
                    'default' => 'GBP',
                    'options' => ['System\Models\Currencies_model', 'getDropdownOptions'],
                    'placeholder' => 'lang:admin::lang.text_please_select',
                ],
                'currency_converter[api]' => [
                    'label' => 'lang:system::lang.settings.label_currency_converter',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'span' => 'right',
                    'type' => 'select',
                    'default' => 'openexchangerates',
                    'options' => ['System\Models\Currencies_model', 'getConverterDropdownOptions'],
                ],
                'currency_converter[oer][apiKey]' => [
                    'label' => 'lang:system::lang.settings.label_currency_converter_oer_api_key',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'text',
                    'span' => 'left',
                    'comment' => 'lang:system::lang.settings.help_currency_converter_oer_api',
                    'trigger' => [
                        'action' => 'show',
                        'field' => 'currency_converter[api]',
                        'condition' => 'value[openexchangerates]',
                    ],
                ],
                'currency_converter[fixerio][apiKey]' => [
                    'label' => 'lang:system::lang.settings.label_currency_converter_fixer_api_key',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'text',
                    'span' => 'left',
                    'comment' => 'lang:system::lang.settings.help_currency_converter_fixer_api',
                    'trigger' => [
                        'action' => 'show',
                        'field' => 'currency_converter[api]',
                        'condition' => 'value[fixerio]',
                    ],
                ],
                'currency_converter[refreshInterval]' => [
                    'label' => 'lang:system::lang.settings.label_currency_refresh_interval',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'span' => 'right',
                    'type' => 'select',
                    'default' => '24',
                    'options' => [
                        '1' => 'lang:system::lang.settings.text_1_hour',
                        '3' => 'lang:system::lang.settings.text_3_hours',
                        '6' => 'lang:system::lang.settings.text_6_hours',
                        '12' => 'lang:system::lang.settings.text_12_hours',
                        '24' => 'lang:system::lang.settings.text_24_hours',
                    ],
                ],
                'date' => [
                    'label' => 'lang:system::lang.settings.text_tab_title_date_time',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'section',
                ],
                'timezone' => [
                    'label' => 'lang:system::lang.settings.label_timezone',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'type' => 'select',
                    'options' => 'listTimezones',
                    'comment' => 'lang:system::lang.settings.help_timezone',
                    'placeholder' => 'lang:admin::lang.text_please_select',
                ],
                'date_format' => [
                    'label' => 'lang:system::lang.settings.label_date_format',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'span' => 'left',
                    'type' => 'select',
                    'default' => 'd M Y',
                ],
                'time_format' => [
                    'label' => 'lang:system::lang.settings.label_time_format',
                    'tab' => 'lang:system::lang.settings.text_tab_site',
                    'span' => 'right',
                    'type' => 'select',
                    'default' => 'h:i a',
                ],
            ],
        ],
        'rules' => [
            ['site_name', 'lang:system::lang.settings.label_site_name', 'required|min:2|max:128'],
            ['site_email', 'lang:system::lang.settings.label_site_email', 'required|email'],
            ['site_logo', 'lang:system::lang.settings.label_site_logo', 'required'],
            ['timezone', 'lang:system::lang.settings.label_timezone', 'required'],
            ['date_format', 'lang:system::lang.settings.label_date_format', 'required'],
            ['time_format', 'lang:system::lang.settings.label_time_format', 'required'],
            ['default_currency_code', 'lang:system::lang.settings.label_site_currency', 'required'],
            ['site_location_mode', 'lang:system::lang.settings.label_site_location_mode', 'required|string'],
            ['detect_language', 'lang:system::lang.settings.label_detect_language', 'required|integer'],
            ['default_language', 'lang:system::lang.settings.label_site_language', 'required'],
            ['country_id', 'lang:system::lang.settings.label_country', 'required|integer'],
            ['maps_api_key', 'lang:system::lang.settings.label_maps_api_key'],
            ['distance_unit', 'lang:system::lang.settings.label_distance_unit'],
        ],
    ],
];

$config['form']['setup'] = [
    'label' => 'lang:system::lang.settings.text_tab_setup',
    'description' => 'lang:system::lang.settings.text_tab_desc_setup',
    'icon' => 'fa fa-toggle-on',
    'priority' => 1,
    'url' => admin_url('settings/edit/setup'),
    'form' => [
        'tabs' => [
            'fields' => [
                'menus_page' => [
                    'label' => 'lang:system::lang.settings.label_menus_page',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'select',
                    'default' => 'local/menus',
                    'comment' => 'lang:system::lang.settings.help_menus_page',
                ],
                'guest_order' => [
                    'label' => 'lang:system::lang.settings.label_guest_order',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'switch',
                    'on' => 'lang:admin::lang.text_yes',
                    'off' => 'lang:admin::lang.text_no',
                    'comment' => 'lang:system::lang.settings.help_guest_order',
                ],
                'location_order' => [
                    'label' => 'lang:system::lang.settings.label_location_order',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'switch',
                    'default' => FALSE,
                    'on' => 'lang:admin::lang.text_yes',
                    'off' => 'lang:admin::lang.text_no',
                    'comment' => 'lang:system::lang.settings.help_location_order',
                ],
                'order_email' => [
                    'label' => 'lang:system::lang.settings.label_order_email',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'checkbox',
                    'options' => [
                        'customer' => 'lang:system::lang.settings.text_to_customer',
                        'admin' => 'lang:system::lang.settings.text_to_admin',
                        'location' => 'lang:system::lang.settings.text_to_location',
                    ],
                    'comment' => 'lang:system::lang.settings.help_order_email',
                ],
                'default_order_status' => [
                    'label' => 'lang:system::lang.settings.label_default_order_status',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'select',
                    'options' => ['Admin\Models\Statuses_model', 'getDropdownOptionsForOrder'],
                    'comment' => 'lang:system::lang.settings.help_default_order_status',
                ],
                'processing_order_status' => [
                    'label' => 'lang:system::lang.settings.label_processing_order_status',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'select',
                    'multiOption' => TRUE,
                    'options' => ['Admin\Models\Statuses_model', 'getDropdownOptionsForOrder'],
                    'comment' => 'lang:system::lang.settings.help_processing_order_status',
                ],
                'completed_order_status' => [
                    'label' => 'lang:system::lang.settings.label_completed_order_status',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'select',
                    'multiOption' => TRUE,
                    'options' => ['Admin\Models\Statuses_model', 'getDropdownOptionsForOrder'],
                    'comment' => 'lang:system::lang.settings.help_completed_order_status',
                ],
                'canceled_order_status' => [
                    'label' => 'lang:system::lang.settings.label_canceled_order_status',
                    'tab' => 'lang:system::lang.settings.text_tab_title_order',
                    'type' => 'select',
                    'options' => ['Admin\Models\Statuses_model', 'getDropdownOptionsForOrder'],
                    'comment' => 'lang:system::lang.settings.help_canceled_order_status',
                ],

                'reservation_email' => [
                    'label' => 'lang:system::lang.settings.label_reservation_email',
                    'tab' => 'lang:system::lang.settings.text_tab_title_reservation',
                    'type' => 'checkbox',
                    'options' => [
                        'customer' => 'lang:system::lang.settings.text_to_customer',
                        'admin' => 'lang:system::lang.settings.text_to_admin',
                        'location' => 'lang:system::lang.settings.text_to_location',
                    ],
                    'comment' => 'lang:system::lang.settings.help_reservation_email',
                ],
                'default_reservation_status' => [
                    'label' => 'lang:system::lang.settings.label_default_reservation_status',
                    'tab' => 'lang:system::lang.settings.text_tab_title_reservation',
                    'type' => 'select',
                    'options' => ['Admin\Models\Statuses_model', 'getDropdownOptionsForReservation'],
                    'comment' => 'lang:system::lang.settings.help_default_reservation_status',
                ],
                'confirmed_reservation_status' => [
                    'label' => 'lang:system::lang.settings.label_confirmed_reservation_status',
                    'tab' => 'lang:system::lang.settings.text_tab_title_reservation',
                    'type' => 'select',
                    'options' => ['Admin\Models\Statuses_model', 'getDropdownOptionsForReservation'],
                    'comment' => 'lang:system::lang.settings.help_confirmed_reservation_status',
                ],
                'canceled_reservation_status' => [
                    'label' => 'lang:system::lang.settings.label_canceled_reservation_status',
                    'tab' => 'lang:system::lang.settings.text_tab_title_reservation',
                    'type' => 'select',
                    'options' => ['Admin\Models\Statuses_model', 'getDropdownOptionsForReservation'],
                    'comment' => 'lang:system::lang.settings.help_canceled_reservation_status',
                ],

                'invoice_prefix' => [
                    'label' => 'lang:system::lang.settings.label_invoice_prefix',
                    'tab' => 'lang:system::lang.settings.text_tab_title_invoice',
                    'type' => 'text',
                    'comment' => 'lang:system::lang.settings.help_invoice_prefix',
                ],

                'allow_reviews' => [
                    'label' => 'lang:system::lang.settings.label_allow_reviews',
                    'tab' => 'lang:system::lang.settings.text_tab_title_reviews',
                    'type' => 'switch',
                    'default' => TRUE,
                    'on' => 'lang:admin::lang.text_yes',
                    'off' => 'lang:admin::lang.text_no',
                    'comment' => 'lang:system::lang.settings.help_allow_reviews',
                ],
                'approve_reviews' => [
                    'label' => 'lang:system::lang.settings.label_approve_reviews',
                    'tab' => 'lang:system::lang.settings.text_tab_title_reviews',
                    'type' => 'switch',
                    'on' => 'lang:system::lang.settings.text_auto',
                    'off' => 'lang:system::lang.settings.text_manual',
                    'comment' => 'lang:system::lang.settings.help_approve_reviews',
                    'trigger' => [
                        'action' => 'show',
                        'field' => 'allow_reviews',
                        'condition' => 'checked',
                    ],
                ],
                'ratings[ratings]' => [
                    'label' => 'lang:admin::lang.ratings.text_title',
                    'tab' => 'lang:system::lang.settings.text_tab_title_reviews',
                    'type' => 'partial',
                    'path' => 'settings/ratings',
                    'commentAbove' => 'lang:admin::lang.ratings.help_hints',
                ],

                'tax_mode' => [
                    'label' => 'lang:system::lang.settings.label_tax_mode',
                    'tab' => 'lang:system::lang.settings.text_tab_title_taxation',
                    'type' => 'switch',
                    'default' => FALSE,
                    'comment' => 'lang:system::lang.settings.help_tax_mode',
                ],
                'tax_percentage' => [
                    'label' => 'lang:system::lang.settings.label_tax_percentage',
                    'tab' => 'lang:system::lang.settings.text_tab_title_taxation',
                    'type' => 'number',
                    'default' => 0,
                    'comment' => 'lang:system::lang.settings.help_tax_percentage',
                ],
                'tax_menu_price' => [
                    'label' => 'lang:system::lang.settings.label_tax_menu_price',
                    'tab' => 'lang:system::lang.settings.text_tab_title_taxation',
                    'type' => 'select',
                    'options' => [
                        'lang:system::lang.settings.text_menu_price_include_tax',
                        'lang:system::lang.settings.text_apply_tax_on_menu_price',
                    ],
                    'comment' => 'lang:system::lang.settings.help_tax_menu_price',
                ],
                'tax_delivery_charge' => [
                    'label' => 'lang:system::lang.settings.label_tax_delivery_charge',
                    'tab' => 'lang:system::lang.settings.text_tab_title_taxation',
                    'type' => 'switch',
                    'on' => 'lang:admin::lang.text_yes',
                    'off' => 'lang:admin::lang.text_no',
                    'comment' => 'lang:system::lang.settings.help_tax_delivery_charge',
                ],
            ],
        ],
        'rules' => [
            ['order_email.*', 'lang:system::lang.settings.label_order_email', 'required|alpha'],
            ['tax_mode', 'lang:system::lang.settings.label_tax_mode', 'required|integer'],
            ['tax_title', 'lang:system::lang.settings.label_tax_title', 'max:32'],
            ['tax_percentage', 'lang:system::lang.settings.label_tax_percentage', 'required_if:tax_mode,1|numeric'],
            ['tax_menu_price', 'lang:system::lang.settings.label_tax_menu_price', 'numeric'],
            ['tax_delivery_charge', 'lang:system::lang.settings.label_tax_delivery_charge', 'numeric'],
            ['allow_reviews', 'lang:system::lang.settings.label_allow_reviews', 'required|integer'],
            ['approve_reviews', 'lang:system::lang.settings.label_approve_reviews', 'required|integer'],
            ['ratings.*', 'lang:admin::lang.label_name', 'required|min:2|max:32'], ['default_order_status', 'lang:system::lang.settings.label_default_order_status', 'required|integer'],
            ['processing_order_status', 'lang:system::lang.settings.label_processing_order_status', 'required'],
            ['completed_order_status', 'lang:system::lang.settings.label_completed_order_status', 'required'],
            ['canceled_order_status', 'lang:system::lang.settings.label_canceled_order_status', 'required|integer'],
            ['default_reservation_status', 'lang:system::lang.settings.label_default_reservation_status', 'required|integer'],
            ['confirmed_reservation_status', 'lang:system::lang.settings.label_confirmed_reservation_status', 'required|integer'],
            ['canceled_reservation_status', 'lang:system::lang.settings.label_canceled_reservation_status', 'required|integer'],
            ['menus_page', 'lang:system::lang.settings.label_menus_page', 'required|string'],
            ['guest_order', 'lang:system::lang.settings.label_guest_order', 'required|integer'],
            ['location_order', 'lang:system::lang.settings.label_location_order', 'required|integer'],
            ['invoice_prefix', 'lang:system::lang.settings.label_invoice_prefix'],
        ],
    ],
];

$config['form']['user'] = [
    'label' => 'lang:system::lang.settings.text_tab_user',
    'description' => 'lang:system::lang.settings.text_tab_desc_user',
    'icon' => 'fa fa-user',
    'priority' => 3,
    'url' => admin_url('settings/edit/user'),
    'form' => [
        'fields' => [
            'allow_registration' => [
                'label' => 'lang:system::lang.settings.label_allow_registration',
                'type' => 'switch',
                'default' => TRUE,
                'comment' => 'lang:system::lang.settings.help_allow_registration',
            ],
            'registration_email' => [
                'label' => 'lang:system::lang.settings.label_registration_email',
                'type' => 'checkbox',
                'options' => [
                    'customer' => 'lang:system::lang.settings.text_to_customer',
                    'admin' => 'lang:system::lang.settings.text_to_admin',
                ],
                'comment' => 'lang:system::lang.settings.help_registration_email',
            ],
        ],
        'rules' => [
            ['allow_registration', 'lang:system::lang.settings.label_allow_registration', 'required|integer'],
            ['registration_email.*', 'lang:system::lang.settings.label_registration_email', 'required|alpha'],
        ],
    ],
];

$config['form']['media'] = [
    'label' => 'lang:system::lang.settings.text_tab_media_manager',
    'description' => 'lang:system::lang.settings.text_tab_desc_media_manager',
    'icon' => 'fa fa-image',
    'priority' => 4,
    'url' => admin_url('settings/edit/media'),
    'form' => [
        'fields' => [
            'image_manager[max_size]' => [
                'label' => 'lang:system::lang.settings.label_media_max_size',
                'type' => 'number',
                'default' => 300,
                'comment' => 'lang:system::lang.settings.help_media_max_size',
            ],
            'image_manager[uploads]' => [
                'label' => 'lang:system::lang.settings.label_media_uploads',
                'type' => 'switch',
                'default' => TRUE,
                'span' => 'left',
                'comment' => 'lang:system::lang.settings.help_media_upload',
            ],
            'image_manager[new_folder]' => [
                'label' => 'lang:system::lang.settings.label_media_new_folder',
                'type' => 'switch',
                'default' => TRUE,
                'span' => 'right',
                'comment' => 'lang:system::lang.settings.help_media_new_folder',
            ],
            'image_manager[copy]' => [
                'label' => 'lang:system::lang.settings.label_media_copy',
                'type' => 'switch',
                'default' => TRUE,
                'span' => 'left',
                'comment' => 'lang:system::lang.settings.help_media_copy',
            ],
            'image_manager[move]' => [
                'label' => 'lang:system::lang.settings.label_media_move',
                'type' => 'switch',
                'default' => TRUE,
                'span' => 'right',
                'comment' => 'lang:system::lang.settings.help_media_move',
            ],
            'image_manager[rename]' => [
                'label' => 'lang:system::lang.settings.label_media_rename',
                'type' => 'switch',
                'default' => TRUE,
                'span' => 'left',
                'comment' => 'lang:system::lang.settings.help_media_rename',
            ],
            'image_manager[delete]' => [
                'label' => 'lang:system::lang.settings.label_media_delete',
                'type' => 'switch',
                'default' => TRUE,
                'span' => 'right',
                'comment' => 'lang:system::lang.settings.help_media_delete',
            ],
        ],
        'rules' => [
            ['image_manager.max_size', 'lang:system::lang.settings.label_media_max_size', 'required|numeric'],
            ['image_manager.uploads', 'lang:system::lang.settings.label_media_uploads', 'integer'],
            ['image_manager.new_folder', 'lang:system::lang.settings.label_media_new_folder', 'integer'],
            ['image_manager.copy', 'lang:system::lang.settings.label_media_copy', 'integer'],
            ['image_manager.move', 'lang:system::lang.settings.label_media_move', 'integer'],
            ['image_manager.rename', 'lang:system::lang.settings.label_media_rename', 'integer'],
            ['image_manager.delete', 'lang:system::lang.settings.label_media_delete', 'integer'],
        ],
    ],
];

$config['form']['mail'] = [
    'label' => 'lang:system::lang.settings.text_tab_mail',
    'description' => 'lang:system::lang.settings.text_tab_desc_mail',
    'icon' => 'fa fa-envelope',
    'priority' => 5,
    'url' => admin_url('settings/edit/mail'),
    'form' => [
        'fields' => [
            'sender_name' => [
                'label' => 'lang:system::lang.settings.label_sender_name',
                'type' => 'text',
                'span' => 'left',
            ],
            'sender_email' => [
                'label' => 'lang:system::lang.settings.label_sender_email',
                'type' => 'text',
                'span' => 'right',
            ],
            'protocol' => [
                'label' => 'lang:system::lang.settings.label_protocol',
                'type' => 'radio',
                'default' => 'sendmail',
                'options' => [
                    'sendmail' => 'lang:system::lang.settings.text_sendmail',
                    'smtp' => 'lang:system::lang.settings.text_smtp',
                ],
                'span' => 'left',
            ],
            'smtp_host' => [
                'label' => 'lang:system::lang.settings.label_smtp_host',
                'type' => 'text',
                'span' => 'right',
                'trigger' => [
                    'action' => 'show',
                    'field' => 'protocol',
                    'condition' => 'value[smtp]',
                ],
            ],
            'smtp_port' => [
                'label' => 'lang:system::lang.settings.label_smtp_port',
                'type' => 'text',
                'span' => 'left',
                'trigger' => [
                    'action' => 'show',
                    'field' => 'protocol',
                    'condition' => 'value[smtp]',
                ],
            ],
            'smtp_user' => [
                'label' => 'lang:system::lang.settings.label_smtp_user',
                'type' => 'text',
                'span' => 'right',
                'trigger' => [
                    'action' => 'show',
                    'field' => 'protocol',
                    'condition' => 'value[smtp]',
                ],
            ],
            'smtp_pass' => [
                'label' => 'lang:system::lang.settings.label_smtp_pass',
                'type' => 'text',
                'span' => 'left',
                'trigger' => [
                    'action' => 'show',
                    'field' => 'protocol',
                    'condition' => 'value[smtp]',
                ],
            ],
            'test_email' => [
                'label' => 'lang:system::lang.settings.label_test_email',
                'type' => 'partial',
                'path' => 'settings/test_email_button',
                'span' => 'right',
            ],
        ],
        'rules' => [
            ['sender_name', 'lang:system::lang.settings.label_sender_name', 'required'],
            ['sender_email', 'lang:system::lang.settings.label_sender_email', 'required'],
            ['protocol', 'lang:system::lang.settings.label_protocol', 'required'],
            ['smtp_host', 'lang:system::lang.settings.label_smtp_host', 'string'],
            ['smtp_port', 'lang:system::lang.settings.label_smtp_port', 'string'],
            ['smtp_user', 'lang:system::lang.settings.label_smtp_user', 'string'],
            ['smtp_pass', 'lang:system::lang.settings.label_smtp_pass', 'string'],
        ],
    ],
];

$config['form']['advanced'] = [
    'label' => 'lang:system::lang.settings.text_tab_server',
    'description' => 'lang:system::lang.settings.text_tab_desc_server',
    'icon' => 'fa fa-cog',
    'priority' => 6,
    'url' => admin_url('settings/edit/advanced'),
    'form' => [
        'fields' => [
            'maintenance' => [
                'label' => 'lang:system::lang.settings.text_tab_title_maintenance',
                'type' => 'section',
            ],
            'maintenance_mode' => [
                'label' => 'lang:system::lang.settings.label_maintenance_mode',
                'type' => 'switch',
                'comment' => 'lang:system::lang.settings.help_maintenance',
            ],
            'maintenance_message' => [
                'label' => 'lang:system::lang.settings.label_maintenance_message',
                'type' => 'textarea',
                'default' => 'Site is under maintenance. Please check back later.',
                'trigger' => [
                    'action' => 'show',
                    'field' => 'maintenance_mode',
                    'condition' => 'checked',
                ],
            ],
        ],
        'rules' => [
            ['maintenance_mode', 'lang:system::lang.settings.label_maintenance_mode', 'required|integer'],
            ['maintenance_message', 'lang:system::lang.settings.label_maintenance_message', 'required'],
        ],
    ],
];

return $config;