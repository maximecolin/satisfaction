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
 * Specification interface
 */
interface SpecificationInterface
{
    /**
     * Process specification satisfaction
     *
     * @param object $object
     * @return boolean
     */
    public function isSatisfiedBy($object);

    /**
     * And
     *
     * @param \Satisfaction\SpecificationInterface $specification
     * @return \Satisfaction\SpecificationInterface
     */
    public function andX(SpecificationInterface $specification);

    /**
     * Or
     *
     * @param \Satisfaction\SpecificationInterface $specification
     * @return \Satisfaction\SpecificationInterface
     */
    public function orX(SpecificationInterface $specification);

    /**
     * Not
     *
     * @param \Satisfaction\SpecificationInterface $specification
     * @return \Satisfaction\SpecificationInterface
     */
    public function not();
}
