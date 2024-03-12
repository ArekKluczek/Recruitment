<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AuthorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AuthorsRepository::class)]
class Authors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: News::class, inversedBy: 'authors')]
    #[Groups(['author_read'])]
    private Collection $news;

    /**
     * Authors entity construct.
     */
    public function __construct()
    {
        $this->news = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, News>
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    /**
     * @param News $news
     * @return $this
     */
    public function addNews(News $news): static
    {
        if (!$this->news->contains($news)) {
            $this->news->add($news);
        }

        return $this;
    }

    /**
     * @param News $news
     * @return $this
     */
    public function removeNews(News $news): static
    {
        $this->news->removeElement($news);

        return $this;
    }
}
