<?php
namespace Riesenia\Utility\Traits;

/**
 * Add _parseDecimal method.
 *
 * @author Tomas Saghy <segy@riesenia.com>
 */
trait ParseDecimalTrait
{
    /**
     * Decimal parser.
     *
     * @param mixed $number
     * @param array $options
     * @param bool  $allowNull
     *
     * @return float
     */
    protected function _parseDecimal($number, array $options = [], $allowNull = false)
    {
        if ($allowNull && $number === null) {
            return $number;
        }

        if (isset($options['thousands_separator'])) {
            $number = str_replace($options['thousands_separator'], '', $number);
        }

        $number = str_replace(',', '.', $number);

        return (float) preg_replace('/[^0-9.-]/', '', $number);
    }
}
