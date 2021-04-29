<?php

namespace App\Entity;

use App\Repository\CardsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardsRepository::class)
 */
class Cards
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
    private $question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $answer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $FirstDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $rappelDate;

    /**
     * @ORM\ManyToOne(targetEntity=TitleCards::class, inversedBy="cards")
     */
    private $titleOfCards;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getFirstDate(): ?\DateTimeInterface
    {
        return $this->FirstDate;
    }

    public function setFirstDate(\DateTimeInterface $FirstDate): self
    {
        $this->FirstDate = $FirstDate;

        return $this;
    }

    public function getRappelDate(): ?\DateTimeInterface
    {
        return $this->rappelDate;
    }

    public function setRappelDate(\DateTimeInterface $rappelDate): self
    {
        $this->rappelDate = $rappelDate;

        return $this;
    }

    public function getTitleOfCards(): ?TitleCards
    {
        return $this->titleOfCards;
    }

    public function setTitleOfCards(?TitleCards $titleOfCards): self
    {
        $this->titleOfCards = $titleOfCards;

        return $this;
    }
}
