<?php
/**
 * Created by PhpStorm.
 * User: nemutaisama
 * Date: 25.04.17
 * Time: 19:03
 */

namespace Nemutaisama\Config;


use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ConfigsIterator extends RecursiveIteratorIterator
{

    public function __construct(RecursiveDirectoryIterator $iterator)
    {
        $filterIterator = new ConfigsFilterIterator($iterator);
        parent::__construct($filterIterator);
    }

    public function current()
    {
        //var_dump($this->getInnerIterator()->getSubpath());
        return parent::current();
    }

    public function key()
    {
        $this->getConfigKey();
        return parent::key();
    }

    /**
     * @return RecursiveDirectoryIterator
     */
    public function getInnerIterator()
    {
        return parent::getInnerIterator();
    }

    private function getConfigKey()
    {
        $parentKey = $this->getInnerIterator()->getSubpath();
        var_dump($this->getInnerIterator()->getBasename());
    }


}