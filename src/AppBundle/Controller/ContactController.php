<?php
namespace AppBundle\Controller;

use AppBundle\Form\Type\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     * @Method({"GET", "POST"})
     * @Template(":contact:index.html.twig")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                $message = \Swift_Message::newInstance()
                ->setSubject('Contact')
                ->setFrom($form->get('email')->getData())
                ->setTo('benjamin.dumortier@gmail.com')
                ->setBody(
                    $this->renderView(
                        ':mail:contact.html.twig',
                        array(
                            'email' => $form->get('email')->getData(),
                            'name' => $form->get('name')->getData(),
                            'message' => $form->get('message')->getData()
                        )
                    )
                );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', $this->get('translator')->trans('successSendMail', array(), 'contact'));

                return $this->redirect($this->generateUrl('contact'));
        }

        return array(
                'form' => $form->createView()
        );
    }
}
