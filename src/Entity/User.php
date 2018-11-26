<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Issue", mappedBy="user")
     */
    private $issues;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IssueComments", mappedBy="user")
     */
    private $commentIssues;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FaqComment", mappedBy="userId")
     */
    private $commentFaqs;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
        $this->commentIssues = new ArrayCollection();
        $this->commentFaqs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Issue[]
     */
    public function getIssues(): Collection
    {
        return $this->issues;
    }

    public function addIssue(Issue $issue): self
    {
        if (!$this->issues->contains($issue)) {
            $this->issues[] = $issue;
            $issue->setUser($this);
        }

        return $this;
    }

    public function removeIssue(Issue $issue): self
    {
        if ($this->issues->contains($issue)) {
            $this->issues->removeElement($issue);
            // set the owning side to null (unless already changed)
            if ($issue->getUser() === $this) {
                $issue->setUser(null);
            }
        }

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
            $commentIssue->setUser($this);
        }

        return $this;
    }

    public function removeCommentIssue(CommentIssues $commentIssue): self
    {
        if ($this->commentIssues->contains($commentIssue)) {
            $this->commentIssues->removeElement($commentIssue);
            // set the owning side to null (unless already changed)
            if ($commentIssue->getUser() === $this) {
                $commentIssue->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommentFaq[]
     */
    public function getCommentFaqs(): Collection
    {
        return $this->commentFaqs;
    }

    public function addCommentFaq(CommentFaq $commentFaq): self
    {
        if (!$this->commentFaqs->contains($commentFaq)) {
            $this->commentFaqs[] = $commentFaq;
            $commentFaq->setUserId($this);
        }

        return $this;
    }

    public function removeCommentFaq(CommentFaq $commentFaq): self
    {
        if ($this->commentFaqs->contains($commentFaq)) {
            $this->commentFaqs->removeElement($commentFaq);
            // set the owning side to null (unless already changed)
            if ($commentFaq->getUserId() === $this) {
                $commentFaq->setUserId(null);
            }
        }

        return $this;
    }
}
