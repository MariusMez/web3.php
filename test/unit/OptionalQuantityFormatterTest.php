<?php

namespace Test\Unit;

use Test\TestCase;
use Web3\Formatters\OptionalQuantityFormatter;

class OptionalQuantityFormatterTest extends TestCase
{
    /**
     * formatter
     * 
     * @var \Web3\Formatters\OptionalQuantityFormatter
     */
    protected OptionalQuantityFormatter $formatter;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * testFormat
     * 
     * @return void
     */
    public function testFormat()
    {
        $this->assertEquals('0x927c0', OptionalQuantityFormatter::format(0x0927c0));
        $this->assertEquals('0x927c0', OptionalQuantityFormatter::format('0x0927c0'));
        $this->assertEquals('0x927c0', OptionalQuantityFormatter::format('0x927c0'));
        $this->assertEquals('0x927c0', OptionalQuantityFormatter::format('600000'));
        $this->assertEquals('0x927c0', OptionalQuantityFormatter::format(600000));
        
        $this->assertEquals('0xea60', OptionalQuantityFormatter::format('0x0ea60'));
        $this->assertEquals('0xea60', OptionalQuantityFormatter::format('0xea60'));
        $this->assertEquals('0xea60', OptionalQuantityFormatter::format(0x0ea60));
        $this->assertEquals('0xea60', OptionalQuantityFormatter::format('60000'));
        $this->assertEquals('0xea60', OptionalQuantityFormatter::format(60000));

        $this->assertEquals('0x0', OptionalQuantityFormatter::format(0x00));
        $this->assertEquals('0x0', OptionalQuantityFormatter::format('0x00'));
        $this->assertEquals('0x0', OptionalQuantityFormatter::format('0x0'));
        $this->assertEquals('0x0', OptionalQuantityFormatter::format('0'));
        $this->assertEquals('0x0', OptionalQuantityFormatter::format(0));

        $this->assertEquals('latest', OptionalQuantityFormatter::format('latest'));
        $this->assertEquals('earliest', OptionalQuantityFormatter::format('earliest'));
        $this->assertEquals('pending', OptionalQuantityFormatter::format('pending'));
        $this->assertEquals('0x0', OptionalQuantityFormatter::format('hello'));
    }
}