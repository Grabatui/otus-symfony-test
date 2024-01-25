<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\JoinColumn(nullable: false)]
    #[Orm\ManyToOne(targetEntity: Lesson::class, inversedBy: 'tasks')]
    public Lesson $lesson;

    /** @var Collection<TaskRevision> */
    #[ORM\OneToMany(mappedBy: 'task', targetEntity: TaskRevision::class)]
    public Collection $taskRevisions;
}
