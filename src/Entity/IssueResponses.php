<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResponseIssueRepository")
 */
class IssueResponses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\IssueComments", inversedBy="responseIssues")
     */
    private $commentIssueId;

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
        $this->commentIssueId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|IssueComments[]
     */
    public function getCommentIssueId(): Collection
    {
        return $this->commentIssueId;
    }

    public function addCommentIssueId(IssueComments $commentIssueId): self
    {
        if (!$this->commentIssueId->contains($commentIssueId)) {
            $this->commentIssueId[] = $commentIssueId;
        }

        return $this;
    }

    public function removeCommentIssueId(IssueComments $commentIssueId): self
    {
        if ($this->commentIssueId->contains($commentIssueId)) {
            $this->commentIssueId->removeElement($commentIssueId);
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
