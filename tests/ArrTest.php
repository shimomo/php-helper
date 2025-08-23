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
     * @param  array                  $items
     * @param  string                 $key
     * @param  string|float|int|null  $value
     * @param  array                  $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'firstWhereProvider')]
    public function testFirstWhere(array $items, string $key, string|float|int|null $value, array $expected): void
    {
        $this->assertSame($expected, Arr::firstWhere($items, $key, $value));
    }

    /**
     * @param  array                  $items
     * @param  array                  $keys
     * @param  string|float|int|null  $value
     * @param  array                  $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'firstWhereKeysProvider')]
    public function testFirstWhereKeys(array $items, array $keys, string|float|int|null $value, array $expected): void
    {
        $this->assertSame($expected, Arr::firstWhereKeys($items, $keys, $value));
    }

    /**
     * @param  array  $items
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'flattenProvider')]
    public function testFlatten(array $items, array $expected): void
    {
        $this->assertSame($expected, Arr::flatten($items));
    }

    /**
     * @param  array                  $items
     * @param  string                 $key
     * @param  string|float|int|null  $value
     * @param  array                  $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'whereProvider')]
    public function testWhere(array $items, string $key, string|float|int|null $value, array $expected): void
    {
        $this->assertSame($expected, Arr::where($items, $key, $value));
    }

    /**
     * @param  array   $items
     * @param  string  $key
     * @param  array   $values
     * @param  array   $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'whereInProvider')]
    public function testWhereIn(array $items, string $key, array $values, array $expected): void
    {
        $this->assertSame($expected, Arr::whereIn($items, $key, $values));
    }

    /**
     * @param  array   $items
     * @param  string  $key
     * @param  array   $values
     * @param  array   $expected
     * @return void
     */
    #[DataProviderExternal(ArrDataProvider::class, 'whereNotInProvider')]
    public function testWhereNotIn(array $items, string $key, array $values, array $expected): void
    {
        $this->assertSame($expected, Arr::whereNotIn($items, $key, $values));
    }
}
