<?php

namespace App\Entity;

use App\Repository\CatégorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatégorieRepository::class)]
class Catégorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'catégorie', targetEntity: Post::class)]
    private Collection $idpost;

    public function __construct()
    {
        $this->idpost = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getIdpost(): Collection
    {
        return $this->idpost;
    }

    public function addIdpost(Post $idpost): static
    {
        if (!$this->idpost->contains($idpost)) {
            $this->idpost->add($idpost);
            $idpost->setCatégorie($this);
        }

        return $this;
    }

    public function removeIdpost(Post $idpost): static
    {
        if ($this->idpost->removeElement($idpost)) {
            // set the owning side to null (unless already changed)
            if ($idpost->getCatégorie() === $this) {
                $idpost->setCatégorie(null);
            }
        }

        return $this;
    }
}
