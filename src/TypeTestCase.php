<?php

declare(strict_types=1);

/*
 * This file is part of oskarstark/trimmed-non-empty-string.
 *
 * (c) Oskar Stark <oskarstark@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OskarStark\Doctrine\Testcase;

use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\TestCase;

abstract class TypeTestCase extends TestCase
{
    /**
     * @test
     */
    final public function nameMethod(): void
    {
        $type = static::createType();

        self::assertSame(
            static::name(),
            $type->getName(),
        );
    }

    abstract protected static function createType(): Type;

    abstract protected static function name(): string;
}
