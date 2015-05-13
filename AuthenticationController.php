<?php

namespace CodeInspection\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class AuthenticationController extends Controller
{
    public function loginAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            $this->redirect($this->generateUrl('admin'));
        }

        $request = $this->getRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
                    'CodeInspectionBackOfficeBundle:Authentication:login.html.twig',
                    array(
                        'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                        'error' => $error,
                    )
        );
    }
}