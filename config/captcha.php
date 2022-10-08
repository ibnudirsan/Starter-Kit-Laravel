<?php

return [
    'characters' => ['2', '3', '4', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'm', 'n', 'p', 'q', 'r', 't', 'u', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'X', 'Y', 'Z'],
    'default' => [
        'length' => 4,
        'width' => 120,
        'height' => 36,
        'quality' => 100,
        'math' => false,
        'expire' => 30,
        'encrypt' => true,
    ],
    'math' => [
        'length' => 9,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
    ],

    'flat' => [
        'length' => 4,
        'width' => 120,
        'height' => 36,
        'quality' => 100,
        'lines' => 6,
        'bgImage' => true,
        'bgColor' => '#074A43',
        'fontColors' => ['#e8510d','#ccdef0', '#c0392b', '#0e1212', '#8a1bee', '#8e44ad', '#999f30', '#f50000', '#795548'],
        'contrast' => 0,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 32,
    ],
    'inverse' => [
        'length' => 3,
        'width' => 120,
        'height' => 36,
        'quality' => 100,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => true,
        'contrast' => -5,
    ]
];
