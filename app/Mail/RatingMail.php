<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RatingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $partner;
    public $order;
    public $offer;
    public $settings;
    public $emailTemplate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order, $offer, $settings, $partner,$emailTemplate)
    {
        $this->user = $user;
        $this->order = $order;
        $this->offer = $offer;
        $this->settings = $settings;
        $this->partner = $partner;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $userfirstname = $this->user['first_name'];
        $userlast_name = $this->user['last_name'];
        $firstname = $this->partner['company_name'];
        $contact = $this->settings['contact_number'];
        $emailcontact = $this->settings['email'];
        $orderURL = url('rating',$this->order['id']);

        $this->emailTemplate['content'] = str_replace('{userfirstname}',  $userfirstname, $this->emailTemplate['content'] );
        $this->emailTemplate['content'] = str_replace('{userlastname}',  $userlast_name, $this->emailTemplate['content'] );
        $this->emailTemplate['content'] = str_replace('{partnerName}',  $firstname, $this->emailTemplate['content'] );
        $this->emailTemplate['content'] = str_replace('{orderURL}',  $orderURL, $this->emailTemplate['content'] );
        $this->emailTemplate['content'] = str_replace('{contact}',  $contact, $this->emailTemplate['content'] );
        $this->emailTemplate['content'] = str_replace('{emailcontact}',  $emailcontact, $this->emailTemplate['content'] );






        $email = $this->from('info@solarnest.pk', 'SolarNest')->subject('Thanks for choosing SolarNest')->view('mails.rating');
        return $email;
    }
}
