<?php



use Dotenv\Dotenv;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
 
    public static function setUpBeforeClass(): void
    {
        echo "DEV::::::::::::::: ".env('APP_ENV');
        parent::setUpBeforeClass();
    }
 
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
