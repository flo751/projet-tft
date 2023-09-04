<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10000)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creat_at = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $useid = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Catégorie $catégorie = null;

    #[ORM\OneToMany(mappedBy: 'postid', targetEntity: Comm::class)]
    private Collection $comms;

    public function __construct()
    {
        $this->comms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatAt(): ?\DateTimeImmutable
    {
        return $this->creat_at;
    }

    public function setCreatAt(\DateTimeImmutable $creat_at): static
    {
        $this->creat_at = $creat_at;

        return $this;
    }

    public function getUseid(): ?Utilisateurs
    {
        return $this->useid;
    }

    public function setUseid(?Utilisateurs $useid): static
    {
        $this->useid = $useid;

        return $this;
    }

    public function getCatégorie(): ?Catégorie
    {
        return $this->catégorie;
    }

    public function setCatégorie(?Catégorie $catégorie): static
    {
        $this->catégorie = $catégorie;

        return $this;
    }

    /**
     * @return Collection<int, Comm>
     */
    public function getComms(): Collection
    {
        return $this->comms;
    }

    public function addComm(Comm $comm): static
    {
        if (!$this->comms->contains($comm)) {
            $this->comms->add($comm);
            $comm->setPostid($this);
        }

        return $this;
    }

    public function removeComm(Comm $comm): static
    {
        if ($this->comms->removeElement($comm)) {
            // set the owning side to null (unless already changed)
            if ($comm->getPostid() === $this) {
                $comm->setPostid(null);
            }
        }

        return $this;
    }
}
