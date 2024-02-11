<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Task;
use App\Entity\TaskRevision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TaskRevisionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskRevision::class);
    }

    public function findActualByLesson(Task $task): TaskRevision
    {
        return $this->findOneBy(
            criteria: ['task' => $task],
            orderBy: ['revisionOrder' => 'desc'],
        );
    }
}