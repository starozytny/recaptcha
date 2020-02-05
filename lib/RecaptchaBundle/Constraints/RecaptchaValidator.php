<?php

namespace Shanbo\RecaptchaBundle\Constraints;


use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use ReCaptcha\ReCaptcha;

class RecaptchaValidator extends ConstraintValidator
{

    protected $requestStack;
    protected $reCaptcha;

    public function __construct(RequestStack $requestStack, ReCaptcha $reCaptcha)
    {
        $this->requestStack = $requestStack;
        $this->reCaptcha = $reCaptcha;
    }

    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint)
    {
        $request = $this->requestStack->getCurrentRequest();
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
        if(empty($recaptchaResponse)){
            $this->addViolation($constraint);
            return;
        }
        $response = $this->reCaptcha->setExpectedHostname($request->getHost())
            ->verify($recaptchaResponse, $request->getClientIp());

        if(!$response->isSuccess()){
            $this->addViolation($constraint);
        }
    }

    private function addViolation(Constraint $constraint)
    {
        return $this->context->buildViolation($constraint->message)->addViolation();
    }
}
