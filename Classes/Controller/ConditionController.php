<?php

declare(strict_types=1);

namespace In2code\PowermailCond\Controller;

use In2code\PowermailCond\Utility\ConditionUtility;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use function json_encode;
use const JSON_THROW_ON_ERROR;

class ConditionController extends ActionController
{
    protected ConditionUtility $conditionUtility;

    public function injectConditionUtility(ConditionUtility $conditionUtility): void
    {
        $this->conditionUtility = $conditionUtility;
    }

    /**
     * Build Condition for AJAX call
     *
     * @throws Throwable
     */
    public function buildConditionAction(): ResponseInterface
    {
        $requestBody = $this->request->getParsedBody();

        $arguments = $this->conditionUtility->getArguments($requestBody['tx_powermail_pi1']);

        return $this->jsonResponse(json_encode($arguments, JSON_THROW_ON_ERROR));
    }
}
