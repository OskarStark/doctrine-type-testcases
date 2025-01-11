<?php

declare(strict_types=1);

/*
 * This file is part of oskarstark/doctrine-type-testcases package.
 *
 * (c) Datana GmbH <info@datana.rocks>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OskarStark\Doctrine\Testcase;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Symfony\Component\Uid\AbstractUid;

abstract class UidTypeTestCase extends TypeTestCase
{
    /**
     * @test
     */
    final public function convertToPhpValue(): void
    {
        $type = static::createType();
        $id = static::createId();

        $value = $type->convertToPHPValue($id->toRfc4122(), $this->createMock(AbstractPlatform::class));

        self::assertInstanceOf(static::createId()::class, $value);
    }

    abstract protected static function createId(): AbstractUid;
}
