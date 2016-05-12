<?php


class DataObjectAnnotatorTest_TeamComment extends DataObject implements TestOnly
{
    private static $db = [
        'Name'    => 'Varchar',
        'Comment' => 'Text'
    ];

    private static $has_one = [
        'Team' => 'DataObjectAnnotatorTest_Team'
    ];

}
