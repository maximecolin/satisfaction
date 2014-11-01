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
use Satisfaction\Tests\Fixtures\Object;

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
        return array(
            array(
                new TrueSpecification(),
                true
            ),
            array(
                new FalseSpecification(),
                false
            ),
            array(
                (new TrueSpecification())->not(),
                false
            ),
            array(
                (new FalseSpecification())->not(),
                true
            ),
            array(
                (new TrueSpecification())->orX(new TrueSpecification()),
                true
            ),
            array(
                (new TrueSpecification())->orX(new FalseSpecification()),
                true
            ),
            array(
                (new FalseSpecification())->orX(new TrueSpecification()),
                true
            ),
            array(
                (new FalseSpecification())->orX(new FalseSpecification()),
                false
            ),
            array(
                (new TrueSpecification())->andX(new TrueSpecification()),
                true
            ),
            array(
                (new TrueSpecification())->andX(new FalseSpecification()),
                false
            ),
            array(
                (new FalseSpecification())->andX(new TrueSpecification()),
                false
            ),
            array(
                (new FalseSpecification())->andX(new FalseSpecification()),
                false
            ),
            array(
                (new FalseSpecification())->orX((new FalseSpecification())->not()),
                true
            ),
            array(
                (new FalseSpecification())->orX((new TrueSpecification())->andX(new TrueSpecification())),
                true
            ),
            array(
                (new FalseSpecification())->orX((new FalseSpecification())->andX(new TrueSpecification())),
                false
            ),
            array(
                (new TrueSpecification())->andX((new FalseSpecification())->orX(new TrueSpecification())),
                true
            )
        );
    }

    /**
     * Test isStatifiedBy method
     *
     * @dataProvider provider
     */
    public function testIsStatifiedBy($specification, $expected)
    {
        $object = new Object();

        $this->assertEquals($expected, $specification->isSatisfiedBy($object));
    }
}
