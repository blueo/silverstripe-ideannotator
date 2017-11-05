<?php

namespace SilverLeague\IDEAnnotator\Tests;

use SilverStripe\Core\Injector\Injector;
use SilverStripe\Core\Config\Config;
use SilverStripe\Dev\SapphireTest;
use SilverLeague\IDEAnnotator\DataObjectAnnotator;
use SilverStripe\Assets\File;
use SilverStripe\ORM\DataObject;
use SilverLeague\IDEAnnotator\AnnotatePermissionChecker;
use SilverStripe\Control\Director;

/**
 * Class DataObjectAnnotatorTest
 *
 * @mixin \PHPUnit_Framework_TestCase
 */
class AnnotatePermissionCheckerTest extends SapphireTest
{

    /**
     * @var \SilverLeague\IDEAnnotator\AnnotatePermissionChecker $permissionChecker
     */
    private $permissionChecker = null;

    /**
     * @var MockDataObjectAnnotator
     */
    private $annotator;

    public function testIsEnabled()
    {
        $this->assertTrue($this->permissionChecker->isEnabled());

        Config::inst()->remove(DataObjectAnnotator::class, 'enabled');
        Config::modify()->set(DataObjectAnnotator::class, 'enabled', false);
        $this->assertFalse($this->permissionChecker->isEnabled());
    }

    /**
     * Test is a module name is in the @Config enabled_modules
     * and will be seen as allowed or disallowed correctly
     */
    public function testModuleIsAllowed()
    {
        $this->assertFalse($this->permissionChecker->moduleIsAllowed('framework'));
        $this->assertTrue($this->permissionChecker->moduleIsAllowed('mysite'));
        $this->assertTrue($this->permissionChecker->moduleIsAllowed('silverleague/silverstripe-ideannotator'));
    }

    /**
     * Test if a DataObject is in an allowed module name
     * and will be seen as allowed or disallowed correctly
     */
    public function testDataObjectIsAllowed()
    {
        $this->assertTrue($this->permissionChecker->classNameIsAllowed(Team::class));
        $this->assertTrue($this->permissionChecker->classNameIsAllowed(Team_Extension::class));

        $this->assertFalse($this->permissionChecker->classNameIsAllowed(DataObject::class));
        $this->assertFalse($this->permissionChecker->classNameIsAllowed(File::class));

        Config::inst()->remove(DataObjectAnnotator::class, 'enabled_modules');
        Config::modify()->set(DataObjectAnnotator::class, 'enabled_modules', array('mysite'));

        $this->assertFalse($this->permissionChecker->classNameIsAllowed(Team::class));
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Setup Defaults
     */
    protected function setUp()
    {
        parent::setUp();
        Config::modify()->set(Director::class, 'environment_type', 'dev');
        Config::modify()->set(DataObjectAnnotator::class, 'enabled', true);
        Config::modify()->set(DataObjectAnnotator::class, 'enabled_modules', ['silverleague/silverstripe-ideannotator', 'mysite']);

        Config::modify()->merge(Team::class, 'extensions', [Team_Extension::class]);

        $this->annotator = Injector::inst()->get(MockDataObjectAnnotator::class);
        $this->permissionChecker = Injector::inst()->get(AnnotatePermissionChecker::class);
    }
}
