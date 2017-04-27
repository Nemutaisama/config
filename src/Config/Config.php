<?php
/**
 * Created by PhpStorm.
 * User: nemutaisama
 * Date: 27.04.17
 * Time: 15:01
 */

namespace Nemutaisama\Config;


class Config
{
    protected $config;
    protected $configsDir;

    public function __construct($configsDir = '')
    {
        if ($configsDir) {
            $this->setConfigsDir($configsDir);
        }
        return $this;
    }

    public function setConfigsDir($dir)
    {
        $this->configsDir = $dir;
        return $this;
    }

    public function get($key) {
        return $this->getFromFile($key);
    }

    public function getFromFile($key)
    {
        $fileName = str_replace('.', DIRECTORY_SEPARATOR, $key);
        $globalConfig = $this->loadConfigFile($fileName . ".php");
        $localConfig = $this->loadConfigFile($fileName . ".local.php");

        return array_replace_recursive($globalConfig, $localConfig);
    }

    protected function loadConfigFile($fileName)
    {
        $config = [];

        $path = $this->configsDir. DIRECTORY_SEPARATOR . $fileName;
        if (file_exists($path)) {
            $config = require $path;
        }

        return $config;
    }
}