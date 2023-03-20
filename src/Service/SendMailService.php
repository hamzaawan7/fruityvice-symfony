<?php

namespace App\Service;

use App\Entity\Fruit;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendMailService
{
    /**
     * @param MailerInterface $mailer
     * @return bool
     */
    public function notify(MailerInterface $mailer, Fruit $fruit): bool
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('test@gmail.com')
            ->subject($fruit->getName() . " Added")
            ->text('A new fruit has been added')
            ->html('<p>A new fruit has been added</p>');

        try {
            $mailer->send($email);
            return true;
        } catch (TransportExceptionInterface $e) {
            return false;
        }
    }
}
