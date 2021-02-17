<?php

namespace App\Entity;

use App\Repository\MedicineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicineRepository::class)
 */
class Medicine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Manufacturer::class, inversedBy="medicines")
     */
    private $manufacturer;

    /**
     * @ORM\OneToMany(targetEntity=CurrentSubstance::class, mappedBy="medicine")
     */
    private $currentSubstance;

    /**
     * @ORM\Column(type="float")
     */
    private $price;


    public function __construct()
    {
        $this->currentSubstance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getManufacturer(): ?Manufacturer
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?Manufacturer $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * @return Collection|CurrentSubstance[]
     */
    public function getCurrentSubstance(): Collection
    {
        return $this->currentSubstance;
    }

    public function addCurrentSubstanceId(CurrentSubstance $currentSubstanceId): self
    {
        if (!$this->currentSubstance->contains($currentSubstanceId)) {
            $this->currentSubstance[] = $currentSubstanceId;
            $currentSubstanceId->setMedicine($this);
        }

        return $this;
    }

    public function removeCurrentSubstanceId(CurrentSubstance $currentSubstanceId): self
    {
        if ($this->currentSubstance->removeElement($currentSubstanceId)) {
            // set the owning side to null (unless already changed)
            if ($currentSubstanceId->getMedicine() === $this) {
                $currentSubstanceId->setMedicine(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->title;
    }
}
