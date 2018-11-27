<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\IssueRepository")
 *
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
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
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
     * @ORM\OneToMany(targetEntity="App\Entity\IssueComments", mappedBy="issueId")
     */
    private $commentIssues;

    /**
     * @var int
     * @ORM\OneToOne(targetEntity="App\Entity\Status")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $statusId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="issues")
     */
    private $user;


    public function __construct()
    {
        $this->commentIssues = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
        $this->setStatusId(1);
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
     * @return Collection|IssueComments[]
     */
    public function getCommentIssues(): Collection
    {
        return $this->commentIssues;
    }

    public function addCommentIssue(IssueComments $commentIssue): self
    {
        if (!$this->commentIssues->contains($commentIssue)) {
            $this->commentIssues[] = $commentIssue;
            $commentIssue->setIssueId($this);
        }

        return $this;
    }

    public function removeCommentIssue(IssueComments $commentIssue): self
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }

    /**
     * @param int $statusId
     */
    public function setStatusId(int $statusId): void
    {
        $this->statusId = $statusId;
    }
}
