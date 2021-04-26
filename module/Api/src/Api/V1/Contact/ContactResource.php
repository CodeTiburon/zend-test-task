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
        return $this->contactService->findById($id);
    }

    /**
     * {@inheritdoc}
     */
    public function fetchAll($params = [])
    {
        return $this->contactService->findAll($params);
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

        /** @var ContactEntity $contactEntity*/
        $contactEntity = new $contactEntity();

        foreach(['Name', 'Email', 'Phone', 'Agence', 'Dept', 'Canal'] as $key){

            $setter = 'set'.$key;
            $datakey = strtolower($key);
            $contactEntity->$setter($data->$datakey);
        }    

        $errors = $this->contactService->create($contactEntity->toArray());
 
        if(!is_null($errors)){

            return new ApiProblem(406, ['error_code' => $errors]);
        }
    }
}
