<?php
/**
 * Contact service
 *
 * @since     Jul 2015
 * @author    M. Yilmaz SUSLU <yilmazsuslu@gmail.com>
 */
namespace Core\Service;

use Core\Entity\Contact;
use Core\Traits\ObjectManagerAwareTrait;
use Core\Entity\Repository\ContactRepository;

class ContactService extends AbstractService
{
    private $contactRepository;
    
    /**
     * Constructor.
     * 
     * @param ContactRepository $contactRepository Contact repository instance.
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository    = $contactRepository;
    }

    public function findById(int $id)
    {
        return $this->contactRepository->findById($id);
    }

    public function findAll($params)
    {
        return $this->contactRepository->findAll($params);
    }

    public function create($data)
    {
        $contact = new Contact();

        foreach(['Name', 'Email', 'Phone', 'Agence', 'Dept', 'Canal'] as $key){

            $setter = 'set'.$key;
            $datakey = strtolower($key);
            $contact->$setter($data[$datakey]);
        }    

        return $this->contactRepository->create($contact);
    }
}
