<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LessonRevisionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\UniqueConstraint(fields: ['lesson', 'revisionNumber'])]
#[ORM\Entity(repositoryClass: LessonRevisionRepository::class)]
class LessonRevision
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\JoinColumn(nullable: false)]
    #[Orm\ManyToOne(targetEntity: Lesson::class, inversedBy: 'lessonRevisions')]
    public Lesson $lesson;

    #[ORM\Column(length: 255, nullable: false)]
    public string $title;

    #[ORM\Column(type: 'text', nullable: false)]
    public string $description;

    #[ORM\Column(length: 11, nullable: false)]
    public string $revisionNumber;

    #[ORM\Column(nullable: false)]
    public int $revisionOrder;

    /** @var Collection<StudentGroup> */
    #[Orm\ManyToMany(targetEntity: StudentGroup::class, mappedBy: 'lessonRevisions')]
    public Collection $studentGroups;

    public function __construct()
    {
        $this->studentGroups = new ArrayCollection();
    }
}