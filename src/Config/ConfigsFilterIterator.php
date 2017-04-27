<?php
/**
 * Created by PhpStorm.
 * User: nemutaisama
 * Date: 27.04.17
 * Time: 14:13
 */

namespace Nemutaisama\Config;


class ConfigsFilterIterator extends \RecursiveFilterIterator
{
    public function accept()
    {
        return
            ($this->getInnerIterator()->isDir()
                or $this->getInnerIterator()->getExtension() === "php")
            and (strpos($this->getInnerIterator()->getBasename(), 'app') !== 0);
    }


    /**
     * @return \RecursiveDirectoryIterator
     */
    public function getInnerIterator()
    {
        return parent::getInnerIterator();
    }
}