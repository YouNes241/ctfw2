<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
//use Symfony\Component\Security\Http\Event\LoginSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

final class AuthenticationSuccessListener
{
    #[AsEventListener(event: AuthenticationSuccessEvent::class)]
    public function onAuthenticationSuccess(AuthenticationSuccessEvent $event): void
    {
        $data = $event->getData();
        $user = $event->getUser();
    
        if (!$user instanceof User) {
            return;
        }
    
        $data['userid'] = $user->getId();
        $data['email'] = $user->getEmail();
        $data['roles'] = $user->getRoles();
    
        $event->setData($data);
    }
}
