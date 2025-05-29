<?php

declare(strict_types=1);

namespace Shimomo\Helper;

/**
 * @author shimomo
 */
final class Arr
{
    /**
     * @param  array                  $items
     * @param  string                 $key
     * @param  string|float|int|null  $value
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
     * @param  array                  $items
     * @param  array                  $keys
     * @param  string|float|int|null  $value
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
     * @param  array  $items
     * @return array
     */
    public static function flatten(array $items): array
    {
        $response = [];
        array_walk_recursive($items, function ($item) use (&$response) {
            $response[] = $item;
        });

        return $response;
    }

    /**
     * @param  array                  $items
     * @param  string                 $key
     * @param  string|float|int|null  $value
     * @return array
     */
    public static function where(array $items, string $key, string|float|int|null $value): array
    {
        return array_values(array_filter($items, function ($item) use ($key, $value) {
            return isset($item[$key]) && $item[$key] === $value;
        }));
    }

    /**
     * @param  array   $items
     * @param  string  $key
     * @param  array   $values
     * @return array
     */
    public static function whereIn(array $items, string $key, array $values): array
    {
        return array_values(array_filter($items, function ($item) use ($key, $values) {
            return isset($item[$key]) && in_array($item[$key], $values, true);
        }));
    }

    /**
     * @param  array   $items
     * @param  string  $key
     * @param  array   $values
     * @return array
     */
    public static function whereNotIn(array $items, string $key, array $values): array
    {
        return array_values(array_filter($items, function ($item) use ($key, $values) {
            return isset($item[$key]) && !in_array($item[$key], $values, true);
        }));
    }
}
