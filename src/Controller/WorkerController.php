<?php

namespace App\Controller;

use App\Entity\Worker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'Workers')]
#[Route('/workers', name: 'workers_')]
class WorkerController extends AbstractController
{
    #[Route('', name: 'getAllWorkers', methods: 'GET')]
    public function GetWorkers(EntityManagerInterface $entityManager): Response
    {
        $workers = $entityManager->getRepository(Worker::class)->findAll();
        if (!$workers) {
            return $this->json(['error' => 'No worker found'], 404);
        }
        return $this->json($workers);
    }
}
