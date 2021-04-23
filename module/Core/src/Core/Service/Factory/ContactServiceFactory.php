<?php
/**
 * Contact service factory
 *
 * @since     Nov 2015
 * @author    M. Yilmaz SUSLU <yilmazsuslu@gmail.com>
 */
namespace Core\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\Service\ContactService;

/**
 * Contact service factory
 */
class ContactServiceFactory implements FactoryInterface
{
    /**
     * Simply returns doctrine authentication service factory.
     *
     * @see https://github.com/doctrine/DoctrineModule/blob/master/docs/authentication.md
     *
     * @return ContactService
     */
    public function createService(ServiceLocatorInterface $sm)
    {
        $contactRepo    = $sm->get('doctrine.entitymanager.orm_default')->getRepository('Core\Entity\Contact');

        return new ContactService($contactRepo);
    }
}
