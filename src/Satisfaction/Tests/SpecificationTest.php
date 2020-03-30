<?php

/*
 * This file is part of the Satisfaction package.
 *
 * (c) Maxime Colin <contact@maximecolin.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Satisfaction\Tests;

use Satisfaction\Tests\Fixtures\TrueSpecification;
use Satisfaction\Tests\Fixtures\FalseSpecification;

/**
 * Specification test
 */
class SpecificationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Data provider
     *
     * @return array
     */
    public static function provider()
    {
        $true  = new TrueSpecification();
        $false = new FalseSpecification();

        return array(
            array($true, true),
            array($false, false),
            array($true->not(), false),
            array($false->not(), true),
            array($true->orX($true), true),
            array($true->orX($false), true),
            array($false->orX($true), true),
            array($false->orX($false), false),
            array($true->andX($true), true),
            array($true->andX($false), false),
            array($false->andX($true), false),
            array($false->andX($false), false),
            array($false->orX($false->not()), true),
            array($false->orX($true->andX($true)), true),
            array($false->orX($false->andX($true)), false),
            array($true->andX($false->orX($true)), true)
        );
    }

    /**
     * Test isStatifiedBy method
     *
     * @dataProvider provider
     */
    public function testIsStatifiedBy($specification, $expected)
    {
        $object = new \stdClass();

        $this->assertEquals($expected, $specification->isSatisfiedBy($object));
    }
}
