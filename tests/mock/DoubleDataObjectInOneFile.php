<?php

class DoubleDataObjectInOneFile1 extends DataObject implements TestOnly
{
    private static $db = [
        'Title'    => 'Varchar(255)'
    ];
}

class DoubleDataObjectInOneFile2 extends DataObject implements TestOnly
{
    private static $db = [
        'Name'    => 'Varchar(255)'
    ];
}
