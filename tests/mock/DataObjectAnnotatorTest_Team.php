<?php

/**
 *
 */

/* comment */

// Another comment
class DataObjectAnnotatorTest_Team extends DataObject implements TestOnly
{

    private static $db = [
        'Title'      => 'Varchar',
        'VisitCount' => 'Int',
        'Price'      => 'Currency'
    ];

    private static $has_one = [
        "Captain"            => 'DataObjectAnnotatorTest_Player',
        'HasOneRelationship' => 'DataObjectAnnotatorTest_Player',
    ];

    private static $has_many = [
        'SubTeams' => 'DataObjectAnnotatorTest_SubTeam',
        'Comments' => 'DataObjectAnnotatorTest_TeamComment'
    ];

    private static $many_many = [
        'Players'           => 'DataObjectAnnotatorTest_Player.Players',
        'Reserves'          => 'DataObjectAnnotatorTest_Player.Reserves',
        'SecondarySubTeams' => 'DataObjectAnnotatorTest_SubTeam',
    ];

    public function SecondarySubTeams()
    {

    }

}

Config::inst()->update('DataObjectAnnotatorTest_Team', 'extensions', ['DataObjectAnnotatorTest_Team_Extension']);
