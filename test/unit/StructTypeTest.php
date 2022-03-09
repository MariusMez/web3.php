<?php

namespace Test\Unit;

use InvalidArgumentException;
use Test\TestCase;
use Web3\Contracts\Types\Struct;

class StructTypeTest extends TestCase
{
    /**
     * testTypes
     * 
     * @var array
     *
     *  # Well-formed tuple type strings
    ('tuple', ('tuple', None)),
    ('tuple[]', ('tuple', '[]')),
    ('tuple[1]', ('tuple', '[1]')),
    ('tuple[10]', ('tuple', '[10]')),
    ('tuple[19]', ('tuple', '[19]')),
    ('tuple[195]', ('tuple', '[195]')),

    # Malformed tuple type strings
    ('tuple[][]', None),
    ('tuple[1][1]', None),
    ('tuple[0]', None),
    ('tuple[01]', None),
    ('tupleasfasdf', None),
    ('uint256', None),
    ('bool', None),
    ('', None),
    ('tupletuple', None),
     */
    protected $testTypes = [
        [
            'value' => 'tuple',
            'result' => true
        ], [
            'value' => 'tuple[]',
            'result' => true
        ], [
            'value' => 'tuple[1]',
            'result' => true
        ], [
            'value' => 'tuple[19]',
            'result' => true
        ], [
            'value' => 'tuple[195]',
            'result' => true
        ], [
            'value' => 'tuple[][]',
            'result' => false
        ], [
            'value' => 'tuple[1][1]',
            'result' => false
        ], [
            'value' => 'tuple[0]',
            'result' => false
        ],[
            'value' => 'tupletuple',
            'result' => false
        ],[
            'value' => 'tuple[01]',
            'result' => false
        ],[
            'value' => '',
            'result' => false
        ],
    ];

    /**
     * solidityType
     * 
     * @var \Web3\Contracts\SolidityType
     */
    protected $solidityType;

    /**
     * setUp
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->solidityType = new Struct;
    }

    /**
     * testIsType
     * 
     * @return void
     */
    public function testIsType()
    {
        $solidityType = $this->solidityType;

        foreach ($this->testTypes as $type) {
            $this->assertEquals($solidityType->isType($type['value']), $type['result']);
        }
    }
}