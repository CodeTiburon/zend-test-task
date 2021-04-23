<?php
/**
 * User repository for user-related persistency operations.
 *
 * @since     Nov 2015
 * @author    M. Yilmaz SUSLU <yilmazsuslu@gmail.com>
 */
namespace Core\Entity\Repository;
use Doctrine\Persistence\ManagerRegistry;

class ContactRepository extends BaseRepository
{
    public function getAllContacts()
    {
        $query = $this->findAll();

        return $query->getQuery()->getResult();
    }
}