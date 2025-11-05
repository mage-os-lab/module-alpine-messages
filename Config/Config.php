<?php declare(strict_types=1);

namespace MageOS\AlpineMessages\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Config implements ArgumentInterface
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig,
        private int $defaultTimeout = 5000
    ) {
    }

    public function getMessagesTimeout(): int
    {
        $timeout = (int)$this->scopeConfig->getValue('web/messages/timeout');
        if ($timeout <= 0) {
            return $this->defaultTimeout;
        }

        return $timeout;
    }
}
