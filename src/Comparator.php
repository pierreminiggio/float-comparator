<?php

namespace PierreMiniggio\FloatComparator;

use PierreMiniggio\Comparator\Comparable;
use PierreMiniggio\Comparator\IsComparator;

class Comparator implements Comparable
{

    use IsComparator;
    
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
