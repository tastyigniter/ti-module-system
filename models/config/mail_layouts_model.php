<?php
$config['list']['toolbar'] = [
    'buttons' => [
        'create'    => ['label' => 'lang:admin::default.button_new', 'class' => 'btn btn-primary', 'href' => 'mail_layouts/create'],
        'delete'    => [
            'label'                => 'lang:admin::default.button_delete', 'class' => 'btn btn-danger', 'data-request-form' => '#list-form',
            'data-request'         => 'onDelete', 'data-request-data' => "_method:'DELETE'",
            'data-request-confirm' => 'lang:admin::default.alert_warning_confirm',
        ],
        'templates' => [
            'label' => 'lang:system::mail_templates.text_templates',
            'class' => 'btn btn-default',
            'href'  => 'mail_templates',
        ],
    ],
];

$config['list']['columns'] = [
    'edit'         => [
        'type'         => 'button',
        'iconCssClass' => 'fa fa-pencil',
        'attributes'   => [
            'class' => 'btn btn-edit',
            'href'  => 'mail_layouts/edit/{template_id}',
        ],
    ],
    'code'         => [
        'label'      => 'lang:system::mail_templates.column_code',
        'type'       => 'text',
        'searchable' => TRUE,
    ],
    'name'         => [
        'label'      => 'lang:system::mail_templates.column_name',
        'type'       => 'text',
        'searchable' => TRUE,
    ],
    'status'       => [
        'label' => 'lang:system::mail_templates.column_status',
        'type'  => 'switch',
    ],
    'date_updated' => [
        'label'      => 'lang:system::mail_templates.column_date_updated',
        'type'       => 'datesince',
        'searchable' => TRUE,
    ],
    'date_added'   => [
        'label'      => 'lang:system::mail_templates.column_date_added',
        'type'       => 'datesince',
        'searchable' => TRUE,
    ],
    'template_id'  => [
        'label'     => 'lang:admin::default.column_id',
        'invisible' => TRUE,
    ],

];

$config['form']['toolbar'] = [
    'buttons' => [
        'save'      => [
            'label' => 'lang:admin::default.button_save', 'class' => 'btn btn-primary', 'data-request-form' => '#edit-form', 'data-request' => 'onSave',
        ],
        'saveClose' => [
            'label'             => 'lang:admin::default.button_save_close',
            'class'             => 'btn btn-default',
            'data-request'      => 'onSave',
            'data-request-form' => '#edit-form',
            'data-request-data' => 'close:1',
        ],
        'delete'    => [
            'label'                => 'lang:admin::default.button_icon_delete', 'class' => 'btn btn-danger',
            'data-request-form'    => '#edit-form', 'data-request' => 'onDelete', 'data-request-data' => "_method:'DELETE'",
            'data-request-confirm' => 'lang:admin::default.alert_warning_confirm', 'context' => 'edit',
        ],
        'back'      => ['label' => 'lang:admin::default.button_icon_back', 'class' => 'btn btn-default', 'href' => 'mail_layouts'],
        'templates' => [
            'label' => 'lang:system::mail_templates.text_templates',
            'class' => 'btn btn-default',
            'href'  => 'mail_templates',
        ],
    ],
];

$config['form']['fields'] = [
    'name'        => [
        'label' => 'lang:system::mail_templates.label_name',
        'span'  => 'left',
        'type'  => 'text',
    ],
    'code'        => [
        'label' => 'lang:system::mail_templates.label_code',
        'span'  => 'right',
        'type'  => 'text',
    ],
    'language_id' => [
        'label'        => 'lang:system::mail_templates.label_language',
        'span'         => 'left',
        'type'         => 'relation',
        'relationFrom' => 'language',
        'placeholder'  => 'lang:admin::default.text_please_select',
    ],
    'status'      => [
        'label'   => 'lang:admin::default.label_status',
        'type'    => 'switch',
        'span'  => 'right',
        'default' => TRUE,
    ],
];

$config['form']['tabs'] = [
    'fields' => [
        'layout'       => [
            'tab'  => 'lang:system::mail_templates.label_body',
            'type' => 'codeeditor',
        ],
        'layout_css'   => [
            'tab'  => 'lang:system::mail_templates.label_layout_css',
            'type' => 'codeeditor',
        ],
        'plain_layout' => [
            'tab'        => 'lang:system::mail_templates.label_plain_layout',
            'type'       => 'textarea',
            'attributes' => [
                'rows' => 10,
            ],
        ],
    ],
];

return $config;