<?php

declare(strict_types=1);

/*
 * This file is part of the tenancy/tenancy package.
 *
 * Copyright Tenancy for Laravel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://tenancy.dev
 * @see https://github.com/tenancy
 */

namespace Tenancy\Tests\Misc\Spy\Feature;

use Illuminate\Support\Facades\Artisan;
use Tenancy\Misc\Spy\CLI\Commands;
use Tenancy\Misc\Spy\Provider;
use Tenancy\Testing\TestCase;

class ProviderTest extends TestCase
{
    /** @var array */
    protected $additionalProviders = [Provider::class];

    /** @test */
    public function the_commands_are_registered()
    {
        foreach ([
            Commands\Show::class,
        ] as $commandClass) {
            $this->assertTrue($this->commandExists($commandClass));
        }
    }

    /**
     * Checks if a command is registered.
     *
     * @param string $commandClass
     *
     * @return bool
     */
    private function commandExists(string $commandClass)
    {
        foreach (Artisan::all() as $command) {
            if (get_class($command) == $commandClass) {
                return true;
            }
        }

        return false;
    }
}