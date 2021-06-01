<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PartnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $settings;
    public $emailTemplate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $settings, $emailTemplate)
    {
        $this->user = $user;
        $this->settings = $settings;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $firstname = $this->user['first_name'];
        $contact = $this->settings['contact_number'];
        $emailcontact = $this->settings['email'];

        $this->emailTemplate['content'] = str_replace('{partnerName}', $firstname, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{contact}', $contact, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{emailcontact}', $emailcontact, $this->emailTemplate['content']);
        $email = $this->from('info@solarnest.pk', 'SolarNest')->subject('Confirmation of registration of ' . $firstname . ' on SolarNest')->view('mails.register-partner');
        return $email;
    }
}
