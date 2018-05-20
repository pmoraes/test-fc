<?php


/**
 * This class just will provide some useful method
 */
function debug($var) {
    $template = '<pre>%s</pre>';
    printf($template, print_r($var, true));
}
