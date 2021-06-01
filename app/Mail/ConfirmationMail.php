<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationMail extends Mailable
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
    public function __construct($user, $order, $offer, $settings, $partner, $emailTemplate)
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
        $attachments = [
            // first attachment
            '' . public_path() . '/uploads/pdfFiles/' . $this->offer->id . '/' . $this->offer->proposal_file . '' => [
                'as' => $this->offer->proposal_file,
                'mime' => 'application/pdf',
            ],
            '' . public_path() . '/storage/uploads/proposals/' . $this->order->id . '/solarnest.pdf' => [
                'as' => 'solarnest.pdf',
                'mime' => 'application/pdf',
            ]
        ];

        $firstname = $this->partner['company_name'];
        $contact = $this->settings['contact_number'];
        $emailcontact = $this->settings['email'];
        $CityName = $this->offer['city'];
        $customerName = $this->user['first_name'] .' '. $this->user['last_name'];
        $customerAddress = $this->user['address'];
        $customerPhoneNumber = $this->user['phone_number'];

        $this->emailTemplate['content'] = str_replace('{partnerName}', $firstname, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{CustomerName}', $customerName, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{CustomerAddress}', $customerAddress, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{CustomerPhoneNumber}', $customerPhoneNumber, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{CityName}', $CityName, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{contact}', $contact, $this->emailTemplate['content']);
        $this->emailTemplate['content'] = str_replace('{emailcontact}', $emailcontact, $this->emailTemplate['content']);


        $email = $this->from('info@solarnest.pk', 'SolarNest')->subject('Initial confirmation of a new customer in ' . $this->offer['city'] . '')->view('mails.partner');
        // $attachments is an array with file paths of attachments
        foreach ($attachments as $filePath => $fileParameters) {
            $email->attach($filePath, $fileParameters);
        }
        return $email;
    }
}
