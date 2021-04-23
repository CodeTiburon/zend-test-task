<?php
/**
 * Contact Resource Factory
 *
 * @since     Nov 2015
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */
namespace Api\V1\Contact;

class ContactResourceFactory
{
    public function __invoke($sm)
    {
        return new ContactResource(
            $sm->get('core.service.contact')
        );
    }
}
