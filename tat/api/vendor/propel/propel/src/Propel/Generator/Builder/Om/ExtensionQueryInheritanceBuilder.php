<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT License
 */

namespace Propel\Generator\Builder\Om;

use Propel\Generator\Model\Inheritance;
use Propel\Generator\Exception\BuildException;

/**
 * Generates the empty PHP5 stub query class for use with single table inheritance.
 *
 * This class produces the empty stub class that can be customized with
 * application business logic, custom behavior, etc.
 *
 * @author François Zaninotto
 */
class ExtensionQueryInheritanceBuilder extends AbstractOMBuilder
{
    /**
     * The current child "object" we are operating on.
     *
     */
    protected $child;

    /**
     * Returns the name of the current class being built.
     *
     * @return string
     */
    public function getUnprefixedClassName()
    {
        return $this->getChild()->getClassName() . 'Query';
    }

    /**
     * Gets the package for the [base] object classes.
     *
     * @return string
     */
    public function getPackage()
    {
        return ($this->getChild()->getPackage() ? $this->getChild()->getPackage() : parent::getPackage());
    }

    /**
     * Set the child object that we're operating on currently.
     *
     * @param Inheritance $child Inheritance
     */
    public function setChild(Inheritance $child)
    {
        $this->child = $child;
    }

    /**
     * Returns the child object we're operating on currently.
     *
     * @return Inheritance
     * @throws BuildException
     */
    public function getChild()
    {
        if (!$this->child) {
            throw new BuildException("The MultiExtendObjectBuilder needs to be told which child class to build (via setChild() method) before it can build the stub class.");
        }

        return $this->child;
    }

    /**
     * Adds class phpdoc comment and opening of class.
     *
     * @param string $script
     */
    protected function addClassOpen(&$script)
    {
        $table = $this->getTable();
        $tableName = $table->getName();
        $tableDesc = $table->getDescription();

        $baseBuilder = $this->getNewQueryInheritanceBuilder($this->getChild());
        $baseClassName = $this->getClassNameFromBuilder($baseBuilder);

        if ($this->getBuildProperty('generator.objectModel.addClassLevelComment')) {
            $script .= "

/**
 * Skeleton subclass for representing a query for one of the subclasses of the '$tableName' table.
 *
 * $tableDesc
 *";
            if ($this->getBuildProperty('generator.objectModel.addTimeStamp')) {
                $now = strftime('%c');
                $script .= "
 * This class was autogenerated by Propel " . $this->getBuildProperty('general.version') . " on:
 *
 * $now
 *";
            }
            $script .= "
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */";
        }
        $script .= "
class "  .$this->getUnqualifiedClassName() . " extends " . $baseClassName . "
{
";
    }

    /**
     * Specifies the methods that are added as part of the stub object class.
     *
     * By default there are no methods for the empty stub classes; override this method
     * if you want to change that behavior.
     *
     * @param string $script
     * @see ObjectBuilder::addClassBody()
     */
    protected function addClassBody(&$script)
    {

    }

    /**
     * Closes class.
     *
     * @param string $script
     */
    protected function addClassClose(&$script)
    {
        $script .= "
} // " . $this->getUnqualifiedClassName() . "
";
    }
}
