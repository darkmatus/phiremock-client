<?php
/**
 * This file is part of Phiremock.
 *
 * Phiremock is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Phiremock is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Phiremock.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Mcustiel\Phiremock\Client\Connection;

use InvalidArgumentException;

class Scheme
{
    public const HTTP = 'http';
    public const HTTPS = 'https';

    /** @var string */
    private $scheme;

    public function __construct(string $scheme)
    {
        $this->ensureIsValidScheme($scheme);
        $this->scheme = $scheme;
    }

    public static function createHttp(): Scheme
    {
        return new self(self::HTTP);
    }

    public static function createHttps(): Scheme
    {
        return new self(self::HTTPS);
    }

    public function asString(): string
    {
        return $this->scheme;
    }

    private function ensureIsValidScheme(string $scheme): void
    {
        if (preg_match('/^https?$/', $scheme) !== 1) {
            throw new InvalidArgumentException(sprintf('Invalid scheme %s', $scheme));
        }
    }
}
