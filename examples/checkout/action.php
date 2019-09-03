<?php

use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Enums\BkashSubDomainType;

require_once './composer_load.php';

$tokenized = new Shipu\Bkash\Managers\Tokenized($config[BkashSubDomainType::CHECKOUT]);

$data = $_POST;

if(!empty($data)) {
    $callbackUrl = $config[BkashSubDomainType::CHECKOUT][BkashKey::CALL_BACK_URL].'?'.http_build_query($data);
    $agreement = $tokenized->createAgreement($data['payerReference'], $callbackUrl);
    header('Location: '.$agreement->bkashURL);
}



