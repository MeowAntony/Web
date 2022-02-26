<?php

$str = 'ahb acb aeb aeeb adcb axeb';
$regexp = '/a..b/u';
preg_match_all($regexp, $str, $matches);
foreach ($matches[0] as $value) {
    echo nl2br("$value\n");
}

$str =  'a1b2c3';
$regexp = '/\d/ui';
$str = preg_replace_callback($regexp, function ($matches) { return strval( intval( $matches[0])**3 ); }, $str);
echo nl2br("$str\n");

