<?php

/**
 * This file is part of web3.php package.
 *
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 *
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace Web3\Contracts\Types;

use InvalidArgumentException;
use Web3\Contracts\Ethabi;
use Web3\Utils;
use Web3\Contracts\SolidityType;
use Web3\Contracts\Types\IType;
use Web3\Formatters\IntegerFormatter;
use Web3\Formatters\BigNumberFormatter;

class Struct extends SolidityType implements IType
{
    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * isType
     *
     * @param string $name
     * @return bool
     */
    public function isType($name)
    {
        return (preg_match('/^(tuple)(\[([1-9][0-9]*)?\])?$/', $name) === 1);
    }

    /**
     * isDynamicType
     *
     * @return bool
     */
    public function isDynamicType()
    {
        return true;
    }

    /**
     * inputFormat
     *
     * @param mixed $value
     * @param string $name
     * @return string
     */
    public function inputFormat($value, $name)
    {
        if (!is_array($value)) {
            throw new InvalidArgumentException('The value to inputFormat function must be an array.');
        }
        foreach ($value as $key => $val) {
            Ethabi->validateType($name . '[' . $key . ']', $val);
            $value[$key] = $this->getType($key)->inputFormat($val, $key);
        }
        return;
    }

    /**
     * outputFormat
     *
     * @param mixed $value
     * @param string $name
     * @return string
     */
    public function outputFormat($value, $name)
    {
        return;
    }
}
