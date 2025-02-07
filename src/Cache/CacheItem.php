<?php
declare(strict_types=1);

namespace ScriptFUSION\Porter\Cache;

use Psr\Cache\CacheItemInterface;

/**
 * @internal Only this library may create instances of this class.
 */
final class CacheItem implements CacheItemInterface
{
    private $key;

    private $value;

    private $hit;

    private function __construct(string $key, $value, bool $hit)
    {
        $this->key = $key;
        $this->value = $value;
        $this->hit = $hit;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->value;
    }

    public function isHit(): bool
    {
        return $this->hit;
    }

    /**
     * @param mixed $value
     */
    public function set($value): static
    {
        $this->value = $value;

        return $this;
    }

    public function expiresAt($expiration): static
    {
        throw new NotImplementedException;
    }

    public function expiresAfter($time): static
    {
        throw new NotImplementedException;
    }
}
