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
 * Not specification
 */
class NotSpecification extends CompositeSpecification
{
    /**
     * @var \Satisfaction\SpecificationInterface
     */
    private $specification;

    /**
     * Constructor
     *
     * @param \Satisfaction\SpecificationInterface $specification
     */
    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy($object)
    {
        return !$this->specification->isSatisfiedBy($object);
    }
}
