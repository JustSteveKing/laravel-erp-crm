<?php

namespace JustSteveKing\Laravel\ERP\CRM\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use JustSteveKing\Laravel\ERP\CRM\CRMServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JustSteveKing\\Laravel\\ERP\\CRM\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            CRMServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        include_once __DIR__.'/../database/migrations/create_laravel-erp-crm_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
