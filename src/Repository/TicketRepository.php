<?php

namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Contracts\ITicketRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method Ticket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ticket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ticket[]    findAll()
 * @method Ticket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketRepository extends ServiceEntityRepository implements ITicketRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ticket::class);
    }

    // /**
    //  * @return Ticket[] Returns an array of Ticket objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ticket
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function createTicket(Ticket $ticket) : Ticket
    {
        $this->_em->persist($ticket);
        $this->_em->flush();

        return $ticket;

    }



    public function assignTicket(Ticket $ticket , $asignee_id  ) : void
    {
        $ticket->setAssignee($asignee_id);
        $this->_em->persist($ticket);
        $this->_em->flush();
    }

    public function closeTicket(Ticket $ticket, $status = 3) : JsonResponse
    {
        // TODO: Implement closeTicket() method.
    }

    public function countComments() : ?int
    {
        // TODO: Implement countComments() method.
    }
}
