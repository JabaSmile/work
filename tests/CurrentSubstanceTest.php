<?php


namespace App\Tests;

use App\Entity\CurrentSubstance;
use App\Entity\Manufacturer;
use App\Entity\Medicine;
use PHPUnit\Framework\TestCase;

class CurrentSubstanceTest extends TestCase
{
    public function testSettingTitle()
    {
        $current_substance = new CurrentSubstance();
        $title = "Nitrogen";

        $current_substance->setTitle($title);
        $this->assertEquals($title, $current_substance->getTitle());
    }

    public function testSettingMedicine()
    {
        $current_substance = new CurrentSubstance();

        $manufacturer = new Manufacturer();
        $manufacturer->setTitle('Man-1');
        $manufacturer->setUrl('Url/1');

        $medicine = new Medicine();
        $medicine->setTitle('Med-1');
        $medicine->setManufacturer($manufacturer);
        $medicine->setPrice(12.5);


        $current_substance->setMedicine($medicine);
        $this->assertEquals($medicine, $current_substance->getMedicine());
    }
}
