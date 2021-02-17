<?php


namespace App\Tests;

use App\Entity\Manufacturer;
use App\Entity\Medicine;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedicineTest extends WebTestCase
{
    public function testSettingTitle()
    {
        $medicine = new Medicine();
        $title = "Med-1";

        $medicine->setTitle($title);
        $this->assertEquals($title, $medicine->getTitle());
    }

    public function testSettingPrice()
    {
        $medicine = new Medicine();
        $price = 128.25;

        $medicine->setPrice($price);
        $this->assertEquals($price, $medicine->getPrice());
    }

    public function testSettingManufacturer()
    {
        $medicine = new Medicine();

        $manufacturer = new Manufacturer();
        $manufacturer->setTitle('Man-1');
        $manufacturer->setUrl('fake.url.com/1');

        $medicine->setManufacturer($manufacturer);
        $this->assertEquals($manufacturer, $medicine->getManufacturer());
    }

}
