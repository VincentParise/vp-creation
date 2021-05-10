<?php

namespace App\Notification;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Notification extends AbstractController {

    private $mailer;

    /**
     * Notification constructor.
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer=$mailer;
    }

    public function notify($contact) {
        $email= (new Email())
            ->from($contact->getEmail())
            ->to('v.parise@vp-creation.fr')
            ->subject('Contact VP CREATION : '.$contact->getFirstname().' '.$contact->getLastname())
            ->text('Email : '. $contact->getEmail().' Message : '.$contact->getMessage());

        $this->mailer->send($email);
    }

}
