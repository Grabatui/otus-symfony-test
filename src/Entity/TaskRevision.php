<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaskRevisionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\UniqueConstraint(fields: ['task', 'revisionNumber'])]
#[ORM\Entity(repositoryClass: TaskRevisionRepository::class)]
class TaskRevision
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\JoinColumn(nullable: false)]
    #[Orm\ManyToOne(targetEntity: Task::class, inversedBy: 'taskRevisions')]
    public Task $task;

    #[ORM\JoinColumn(nullable: false)]
    #[Orm\ManyToOne(targetEntity: LessonRevision::class)]
    public LessonRevision $lessonRevision;

    #[ORM\Column(length: 255, nullable: false)]
    public string $title;

    #[ORM\Column(type: 'text', nullable: false)]
    public string $description;

    #[ORM\Column(length: 11, nullable: false)]
    public string $revisionNumber;

    #[ORM\Column(nullable: false)]
    public int $revisionOrder;
}