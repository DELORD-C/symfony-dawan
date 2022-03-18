<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Security\Core\Security;
use Symfony\Contracts\Translation\TranslatorInterface;

class Greeter
{
    /**
     * @var Translator
     */
    private $translator;
    /**
     * @var Security
     */
    private $security;

    function __construct (TranslatorInterface $translator, Security $security)
    {
        $this->translator = $translator;
        $this->security = $security;
    }
    
    public function sayHi (?string $name = null): string
    {
        if (empty($name)) {
            if ($this->security->getUser()) {
                $name = $this->security->getUser()->getUserIdentifier();
            }
            else {
                $name = $this->translator->trans('general.guest');
            }
        }

        return $this->translator->trans('general.hi', ['%name%' => $name]);
    }
}