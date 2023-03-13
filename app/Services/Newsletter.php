<?php

namespace app\Services;
use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(array $attributes, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');
        return $this->client()->lists->addListMember($list, [
            'email_address' => $attributes['email'],
            'status' => 'subscribed',
            'merge_fields' => [
                'FNAME' => $attributes['FNAME'],
                'LNAME' => $attributes['LNAME']
            ],
        ]);
    }

    protected function client()
    {
        return (new ApiClient())
            ->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us19'
        ]);
    }
}