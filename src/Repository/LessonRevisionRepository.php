<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Lesson;
use App\Entity\LessonRevision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LessonRevisionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LessonRevision::class);
    }

    public function findActualByLesson(Lesson $lesson): LessonRevision
    {
        return $this->findOneBy(
            criteria: ['lesson' => $lesson],
            orderBy: ['revisionOrder' => 'desc'],
        );
    }
}
