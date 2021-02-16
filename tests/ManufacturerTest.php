<?php


namespace App\Tests;

use App\Entity\Manufacturer;
use PHPUnit\Framework\TestCase;

class ManufacturerTest extends TestCase
{
    public function testSettingTitle()
    {
        $manufacturer = new Manufacturer();
        $title = "Man-1";

        $manufacturer->setTitle($title);
        $this->assertEquals($title, $manufacturer->getTitle());
    }

    public function testSettingUrl()
    {
        $manufacturer = new Manufacturer();
        $url = "fake.url.com/1";

        $manufacturer->setUrl($url);
        $this->assertEquals($url, $manufacturer->getUrl());
    }
}
