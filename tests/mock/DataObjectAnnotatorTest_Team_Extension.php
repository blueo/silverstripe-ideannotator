<?php

class DataObjectAnnotatorTest_Team_Extension extends DataExtension implements TestOnly
{

    private static $db = [
        'ExtendedVarcharField' => 'Varchar',
        'ExtendedIntField'     => 'Int'
    ];

    private static $has_one = [
        'ExtendedHasOneRelationship' => 'DataObjectTest_Player'
    ];
}
