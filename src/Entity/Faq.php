<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FaqRepository")
 */
class Faq
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $rate;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="FaqComment", mappedBy="faqId")
     */
    private $commentFaqs;

    public function __construct()
    {
        $this->commentFaqs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
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
     * @return Collection|FaqComment[]
     */
    public function getCommentFaqs(): Collection
    {
        return $this->commentFaqs;
    }

    public function addCommentFaq(FaqComment $commentFaq): self
    {
        if (!$this->commentFaqs->contains($commentFaq)) {
            $this->commentFaqs[] = $commentFaq;
            $commentFaq->setFaqId($this);
        }

        return $this;
    }

    public function removeCommentFaq(FaqComment $commentFaq): self
    {
        if ($this->commentFaqs->contains($commentFaq)) {
            $this->commentFaqs->removeElement($commentFaq);
            // set the owning side to null (unless already changed)
            if ($commentFaq->getFaqId() === $this) {
                $commentFaq->setFaqId(null);
            }
        }

        return $this;
    }
}
