<?php

namespace Merci\CheckoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CheckoutController extends Controller
{
    public function indexAction()
    {
        $session = $this->getRequest()->getSession();
        $cart = $session->get('cart');
        if (!$cart || $cart->count() == 0) {
            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render('MerciCheckoutBundle:Default:index.html.twig');
    }

    public function successAction()
    {
        $session = $this->getRequest()->getSession();
        $cart = $session->get('cart');
        if (!$cart || $cart->count() == 0) {
            return $this->redirect($this->generateUrl('homepage'));
        }

        $user = $this->get('security.context')->getToken()->getUser();

        $message = \Swift_Message::newInstance()
            ->setSubject('Merci Commerce: Pedido realizado com sucesso!')
            ->setFrom('atendimento@merci.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->renderView(
                    'MerciCheckoutBundle:Default:email.txt.twig',
                    array('user' => $user, 'cart' => $cart)
                ));
        $this->get('mailer')->send($message);

        $session->remove('cart');

        return $this->render('MerciCheckoutBundle:Default:success.html.twig');
    }
}
