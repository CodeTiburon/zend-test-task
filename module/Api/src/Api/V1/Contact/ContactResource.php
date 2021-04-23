<?php
/**
 * Contact Resource
 *
 * @since     Nov 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace Api\V1\Contact;

use ContactEntity;
use Core\Service\ContactService;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ContactResource extends AbstractResourceListener
{
    /**
     * @var ContactService
     */
    protected $contactService;

    /**
     * @param ContactService   $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * {@inheritdoc}
     */
    public function fetch($id)
    {
        var_dump('ContactResource -> fetch');exit;

        try {
            $data = $this->contactSearchService->getById($id);
        } catch (\Exception $e) {
            var_dump($e);exit;
            return new ApiProblem($e->getCode(), $e->getMessage());
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchAll($params = [])
    {
        // Example usage identity information
        // $identity = $this->getIdentity()->getAuthenticationIdentity();
        // $contact = new Contact();
        var_dump('ContactResource -> fetchAll', $this->contactService->getRepository()->getAllContacts());exit;
        return [['foo' => 'bar']];
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $contactEntity = $this->getEntityClass();
        $contactEntity = new $contactEntity();

        foreach(['Name', 'Email', 'Phone', 'Agence', 'Dept', 'Canal'] as $key){

            $setter = 'set'.$key;
            $datakey = strtolower($key);
            $contactEntity->$setter($data->$datakey);
        }     

        $this->contactService->create($contactEntity);
    }
}
