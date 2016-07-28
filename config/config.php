<?php

return [
    'straight'   => [
        'marking_store' => [
            'type' => 'property_accessor',
        ],
        'supports'      => [
            0 => 'stdClass',
        ],
        'places'        => [
            0 => 'a',
            1 => 'b',
            2 => 'c',
            3 => 'd',
        ],
        'transitions'   => [
            't1' => [
                'from' => 'a',
                'to'   => 'b',
            ],
            't2' => [
                'from' => 'b',
                'to'   => 'c',
            ],
            't3' => [
                'from' => 'c',
                'to'   => 'd',
            ],
        ],
    ],
    'round_trip' => [
        'marking_store' => [
            'type' => 'property_accessor',
        ],
        'supports'      => [
            0 => 'stdClass',
        ],
        'places'        => [
            0 => 'a',
            1 => 'b',
            2 => 'c',
        ],
        'transitions'   => [
            't1' => [
                'from' => 'a',
                'to'   => 'b',
            ],
            't2' => [
                'from' => 'b',
                'to'   => 'c',
            ],
            't3' => [
                'from' => 'c',
                'to'   => 'a',
            ],
        ],
    ],
    'or'         => [
        'marking_store' => [
            'type' => 'property_accessor',
        ],
        'supports'      => [
            0 => 'stdClass',
        ],
        'places'        => [
            0 => 'a',
            1 => 'b',
            2 => 'c',
            3 => 'd',
        ],
        'transitions'   => [
            't1' => [
                'from' => 'a',
                'to'   => 'b',
            ],
            't2' => [
                'from' => 'a',
                'to'   => 'c',
            ],
            't3' => [
                'from' => 'b',
                'to'   => 'd',
            ],
            't4' => [
                'from' => 'c',
                'to'   => 'd',
            ],
        ],
    ],
    'and'        => [
        'marking_store' => [
            'type' => 'property_accessor',
        ],
        'supports'      => [
            0 => 'stdClass',
        ],
        'places'        => [
            0 => 'a',
            1 => 'b',
            2 => 'c',
            3 => 'd',
            4 => 'e',
            5 => 'f',
        ],
        'transitions'   => [
            't1' => [
                'from' => 'a',
                'to'   => [
                    0 => 'b',
                    1 => 'c',
                ],
            ],
            't2' => [
                'from' => 'b',
                'to'   => 'd',
            ],
            't3' => [
                'from' => 'c',
                'to'   => 'e',
            ],
            't4' => [
                'from' => [
                    0 => 'd',
                    1 => 'e',
                ],
                'to'   => 'f',
            ],
        ],
    ],
    'wtf'        => [
        'marking_store' => [
            'type' => 'property_accessor',
        ],
        'supports'      => 'stdClass',
        'places'        => [
            0  => 'a',
            1  => 'b',
            2  => 'c',
            3  => 'd',
            4  => 'e',
            5  => 'f',
            6  => 'g',
            7  => 'h',
            8  => 'i',
            9  => 'j',
            10 => 'k',
        ],
        'transitions'   => [
            't1'  => [
                'from' => 'a',
                'to'   => 'b',
            ],
            't2'  => [
                'from' => 'b',
                'to'   => 'c',
            ],
            't3'  => [
                'from' => 'c',
                'to'   => 'd',
            ],
            't4'  => [
                'from' => 'b',
                'to'   => 'e',
            ],
            't5'  => [
                'from' => 'b',
                'to'   => 'f',
            ],
            't6'  => [
                'from' => [
                    0 => 'c',
                    1 => 'd',
                ],
                'to'   => [
                    0 => 'f',
                    1 => 'g',
                ],
            ],
            't7'  => [
                'from' => 'e',
                'to'   => 'h',
            ],
            't8'  => [
                'from' => [
                    0 => 'e',
                    1 => 'g',
                    2 => 'i',
                ],
                'to'   => 'h',
            ],
            't9'  => [
                'from' => [
                    0 => 'f',
                    1 => 'g',
                ],
                'to'   => [
                    0 => 'i',
                    1 => 'j',
                ],
            ],
            't10' => [
                'from' => 'h',
                'to'   => 'k',
            ],
        ],
    ],
];