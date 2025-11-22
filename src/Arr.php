<?php

declare(strict_types=1);

namespace Shimomo\Helper;

/**
 * @author shimomo
 */
final class Arr
{
    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param int|float|string|null $value
     * @psalm-return array<string, int|float|string|null>|null
     *
     * @param array $items
     * @param string $key
     * @param int|float|string|null $value
     * @return array|null
     */
    public static function firstWhere(array $items, string $key, string|float|int|null $value): ?array
    {
        foreach ($items as $item) {
            if (isset($item[$key]) && $item[$key] === $value) {
                return $item;
            }
        }

        return null;
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param list<string> $keys
     * @psalm-param int|float|string|null $value
     * @psalm-return array<string, int|float|string|null>|null
     *
     * @param array $items
     * @param array $keys
     * @param int|float|string|null $value
     * @return array|null
     */
    public static function firstWhereKeys(array $items, array $keys, string|float|int|null $value): ?array
    {
        foreach ($keys as $key) {
            $item = self::firstWhere($items, $key, $value);
            if (!is_null($item)) {
                return $item;
            }
        }

        return null;
    }

    /**
     * @psalm-template T
     * @psalm-param array<array-key, T|array> $items
     * @psalm-return list<T>
     *
     * @param array $items
     * @return array
     */
    public static function flatten(array $items): array
    {
        $response = [];
        array_walk_recursive($items, function (mixed $item) use (&$response) {
            /** @psalm-var T */
            $response[] = $item;
        });

        return $response;
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param int|float|string|null $value
     * @psalm-return list<array<string, int|float|string|null>>
     *
     * @param array $items
     * @param string $key
     * @param int|float|string|null $value
     * @return array
     */
    public static function where(array $items, string $key, int|float|string|null $value): array
    {
        return array_values(array_filter($items, function ($item) use ($key, $value) {
            return isset($item[$key]) && $item[$key] === $value;
        }));
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param list<int|float|string|null> $value
     * @psalm-return list<array<string, int|float|string|null>>
     *
     * @param array $items
     * @param string $key
     * @param array $values
     * @return array
     */
    public static function whereIn(array $items, string $key, array $values): array
    {
        return array_values(array_filter($items, function ($item) use ($key, $values) {
            return isset($item[$key]) && in_array($item[$key], $values, true);
        }));
    }

    /**
     * @psalm-param list<array<string, int|float|string|null>> $items
     * @psalm-param string $key
     * @psalm-param list<int|float|string|null> $value
     * @psalm-return list<array<string, int|float|string|null>>
     *
     * @param array $items
     * @param string $key
     * @param array $values
     * @return array
     */
    public static function whereNotIn(array $items, string $key, array $values): array
    {
        return array_values(array_filter($items, function ($item) use ($key, $values) {
            return isset($item[$key]) && !in_array($item[$key], $values, true);
        }));
    }
}
