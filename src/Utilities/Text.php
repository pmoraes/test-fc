<?php

class Text 
{
    /**
     * Singular array
     *
     * @var array
     */

    private static $__singular = [
        'families' => 'family',
        'wars' => 'war'
    ];

    /**
     * Plural array
     *
     * @var array
     */
    private static $__plural = [
        'family' => 'families',
        'war' => 'wars'
    ];

    /**
     * singular method It will pluralize a variable.
     *
     * @param string $var Value to be pluralized.
     * @return string
     */
    public static function singular($var)
    {
        if (isset(self::$__singular[$var])) {
            return self::$__singular[$var];
        }

        throw new Exception("{$var} could not be singularized", 500);
        
    }

    /**
     * plural method It will pluralize a variable.
     *
     * @param string $var Value to be pluralized.
     * @return string
     */
    public static function plural($var)
    {
        if (isset(self::$__plural[$var])) {
            return self::$__plural[$var];
        }

        throw new Exception("{$var} could not be pluralized", 500);
    }

}