<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=TitleCards::class, mappedBy="cateTitle")
     */
    private $cardsTitle;

    public function __construct()
    {
        $this->cardsTitle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|TitleCards[]
     */
    public function getCardsTitle(): Collection
    {
        return $this->cardsTitle;
    }

    public function addCardsTitle(TitleCards $cardsTitle): self
    {
        if (!$this->cardsTitle->contains($cardsTitle)) {
            $this->cardsTitle[] = $cardsTitle;
            $cardsTitle->setCateTitle($this);
        }

        return $this;
    }

    public function removeCardsTitle(TitleCards $cardsTitle): self
    {
        if ($this->cardsTitle->removeElement($cardsTitle)) {
            // set the owning side to null (unless already changed)
            if ($cardsTitle->getCateTitle() === $this) {
                $cardsTitle->setCateTitle(null);
            }
        }

        return $this;
    }
}
