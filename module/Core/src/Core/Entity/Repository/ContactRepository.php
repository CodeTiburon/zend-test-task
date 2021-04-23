<?php
/**
 * User repository for user-related persistency operations.
 *
 * @since     Nov 2015
 * @author    M. Yilmaz SUSLU <yilmazsuslu@gmail.com>
 */
namespace Core\Entity\Repository;

use Core\Entity\Contact;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class ContactRepository extends BaseRepository
{
    protected $entityManager;

    protected $entityName;

    public function __construct(EntityManagerInterface $entityManager, $entityName)
    {
        $this->entityManager    = $entityManager;
        $this->entityName       = $entityName;
    }

    public function findAll($param)
    {
        // return $this->entityManager->
    }

    public function findById(int $id){

        return $this->entityManager->find('Core\Entity\Contact', $id);
    }

    public function create(Contact $contact)
    {
        try{
            $this->entityManager->persist($contact);
            $this->entityManager->flush();
        }
        catch(\Exception $e) {
            
            return $e->getErrorCode();
        }

        return;
    }
}