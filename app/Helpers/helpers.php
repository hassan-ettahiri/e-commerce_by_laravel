<?php

if (!function_exists('compact')) {
    function compact(...$vars)
    {
        return array_reduce($vars, function ($result, $var) {
            if (is_string($var)) {
                $result[$var] = ${$var};
            } elseif (is_array($var)) {
                foreach ($var as $v) {
                    $result[$v] = ${$v};
                }
            }
            return $result;
        }, []);
    }
}