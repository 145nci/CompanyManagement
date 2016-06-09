<?php

/**
 * Created by PhpStorm.
 * User: setzo
 * Date: 02.06.16
 * Time: 08:31
 */

namespace CompanyManagementBundle\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;

class LoginListener implements EventSubscriberInterface {

    private $container;
    private $router;

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents() {

        return array(
            KernelEvents::REQUEST => 'onKernelRequest',
        );
    }

    public function __construct($container, $router) {

        $this->container = $container;
        $this->router = $router;
    }

    public function onKernelRequest(GetResponseEvent $event) {

        $aclService = $this->container->get('acl_service');

        $user = $this->getUser();

//        if(!$aclService->hasAccess($user, $event->getRequest())) {
//            $url = $this->router->generate('company_management_homepage');
//            $event->setResponse(new RedirectResponse($url));
//        }
    }

    public function getUser() {

        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            return false;
        }

        if (!is_object($user = $token->getUser())) {
            return false;
        }

        return $user;
    }
}

