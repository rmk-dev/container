<?php

namespace Rmk\Container;

use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * Interface for containers
 *
 * Extends the standard recommended container interface with additional methods for adding and removing values
 *
 * @author Kiril Savchev <k.savchev@gmail.com>
 */
interface ContainerInterface extends PsrContainerInterface
{

    /**
     * Add value to the container
     *
     * @param mixed $item
     * @param mixed $id
     *
     * @return void
     */
    public function add($item, $id = null): void;

    /**
     * Checks whether the container has a value
     *
     * @param mixed $item
     *
     * @return bool
     */
    public function contains($item): bool;

    /**
     * Removes a value under a specific id
     *
     * @param mixed $id
     *
     * @return void
     */
    public function remove($id): void;

    /**
     * Removes a value
     *
     * If the value is added with several keys, it must be removed in all occurrences
     *
     * @param mixed $item
     *
     * @return void
     */
    public function removeItem($item): void;

    /**
     * Convert the container into an array
     *
     * @return array
     */
    public function toArray(): array;
}
