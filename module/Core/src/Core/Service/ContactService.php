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

    /**
     * Changes given contact's default locale.
     * 
     * @param  Contact   $contact      Contact entity to update
     * @param  string $newLocale
     * 
     * @return boolean
     */
    public function changeLocaleByContact(Contact $contact, $newLocale)
    {
        $contact->setLanguage($newLocale);

        $this->contactRepository->update($contact);

        return true;
    }

    /**
     * @return ContactRepository
     */
    public function getRepository()
    {
        return $this->contactRepository;
    }

    public function create(Contact $contact)
    {
        try{
            $this->contactRepository->save($contact);
        }
        catch(\Exception  $e){

            
        }
    }
}
