<?php

namespace core;

class console
{

    /**
     * @param string $message 
     * @param string $type error | warning | fine | null
     */
    public function message(string $message, string $type = null)
    {
        if (defined('CONSOLE')) {

            if ($type === 'error') {
                _red('|--> ' . $message);
            } elseif ($type === 'warning') {
                _yellow('|--> ' . $message);
            } elseif ($type === 'fine') {
                _blue($message);
            } else {
                echo "\n$message\n";
            }
        } else {
            return $message;
        }
    }
}
