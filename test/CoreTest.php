<?php
/**
 * Created by gumao.com
 * User: tommy
 */

namespace Tomener\Phpmock\Test;


use PHPUnit\Framework\TestCase;
use Tomener\Phpmock\Mock;

class CoreTest extends TestCase
{
    public function testDataType()
    {
        $this->assertIsBool(Mock::bool());
        $this->assertIsInt(Mock::int(0, 10));
        $this->assertIsFloat(Mock::float(1, 10));

        var_dump(Mock::string(3, 10));
    }
}
