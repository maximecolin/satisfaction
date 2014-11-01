<?php

/*
 * This file is part of the Satisfaction package.
 *
 * (c) Maxime Colin <contact@maximecolin.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Satisfaction;

/**
 * Composite specification
 */
abstract class CompositeSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function andX(SpecificationInterface $specification)
    {
        return new AndSpecification($this, $specification);
    }

    /**
     * {@inheritdoc}
     */
    public function orX(SpecificationInterface $specification)
    {
        return new OrSpecification($this, $specification);
    }

    /**
     * {@inheritdoc}
     */
    public function not()
    {
        return new NotSpecification($this);
    }
}
