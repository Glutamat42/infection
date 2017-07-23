<?php
/**
 * Copyright © 2017 Maks Rafalko
 *
 * License: https://opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types=1);

namespace Infection\Tests\Mutator\Arithmetic;

use Infection\Mutator\Arithmetic\Decrement;
use Infection\Mutator\Arithmetic\DivEqual;
use Infection\Mutator\Arithmetic\MinusEqual;
use Infection\Mutator\Arithmetic\ModEqual;
use Infection\Mutator\Arithmetic\MulEqual;
use Infection\Mutator\Arithmetic\PowEqual;
use Infection\Mutator\Arithmetic\ShiftLeft;
use Infection\Mutator\Arithmetic\ShiftRight;
use Infection\Mutator\Mutator;
use Infection\Tests\Mutator\AbstractMutator;

class ShiftRightTest extends AbstractMutator
{
    protected function getMutator(): Mutator
    {
        return new ShiftRight();
    }

    public function test_replaces_post_decrement()
    {
        $code = '<?php $a = 1; $a >> 2;';
        $mutatedCode = $this->mutate($code);

        $expectedMutatedCode = <<<'CODE'
<?php

$a = 1;
$a << 2;
CODE;

        $this->assertSame($expectedMutatedCode, $mutatedCode);
    }
}