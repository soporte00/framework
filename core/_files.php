<?php

namespace core;

class _files
{

    public static function file($file, $create = false, $content = null)
    {

        if (!defined('CONSOLE')) {
            return false;
        }


        $realFile = explode('/', $file);
        array_pop($realFile);
        $folder = implode('/', $realFile);

        if (is_file($file)) {
            _green("{$file} already exists !");
            return true;
        } else {

            if (!is_dir($folder) && $create) {
                _yellow("the folder {$folder} doesn't exist, it wil be created!");

                if (!mkdir($folder, 0777, true)) {
                    _red("Could not create {$folder} folder");
                    return false;
                }
            }

            if (!$document = fopen($file, 'w')) {
                _red("the file {$file} could not be created");
                return false;
            }

            if (!fwrite($document, $content)) {
                _yellow("could not write {$file}");
                return false;
            }

            fclose($document);


            return true;
        }
    }


    public static function delDir($folder)
    {
        if (!defined('CONSOLE')) {
            return false;
        }

        if (!is_dir($folder)) {
            _yellow("Not founded !");
            return false;
        }

        foreach (glob($folder . "/*") as $i) {
            if (is_dir($i)) {
                self::delDir($i);
            } else {
                unlink($i);
            }
        }

        rmdir($folder);
        _blue("Deleted");
    }


    public static function remove($file, $dir = false)
    {

        if (!defined('CONSOLE')) {
            return false;
        }

        $realFile = explode('/', $file);
        array_pop($realFile);
        $folder = implode('/', $realFile);


        if (is_file($file)) {
            unlink($file);
            _blue("{$file} Deleted");
        } else {
            _yellow("{$file} Not founded!");
        }

        if ($dir) self::delDir($folder);
    }
}
