<?php

namespace Lib\math;

class FloatComparator implements Comparator\ComparatorInterface
{

    use Comparator\IsComparator;
    
    // Pour comparaison float (http://www.php.net/manual/en/language.types.float.php)
    const EPSILON = 0.00001;

    /**
     * @param float $a 
     * @param float $b 
     * 
     * @return boolean
     */
    public function areEquals($a, $b)
    {
        return abs($a - $b) < static::EPSILON;
    }

    /**
     * @param float $a 
     * @param float $b 
     * 
     * @return boolean
     */
    public function isAGreaterThanB($a, $b)
    {
        return ($a - $b) > static::EPSILON;
    }

}
