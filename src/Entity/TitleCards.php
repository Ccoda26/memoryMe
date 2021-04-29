<?php

namespace App\Entity;

use App\Repository\TitleCardsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TitleCardsRepository::class)
 */
class TitleCards
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
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="titleCards")
     */
    private $userList;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="cardsTitle")
     */
    private $cateTitle;

    /**
     * @ORM\OneToMany(targetEntity=Cards::class, mappedBy="titleOfCards")
     */
    private $cards;

    public function __construct()
    {
        $this->userList = new ArrayCollection();
        $this->cards = new ArrayCollection();
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

    /**
     * @return Collection|user[]
     */
    public function getUserList(): Collection
    {
        return $this->userList;
    }

    public function addUserList(user $userList): self
    {
        if (!$this->userList->contains($userList)) {
            $this->userList[] = $userList;
        }

        return $this;
    }

    public function removeUserList(user $userList): self
    {
        $this->userList->removeElement($userList);

        return $this;
    }

    public function getCateTitle(): ?Category
    {
        return $this->cateTitle;
    }

    public function setCateTitle(?Category $cateTitle): self
    {
        $this->cateTitle = $cateTitle;

        return $this;
    }

    /**
     * @return Collection|Cards[]
     */
    public function getCards(): Collection
    {
        return $this->cards;
    }

    public function addCard(Cards $card): self
    {
        if (!$this->cards->contains($card)) {
            $this->cards[] = $card;
            $card->setTitleOfCards($this);
        }

        return $this;
    }

    public function removeCard(Cards $card): self
    {
        if ($this->cards->removeElement($card)) {
            // set the owning side to null (unless already changed)
            if ($card->getTitleOfCards() === $this) {
                $card->setTitleOfCards(null);
            }
        }

        return $this;
    }
}
