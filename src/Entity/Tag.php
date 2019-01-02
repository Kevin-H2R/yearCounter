<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Counter", mappedBy="tags")
     */
    private $counters;

    public function __construct()
    {
        $this->counters = new ArrayCollection();
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
     * @return Collection|Counter[]
     */
    public function getCounters(): Collection
    {
        return $this->counters;
    }

    public function addCounter(Counter $counter): self
    {
        if (!$this->counters->contains($counter)) {
            $this->counters[] = $counter;
            $counter->addTag($this);
        }

        return $this;
    }

    public function removeCounter(Counter $counter): self
    {
        if ($this->counters->contains($counter)) {
            $this->counters->removeElement($counter);
            $counter->removeTag($this);
        }

        return $this;
    }
}
