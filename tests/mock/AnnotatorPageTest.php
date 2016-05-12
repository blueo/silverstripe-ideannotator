<?php


class AnnotatorPageTest extends Page implements TestOnly
{
    private static $db = [
        'SubTitle'    => 'Varchar(255)'
    ];
}

class AnnotatorPageTest_Controller extends Page_Controller implements TestOnly
{

}

class AnnotatorPageTest_Extension extends Extension implements TestOnly
{

}
