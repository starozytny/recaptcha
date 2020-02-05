<?php

namespace Shanbo\RecaptchaBundle\Constraints;

use Symfony\Component\Validator\Constraint;

class Recaptcha extends Constraint
{
    public $message = 'Captcha invalide';
}
