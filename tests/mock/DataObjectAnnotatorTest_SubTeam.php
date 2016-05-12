<?php


class DataObjectAnnotatorTest_SubTeam extends DataObjectAnnotatorTest_Team implements TestOnly
{
    private static $db = [
        'SubclassDatabaseField' => 'Varchar'
    ];

    private static $has_one = [
        "ParentTeam" => 'DataObjectAnnotatorTest_Team',
    ];

    private static $many_many = [
        'FormerPlayers' => 'DataObjectAnnotatorTest_Player'
    ];

    private static $many_many_extraFields = [
        'FormerPlayers' => [
            'Position' => 'Varchar(100)'
        ]
    ];
}
