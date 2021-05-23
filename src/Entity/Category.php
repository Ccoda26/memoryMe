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
     * @ORM\OneToMany(targetEntity=TitleCards::class, mappedBy="categoryList", cascade={"persist"})
     */
    private $titleCards;

    public function __construct()
    {
        $this->titleCards = new ArrayCollection();
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
    public function getTitleCards(): Collection
    {
        return $this->titleCards;
    }

    public function addTitleCard(TitleCards $titleCard): self
    {
        if (!$this->titleCards->contains($titleCard)) {
            $this->titleCards[] = $titleCard;
            $titleCard->setCategoryList($this);
        }

        return $this;
    }

    public function removeTitleCard(TitleCards $titleCard): self
    {
        if ($this->titleCards->removeElement($titleCard)) {
            // set the owning side to null (unless already changed)
            if ($titleCard->getCategoryList() === $this) {
                $titleCard->setCategoryList(null);
            }
        }

        return $this;
    }

}
