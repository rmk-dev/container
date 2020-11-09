<?php

/**
 * Main Container class
 */
namespace Rmk\Container;

use \ArrayObject;

/**
 * Class Container
 *
 * @package Rmk\Container
 */
class Container extends ArrayObject implements ContainerInterface
{

    /**
     * Returns element from the container
     *
     * @param string $id The element identification
     *
     * @return mixed The element value
     */
    public function get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Checks whether a value with specific identification exists
     *
     * @param string $id The element identification
     *
     * @return bool True if exists, otherwise false
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }

    /**
     * Checks whether a specific value exists in the container
     *
     * @param mixed $item A value to be checked
     *
     * @return bool True if exists, otherwise false
     */
    public function contains($item): bool
    {
        return in_array($item, $this->getArrayCopy(), true);
    }

    /**
     * Adds a value to the container, optionally with a identification
     *
     * @param mixed      $item The value to be added to the container
     * @param mixed|null $id   [Optional] The value identification
     */
    public function add($item, $id = null): void
    {
        if ($id === null) {
            $array = $this->getArrayCopy();
            $array[] = $item;
            $this->exchangeArray($array);
        } else {
            $this->offsetSet($id, $item);
        }
    }


    /**
     * Removes a value from the container by its identification
     *
     * @param mixed $id The value identification
     */
    public function remove($id): void
    {
        if ($this->offsetExists($id)) {
            $this->offsetUnset($id);
        }
    }

    /**
     * Remove a value from the container
     *
     * @param mixed $item The value to be removed
     */
    public function removeItem($item): void
    {
        if ($this->contains($item)) {
            $array = $this->getArrayCopy();
            $key = array_search($item, $array, true);
            $this->offsetUnset($key);
        }
    }

    /**
     * Returns the collection values as array
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->getArrayCopy();
    }
}