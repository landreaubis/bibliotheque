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

        if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                ->setSubject($this->get('translator')->trans('subjectContactForm', array(), 'contact'))
                ->setFrom($form->get('email')->getData())
                ->setTo($this->container->getParameter('mail_contact'))
                ->setBody(
                    $this->renderView(
                        ':mail:contact.html.twig',
                        [
                            'email' => $form->get('email')->getData(),
                            'name' => $form->get('name')->getData(),
                            'message' => $form->get('message')->getData(),
                        ]
                    )
                );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'successSendMail');

                return $this->redirect('/contact');
        }

        return ['form' => $form->createView()];
    }
}
