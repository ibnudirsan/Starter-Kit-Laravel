<?php

/**
 * Example Module
 */
return [

    'authorities' => [

        '01. Master Menu' => [
            'Authorization',
            'Menu Customer',
        ],

        '02. Master Admin' => [
            'Admin Create',
            'Admin Edit',
            'Admin Show',
            'Admin Trash',
            'Admin Restore'
        ],

        '03. Master Module' => [
            'Module Show',
            'Module Edit',
            'Module Create',
            'Module Trash',
            'Module Restore',
            'Module Delete'
        ],

        '04. Master Permissions' => [
            'Permissions Create',
            'Permissions Edit',
            'Permissions Show',
            'Permissions Delete',
            'Permissions Trash',
            'Permissions Restore'
        ],

        '05. Master Role' => [
            'Role Trash',
            'Role View',
            'Role Edit',
            'Role Restore',
            'Role Delete',
            'Role Show',
            'Role Create'
        ],

        '06. Master Customer' => [
            'Customer Create',
            'Customer Show',
            'Customer Edit',
            'Customer Delete',
            'Customer Trash',
            'Customer Restore',
            'Customer Excel'
        ]
    ],
];
