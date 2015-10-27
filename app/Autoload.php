<?php

class Autoloader
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'loader'));
    }

    private function loader($className)
    {
        $parts = explode('\\', $className);
        $class = trim(array_pop($parts)) . '.php';
        $dir   = strtolower(implode(DIRECTORY_SEPARATOR, $parts));

        $file = $dir . DIRECTORY_SEPARATOR . $class;
        if (stream_resolve_include_path($file) !== false) {
            include_once $file;
            if (class_exists($className)) {
                return true;
            }
        }

        return false;
    }
}