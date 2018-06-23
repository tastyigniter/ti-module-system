<?php
$config['list']['filter'] = [
    'search' => [
        'prompt' => 'lang:system::permissions.text_filter_search',
        'mode'   => 'all',
    ],
    'scopes' => [
        'status' => [
            'label'      => 'lang:system::permissions.text_filter_status',
            'type'       => 'switch',
            'conditions' => 'status = :filtered',
        ],
    ],
];

$config['list']['toolbar'] = [
    'buttons' => [
        'create' => ['label' => 'lang:admin::default.button_new', 'class' => 'btn btn-primary', 'href' => 'permissions/create'],
        'delete' => ['label' => 'lang:admin::default.button_delete', 'class' => 'btn btn-danger', 'data-request-form' => '#list-form', 'data-request' => 'onDelete', 'data-request-data' => "_method:'DELETE'", 'data-request-confirm' => 'lang:admin::default.alert_warning_confirm'],
        'filter' => ['label' => 'lang:admin::default.button_icon_filter', 'class' => 'btn btn-default btn-filter', 'data-toggle' => 'list-filter', 'data-target' => '.list-filter'],
    ],
];

$config['list']['columns'] = [
    'edit'          => [
        'type'         => 'button',
        'iconCssClass' => 'fa fa-pencil',
        'attributes'   => [
            'class' => 'btn btn-edit',
            'href'  => 'permissions/edit/{permission_id}',
        ],
    ],
    'name'          => [
        'label'      => 'lang:system::permissions.column_name',
        'type'       => 'text',
        'searchable' => TRUE,
    ],
    'action_text'   => [
        'label'    => 'lang:system::permissions.column_actions',
        'sortable' => FALSE,
    ],
    'description'   => [
        'label'      => 'lang:system::permissions.column_description',
        'type'       => 'text',
        'searchable' => TRUE,
    ],
    'status'        => [
        'label' => 'lang:system::permissions.column_status',
        'type'  => 'switch',
    ],
    'permission_id' => [
        'label'     => 'lang:admin::default.column_id',
        'invisible' => TRUE,
    ],

];

$config['form']['toolbar'] = [
    'buttons' => [
        'save'      => ['label' => 'lang:admin::default.button_save', 'class' => 'btn btn-primary', 'data-request-form' => '#edit-form', 'data-request' => 'onSave'],
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
    ],
];

$config['form']['fields'] = [
    'name'        => [
        'label'   => 'lang:system::permissions.label_name',
        'type'    => 'text',
        'comment' => 'lang:system::permissions.help_name',
    ],
    'action'      => [
        'label'   => 'lang:system::permissions.label_action',
        'type'    => 'checkbox',
        'comment' => 'lang:system::permissions.help_action',
    ],
    'description' => [
        'label' => 'lang:system::permissions.label_description',
        'type'  => 'textarea',
    ],
    'status'      => [
        'label' => 'lang:admin::default.label_status',
        'type'  => 'switch',
    ],
];

return $config;