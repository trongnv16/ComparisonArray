<?php
include './ComparisonArrayClass.php';

$arr = [
    0 => [
        "id" => 123,
        "name" => 'Solution 1',
        "group" => [
            1 => [
                "nameGroup"	=> "Nhóm 1",
                "feature"	=> 	[
                    1 => "Chức năng 1",
                    // 2 => "Chức năng 2",
                    3 => "Chức năng 3",
                ]
            ],
            2 => [
                "nameGroup"	=> "Nhóm 2",
                "feature"	=> 	[
                    4 => "Chức năng 4",
                    5 => "Chức năng 5",
                    6 => "Chức năng 6",
                ]
            ],
            3 => [
                "nameGroup"	=> "Nhóm 3",
                "feature"	=> 	[
                    7 => "Chức năng 7",
                    8 => "Chức năng 8",
                    9 => "Chức năng 9",
                ]
            ]
        ]
    ],
    1 => [
        "id" => 12312,
        "name" => 'Solution 2',
        "group" => [
            1 => [
                "nameGroup"	=> "Nhóm 1",
                "feature"	=> 	[
                    1 => "Chức năng 1",
                    2 => "Chức năng 2",
                    3 => "Chức năng 3",
                ]
            ],
            2 => [
                "nameGroup"	=> "Nhóm 2",
                "feature"	=> 	[
                    4 => "Chức năng 4",
                    6 => "Chức năng 6",
                ]
            ],
            4 => [
                "nameGroup"	=> "Nhóm 4",
                "feature"	=> 	[
                    10 => "Chức năng 10",
                    11 => "Chức năng 11",
                ]
            ],
        ]
    ]
];

$titleName = 'nameGroup';
$data = comparisonArrayClass::comparisonArray($arr[0], $arr[1], $titleName);
