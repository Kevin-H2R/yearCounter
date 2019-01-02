<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActionRepository")
 */
class Action
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $increased;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Counter", inversedBy="actions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $counterId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncreased(): ?bool
    {
        return $this->increased;
    }

    public function setIncreased(bool $increased): self
    {
        $this->increased = $increased;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCounterId(): ?Counter
    {
        return $this->counterId;
    }

    public function setCounterId(?Counter $counterId): self
    {
        $this->counterId = $counterId;

        return $this;
    }
}
