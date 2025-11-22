<?php

declare(strict_types=1);

namespace Shimomo\Helper\Tests;

/**
 * @author shimomo
 */
final class ArrDataProvider
{
    /**
     * @psalm-return list<array{
     *     items: list<array<string, int|float|string|null>>,
     *     key: string,
     *     value: int|float|string|null,
     *     expected: array<string, int|float|string|null>
     * }>
     *
     * @return array
     */
    public static function firstWhereProvider(): array
    {
        $items = [
            ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0],
            ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5],
            ['number' => 3, 'name' => 'ninjaC', 'weight' => 70.0],
        ];

        return [
            ['items' => $items, 'key' => 'number', 'value' => 1, 'expected' => ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]],
            ['items' => $items, 'key' => 'number', 'value' => 2, 'expected' => ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]],
            ['items' => $items, 'key' => 'name', 'value' => 'ninjaA', 'expected' => ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]],
            ['items' => $items, 'key' => 'name', 'value' => 'ninjaB', 'expected' => ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]],
            ['items' => $items, 'key' => 'weight', 'value' => 50.0, 'expected' => ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]],
            ['items' => $items, 'key' => 'weight', 'value' => 60.5, 'expected' => ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]],
        ];
    }

    /**
     * @psalm-return list<array{
     *     items: list<array<string, int|float|string|null>>,
     *     keys: list<string>,
     *     value: int|float|string|null,
     *     expected: array<string, int|float|string|null>
     * }>
     *
     * @return array
     */
    public static function firstWhereKeysProvider(): array
    {
        $items = [
            ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0],
            ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5],
            ['number' => 3, 'name' => 'ninjaC', 'weight' => 70.0],
        ];

        return [
            ['items' => $items, 'keys' => ['number'], 'value' => 1, 'expected' => ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]],
            ['items' => $items, 'keys' => ['number'], 'value' => 2, 'expected' => ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]],
            ['items' => $items, 'keys' => ['number', 'name'], 'value' => 'ninjaA', 'expected' => ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]],
            ['items' => $items, 'keys' => ['number', 'name'], 'value' => 'ninjaB', 'expected' => ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]],
            ['items' => $items, 'keys' => ['number', 'name', 'weight'], 'value' => 50.0, 'expected' => ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]],
            ['items' => $items, 'keys' => ['number', 'name', 'weight'], 'value' => 60.5, 'expected' => ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]],
        ];
    }

    /**
     * @psalm-return list<array{
     *     items: array<array-key, mixed>,
     *     expected: list<mixed>
     * }>
     *
     * @return array
     */
    public static function flattenProvider(): array
    {
        return [
            ['items' => [1], 'expected' => [1]],
            ['items' => [1, [2]], 'expected' => [1, 2]],
            ['items' => [1, [2, ['number' => 3]]], 'expected' => [1, 2, 3]],
        ];
    }

    /**
     * @psalm-return list<array{
     *     items: list<array<string, int|float|string|null>>,
     *     key: string,
     *     value: int|float|string|null,
     *     expected: list<array<string, int|float|string|null>>
     * }>
     *
     * @return array
     */
    public static function whereProvider(): array
    {
        $items = [
            ['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0],
            ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5],
            ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5],
        ];

        return [
            ['items' => $items, 'key' => 'number', 'value' => 1, 'expected' => [['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]]],
            ['items' => $items, 'key' => 'number', 'value' => 2, 'expected' => [['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5], ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]]],
            ['items' => $items, 'key' => 'name', 'value' => 'ninjaA', 'expected' => [['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]]],
            ['items' => $items, 'key' => 'name', 'value' => 'ninjaB', 'expected' => [['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5], ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]]],
            ['items' => $items, 'key' => 'weight', 'value' => 50.0, 'expected' => [['number' => 1, 'name' => 'ninjaA', 'weight' => 50.0]]],
            ['items' => $items, 'key' => 'weight', 'value' => 60.5, 'expected' => [['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5], ['number' => 2, 'name' => 'ninjaB', 'weight' => 60.5]]],
        ];
    }

    /**
     * @psalm-return list<array{
     *     items: list<array<string, int|float|string|null>>,
     *     key: string,
     *     values: list<int|float|string|null>,
     *     expected: list<array<string, int|float|string|null>>
     * }>
     *
     * @return array
     */
    public static function whereInProvider(): array
    {
        $items = [
            ['number' => 1, 'name' => 'ninjaA'],
            ['number' => 2, 'name' => 'ninjaB'],
            ['number' => 3, 'name' => 'ninjaC'],
        ];

        return [
            ['items' => $items, 'key' => 'number', 'values' => [1], 'expected' => [['number' => 1, 'name' => 'ninjaA']]],
            ['items' => $items, 'key' => 'number', 'values' => [1, 2], 'expected' => [['number' => 1, 'name' => 'ninjaA'], ['number' => 2, 'name' => 'ninjaB']]],
            ['items' => $items, 'key' => 'name', 'values' => ['ninjaA'], 'expected' => [['number' => 1, 'name' => 'ninjaA']]],
            ['items' => $items, 'key' => 'name', 'values' => ['ninjaA', 'ninjaB'], 'expected' => [['number' => 1, 'name' => 'ninjaA'], ['number' => 2, 'name' => 'ninjaB']]],
        ];
    }

    /**
     * @psalm-return list<array{
     *     items: list<array<string, int|float|string|null>>,
     *     key: string,
     *     values: list<int|float|string|null>,
     *     expected: list<array<string, int|float|string|null>>
     * }>
     *
     * @return array
     */
    public static function whereNotInProvider(): array
    {
        $items = [
            ['number' => 1, 'name' => 'ninjaA'],
            ['number' => 2, 'name' => 'ninjaB'],
            ['number' => 3, 'name' => 'ninjaC'],
        ];

        return [
            ['items' => $items, 'key' => 'number', 'values' => [1], 'expected' => [['number' => 2, 'name' => 'ninjaB'], ['number' => 3, 'name' => 'ninjaC']]],
            ['items' => $items, 'key' => 'number', 'values' => [1, 2], 'expected' => [['number' => 3, 'name' => 'ninjaC']]],
            ['items' => $items, 'key' => 'name', 'values' => ['ninjaA'], 'expected' => [['number' => 2, 'name' => 'ninjaB'], ['number' => 3, 'name' => 'ninjaC']]],
            ['items' => $items, 'key' => 'name', 'values' => ['ninjaA', 'ninjaB'], 'expected' => [['number' => 3, 'name' => 'ninjaC']]],
        ];
    }
}
