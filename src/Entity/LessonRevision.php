<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LessonRevisionRepository;
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
    #[Orm\ManyToOne(targetEntity: Lesson::class, inversedBy: 'tasks')]
    public Lesson $lesson;

    #[ORM\Column(length: 255, nullable: false)]
    public string $title;

    #[ORM\Column(type: 'text', nullable: false)]
    public string $description;

    #[ORM\Column(length: 11, nullable: false)]
    public string $revisionNumber;

    #[ORM\Column(nullable: false)]
    public int $revisionOrder;
}