<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IssueRepository")
 */
class Issue
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $body;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommentIssues", mappedBy="issueId")
     */
    private $commentIssues;

    public function __construct()
    {
        $this->commentIssues = new ArrayCollection();
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

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

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

    /**
     * @return Collection|CommentIssues[]
     */
    public function getCommentIssues(): Collection
    {
        return $this->commentIssues;
    }

    public function addCommentIssue(CommentIssues $commentIssue): self
    {
        if (!$this->commentIssues->contains($commentIssue)) {
            $this->commentIssues[] = $commentIssue;
            $commentIssue->setIssueId($this);
        }

        return $this;
    }

    public function removeCommentIssue(CommentIssues $commentIssue): self
    {
        if ($this->commentIssues->contains($commentIssue)) {
            $this->commentIssues->removeElement($commentIssue);
            // set the owning side to null (unless already changed)
            if ($commentIssue->getIssueId() === $this) {
                $commentIssue->setIssueId(null);
            }
        }

        return $this;
    }
}
