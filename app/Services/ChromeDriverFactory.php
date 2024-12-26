<?php

namespace App\Services;

use App\Contracts\ChromeDriverFactoryInterface;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\Chrome\ChromeProcess;
use Laravel\Dusk\Browser;
use Exception;

class ChromeDriverFactory implements ChromeDriverFactoryInterface
{
    public Browser $browser;
    public RemoteWebDriver $driver;

    public function __construct()
    {
        $chromeProcess = (new ChromeProcess("vendor/laravel/dusk/bin/chromedriver-linux"))
            ->toProcess(['--port=9515']);
        $chromeProcess->start();

        $this->waitForChromeDriver();

        $options = (new ChromeOptions)->addArguments(collect([
            "--window-size=1920,1080",
            "--disable-search-engine-choice-screen",
            "--disable-gpu",
            "--headless=new",
            "--enable-file-cookies"
        ])->all())->setExperimentalOption('prefs', [
            'download.default_directory' => storage_path('app/public/temp-downloads'),
        ]);

        $this->driver = RemoteWebDriver::create(
            'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                $options
            )
        );

        $this->browser = new Browser($this->driver);
    }

    public function __destruct()
    {
        $this->browser->quit();
    }

    protected function waitForChromeDriver($timeout = 30)
    {
        $start = time();
        while (time() - $start < $timeout) {
            if (@fsockopen('localhost', 9515)) {
                return true;
            }
            sleep(1);
        }
        throw new Exception("ChromeDriver did not start within {$timeout} seconds.");
    }
}
