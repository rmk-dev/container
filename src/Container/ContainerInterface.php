<?php

namespace Rmk\Container;

use Psr\Container\ContainerInterface as PsrContainerInterface;

interface ContainerInterface extends PsrContainerInterface {

    public function add($item, $id = null): void;

    public function contains($item): bool;

    public function remove($id): void;

    public function removeItem($item): void;
}
