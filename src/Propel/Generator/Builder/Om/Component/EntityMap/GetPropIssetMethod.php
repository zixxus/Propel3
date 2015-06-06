<?php


namespace Propel\Generator\Builder\Om\Component\EntityMap;

use gossi\docblock\tags\TagFactory;
use Propel\Generator\Builder\Om\Component\BuildComponent;
use Propel\Generator\Builder\Om\Component\NamingTrait;

/**
 * Adds getPropIsset method.
 *
 * @author Marc J. Schmidt <marc@marcjschmidt.de>
 */
class GetPropIssetMethod extends BuildComponent
{
    use NamingTrait;

    public function process()
    {
        $className = $this->getObjectClassName(true);

        $body = "
if (!\$this->propIsset) {
    \$this->propIsset = \$this->getClassPropIsset('$className');
}
return \$this->propIsset;
        ";

        $this->addMethod('getPropIsset')
            ->setBody($body);
    }
}