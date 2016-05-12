<?php

/**
 * Class DataObjectAnnotatorTest_Player
 */
class DataObjectAnnotatorTest_Player extends Member implements TestOnly
{
    private static $db = [
        'IsRetired'   => 'Boolean',
        'ShirtNumber' => 'Varchar',
    ];

    private static $has_one = [
        'FavouriteTeam' => 'DataObjectAnnotatorTest_Team',
    ];

    private static $belongs_many_many = [
        'TeamPlayer'  => 'DataObjectAnnotatorTest_Team.Team',
        'TeamReserve' => 'DataObjectAnnotatorTest_Team.Reserve'
    ];
}
