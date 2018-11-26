<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentIssuesRepository")
 */
class CommentIssues
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Issue", inversedBy="commentIssues")
     */
    private $issueId;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="integer")
     */
    private $rate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ResponseIssue", mappedBy="commentIssueId")
     */
    private $responseIssues;

    public function __construct()
    {
        $this->responseIssues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIssueId(): ?Issue
    {
        return $this->issueId;
    }

    public function setIssueId(?Issue $issueId): self
    {
        $this->issueId = $issueId;

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

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

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
     * @return Collection|ResponseIssue[]
     */
    public function getResponseIssues(): Collection
    {
        return $this->responseIssues;
    }

    public function addResponseIssue(ResponseIssue $responseIssue): self
    {
        if (!$this->responseIssues->contains($responseIssue)) {
            $this->responseIssues[] = $responseIssue;
            $responseIssue->addCommentIssueId($this);
        }

        return $this;
    }

    public function removeResponseIssue(ResponseIssue $responseIssue): self
    {
        if ($this->responseIssues->contains($responseIssue)) {
            $this->responseIssues->removeElement($responseIssue);
            $responseIssue->removeCommentIssueId($this);
        }

        return $this;
    }
}
