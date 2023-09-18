<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
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

    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'projects', cascade: ['persist'], orphanRemoval: false)]
    private Collection $images;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'projects')]
    private Collection $articles;

    #[ORM\ManyToMany(targetEntity: Technology::class, inversedBy: 'projects')]
    private Collection $technologies;

    #[ORM\Column(nullable: true)]
    private ?int $ranking = null;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->technologies = new ArrayCollection();
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
     * @return Collection<int, Image>
     */
    public function getImage(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        $this->images->removeElement($image);

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->addProject($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            $article->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Technology>
     */
    public function getTechnology(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(Technology $technology): static
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies->add($technology);
        }

        return $this;
    }

    public function removeTechnology(Technology $technology): static
    {
        $this->technologies->removeElement($technology);

        return $this;
    }

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(?int $ranking): static
    {
        $this->ranking = $ranking;

        return $this;
    }
}
