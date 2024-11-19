<?php

/**
 * Example Module
 */
return [

    'authorities' => [

        '01. Master Menu' => [
            'Authorization',
            'Menu Customer',
            'Menu Logs'
        ],

        '02. Master Logs' => [
            'View Logger'
        ],

        '03. Master Admin' => [
            'Admin Create',
            'Admin Edit',
            'Admin Show',
            'Admin Trash',
            'Admin Restore'
        ],

        '04. Master Module' => [
            'Module Show',
            'Module Edit',
            'Module Create',
            'Module Trash',
            'Module Restore',
            'Module Delete'
        ],

        '05. Master Permissions' => [
            'Permissions Create',
            'Permissions Edit',
            'Permissions Show',
            'Permissions Delete',
            'Permissions Trash',
            'Permissions Restore'
        ],

        '06. Master Role' => [
            'Role Trash',
            'Role View',
            'Role Edit',
            'Role Restore',
            'Role Delete',
            'Role Show',
            'Role Create'
        ],

        '07. Master Customer' => [
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
