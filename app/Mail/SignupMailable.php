<?php

namespace App\Mail;

use App\Models\Interest;
use App\Models\Language;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // get the string value for the language
        $language = Language::find($this->contact['language']);

        // explode the string list of interest into an array
        $interests_string = "";
        $interests_array = explode(',', $this->contact['interests']);

        // loop through array and add the name of the id. if it isn't empty, add a comma and a space
        foreach ($interests_array as $i) {
            if ($interests_string) {
                $interests_string .= ", ";
            }

            $interests_string .= Interest::where('id', $i)->pluck('name')->first();
        }

        return $this
            ->from($this->contact['email'])
            ->subject('JBCRUD Submission for ' . $this->contact['name'] . " " . $this->contact['surname'])
            ->markdown('emails.signup', [
                'data' => $this->contact,
                'language' => $language->name,
                'interests' => $interests_string,
            ]);
    }
}
