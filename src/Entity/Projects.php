<?php

namespace App\Entity;

use App\Repository\ProjectsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectsRepository::class)]
class Projects
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website_link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $repository_link = null;

    #[ORM\ManyToMany(targetEntity: Images::class, inversedBy: 'projects', cascade: ['persist'], orphanRemoval: false)]
    private Collection $image;

    #[ORM\ManyToMany(targetEntity: Articles::class, mappedBy: 'project')]
    private Collection $articles;

    #[ORM\ManyToMany(targetEntity: Technologies::class, inversedBy: 'projects')]
    private Collection $technology;

    public function __construct()
    {
        $this->image = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->technology = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getWebsiteLink(): ?string
    {
        return $this->website_link;
    }

    public function setWebsiteLink(?string $website_link): static
    {
        $this->website_link = $website_link;

        return $this;
    }

    public function getRepositoryLink(): ?string
    {
        return $this->repository_link;
    }

    public function setRepositoryLink(?string $repository_link): static
    {
        $this->repository_link = $repository_link;

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Images $image): static
    {
        if (!$this->image->contains($image)) {
            $this->image->add($image);
        }

        return $this;
    }

    public function removeImage(Images $image): static
    {
        $this->image->removeElement($image);

        return $this;
    }

    /**
     * @return Collection<int, Articles>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Articles $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->addProject($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): static
    {
        if ($this->articles->removeElement($article)) {
            $article->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Technologies>
     */
    public function getTechnology(): Collection
    {
        return $this->technology;
    }

    public function addTechnology(Technologies $technology): static
    {
        if (!$this->technology->contains($technology)) {
            $this->technology->add($technology);
        }

        return $this;
    }

    public function removeTechnology(Technologies $technology): static
    {
        $this->technology->removeElement($technology);

        return $this;
    }
}
