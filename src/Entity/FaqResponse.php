<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FaqResponseRepository")
 */
class FaqResponse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FaqResponse", inversedBy="faqResponses")
     */
    private $faqComment;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FaqResponse", mappedBy="faqComment")
     */
    private $faqResponses;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isChild;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->faqComment = new ArrayCollection();
        $this->faqResponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|self[]
     */
    public function getFaqComment(): Collection
    {
        return $this->faqComment;
    }

    public function addFaqComment(self $faqComment): self
    {
        if (!$this->faqComment->contains($faqComment)) {
            $this->faqComment[] = $faqComment;
        }

        return $this;
    }

    public function removeFaqComment(self $faqComment): self
    {
        if ($this->faqComment->contains($faqComment)) {
            $this->faqComment->removeElement($faqComment);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getFaqResponses(): Collection
    {
        return $this->faqResponses;
    }

    public function addFaqResponse(self $faqResponse): self
    {
        if (!$this->faqResponses->contains($faqResponse)) {
            $this->faqResponses[] = $faqResponse;
            $faqResponse->addFaqComment($this);
        }

        return $this;
    }

    public function removeFaqResponse(self $faqResponse): self
    {
        if ($this->faqResponses->contains($faqResponse)) {
            $this->faqResponses->removeElement($faqResponse);
            $faqResponse->removeFaqComment($this);
        }

        return $this;
    }

    public function getIsChild(): ?bool
    {
        return $this->isChild;
    }

    public function setIsChild(bool $isChild): self
    {
        $this->isChild = $isChild;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
