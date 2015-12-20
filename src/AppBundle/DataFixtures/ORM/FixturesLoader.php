<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtures\Fixtures\Loader;

class FixturesLoader extends Loader
{
    /**
     * Returns an array of file paths to fixtures
     *
     * @return array<string>
     */
    protected function getFixtures()
    {
        return [
            __DIR__ . '/dev/teams.yml',
            __DIR__ . '/dev/players.yml',
            __DIR__ . '/dev/trainers.yml',
        ];
    }
}