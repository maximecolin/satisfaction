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
 * Or specification
 */
class OrSpecification extends CompositeSpecification
{
    /**
     * @var \Satisfaction\SpecificationInterface One specification
     */
    private $one;

    /**
     * @var \Satisfaction\SpecificationInterface Other specification
     */
    private $other;

    /**
     * Constructor
     *
     * @param \Satisfaction\SpecificationInterface $one
     * @param \Satisfaction\SpecificationInterface $other
     */
    public function __construct(SpecificationInterface $one, SpecificationInterface $other)
    {
        $this->one   = $one;
        $this->other = $other;
    }

    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy($object)
    {
        return $this->one->isSatisfiedBy($object) || $this->other->isSatisfiedBy($object);
    }
}
