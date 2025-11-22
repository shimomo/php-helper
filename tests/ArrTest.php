<?php

declare(strict_types=1);

namespace Shimomo\Helper\Tests;

use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Shimomo\Helper\Arr;

/**
 * @author shimomo
 */
final class ArrTest extends TestCase
{
    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param int|float|string|null $value
     * @psalm-param array<string, int|float|string|null> $expected
     * @psalm-return void
     *
     * @param array $items
     * @param string $key
     * @param int|float|string|null $value
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'firstWhereProvider')]
    public function testFirstWhere(array $items, string $key, int|float|string|null $value, array $expected): void
    {
        $this->assertSame($expected, Arr::firstWhere($items, $key, $value));
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param list<string> $keys
     * @psalm-param int|float|string|null $value
     * @psalm-param array<string, int|float|string|null> $expected
     * @psalm-return void
     *
     * @param array $items
     * @param array $keys
     * @param int|float|string|null $value
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'firstWhereKeysProvider')]
    public function testFirstWhereKeys(array $items, array $keys, int|float|string|null $value, array $expected): void
    {
        $this->assertSame($expected, Arr::firstWhereKeys($items, $keys, $value));
    }

    /**
     * @psalm-param array<array-key, mixed> $items
     * @psalm-param list<mixed> $expected
     * @psalm-return void
     *
     * @param array $items
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'flattenProvider')]
    public function testFlatten(array $items, array $expected): void
    {
        $this->assertSame($expected, Arr::flatten($items));
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param int|float|string|null $value
     * @psalm-param list<array<string, int|float|string|null>> $expected
     * @psalm-return void
     *
     * @param array $items
     * @param string $key
     * @param int|float|string|null $value
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'whereProvider')]
    public function testWhere(array $items, string $key, int|float|string|null $value, array $expected): void
    {
        $this->assertSame($expected, Arr::where($items, $key, $value));
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param list<int|float|string|null> $values
     * @psalm-param list<array<string, int|float|string|null>> $expected
     * @psalm-return void
     *
     * @param array $items
     * @param string $key
     * @param array $values
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'whereInProvider')]
    public function testWhereIn(array $items, string $key, array $values, array $expected): void
    {
        $this->assertSame($expected, Arr::whereIn($items, $key, $values));
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param list<int|float|string|null> $values
     * @psalm-param list<array<string, int|float|string|null>> $expected
     * @psalm-return void
     *
     * @param array $items
     * @param string $key
     * @param array $values
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'whereNotInProvider')]
    public function testWhereNotIn(array $items, string $key, array $values, array $expected): void
    {
        $this->assertSame($expected, Arr::whereNotIn($items, $key, $values));
    }
}
