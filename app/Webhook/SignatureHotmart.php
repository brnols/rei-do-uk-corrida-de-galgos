<?php

namespace App\Webhook;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\Exceptions\WebhookFailed;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;

class SignatureHotmart implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signature = $request->header($config->signatureHeaderName);

        if (! $signature) {
            dd("header não encontrado");
            return false;
        }

        $signingSecret = $config->signingSecret;

        if (empty($signingSecret)) {
            throw WebhookFailed::signingSecretNotSet();
        }

        if( $signature == $signingSecret)
            return true;
        
        dd("header: $signature & config:  $signingSecret");

        //$computedSignature = hash_hmac('sha1', $request->getContent(), $signingSecret);
        //return hash_equals($signature, $computedSignature);
    }
}