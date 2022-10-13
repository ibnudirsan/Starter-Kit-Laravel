<?php

return [

    'authorities' => [

        '01. Master Menu' => [
            'Master Auth',
            'Master Customer',
        ],

        '02. Master Auth' => [
            'Auth Create',
            'Auth Show',
            'Auth Status',
            'Auth Edit',
            'Auth Delete'
        ],

        '03. Master Customer' => [
            'Customer Create',
            'Customer Show',
            'Customer Status',
            'Customer Edit',
            'Customer Delete'
        ]
    ],
];
