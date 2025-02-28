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
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

abstract class TypeTestCase extends TestCase
{
    #[Test]
    final public function nameMethod(): void
    {
        $type = static::createType();

        // getName() method is deprecated in doctrine/dbal 3 and removed in doctrine/dbal 4
        if (!method_exists($type, 'getName')) {
            $name = Type::getTypeRegistry()->lookupName($type);
        } else {
            $name = $type->getName();
        }

        self::assertSame(static::provideName(), $name);
    }

    abstract protected static function createType(): Type;

    abstract protected static function provideName(): string;
}
