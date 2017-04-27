<?php
/**
 * Created by PhpStorm.
 * User: nemutaisama
 * Date: 24.04.17
 * Time: 19:14
 */

namespace Nemutaisama\Config;


class ConfigLoader
{
    private $config;

    public function __construct($configFile)
    {
        if (is_array($configFile)) {
            $this->config = $configFile;
            return $this->config;
        }
        if (!is_file($configFile)) {
            throw new \Exception('Wrong config file name');
        }
        //$config = require $configFile;
        $this->getConfigFiles(dirname($configFile));
        array_replace_recursive($config);
        die();
    }

    public function getConfigFiles($path)
    {
        $directory = new \RecursiveDirectoryIterator(
            $path,
                \FilesystemIterator::KEY_AS_FILENAME |
                \FilesystemIterator::CURRENT_AS_FILEINFO |
                \FilesystemIterator::SKIP_DOTS
        );

        $iterator = new ConfigsIterator($directory);

        $files = array();
        foreach ($iterator as $key => $info) {
            if (true) {
                //$files[] = $info->getPathname();
                //var_dump($key, $info);
            }
        }
        //var_dump($files);
    }
}