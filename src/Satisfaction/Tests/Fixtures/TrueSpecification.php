<?php

/*
 * This file is part of the Satisfaction package.
 *
 * (c) Maxime Colin <contact@maximecolin.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Satisfaction\Tests\Fixtures;

use Satisfaction\CompositeSpecification;

/**
 * True specification
 */
class TrueSpecification extends CompositeSpecification
{
    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy($object)
    {
        return true;
    }
}
