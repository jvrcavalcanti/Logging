<?php

namespace Accolon\Logging;

class Log
{
    private static function write($data, string $type)
    {
        $dir = "logs";

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = $dir . "/{$type}.log";

        file_put_contents(
            $filename,
            strtoupper($type) . ": " . date("D, d M Y H:i:s") . " -> " . json_encode($data) . "\n",
            FILE_APPEND
        );
    }

    public static function info($data)
    {
        static::write($data, "info");
    }

    public static function debug($data)
    {
        static::write($data, "debug");
    }

    public static function notice($data)
    {
        static::write($data, "notice");
    }

    public static function warning($data)
    {
        static::write($data, "warning");
    }

    public static function error($data)
    {
        static::write($data, "error");
    }

    public static function critical($data)
    {
        static::write($data, "critical");
    }

    public static function alert($data)
    {
        static::write($data, "alert");
    }

    public static function emergency($data)
    {
        static::write($data, "emergency");
    }
}
