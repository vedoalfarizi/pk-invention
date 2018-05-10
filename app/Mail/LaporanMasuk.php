<?php

namespace App\Mail;

use App\Models\laporan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LaporanMasuk extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $laporan;

    public function __construct(laporan $laporan)
    {
        $this->laporan = $laporan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lombaasimetr15@gmail.com')->markdown('emails.laporan.masuk');
    }
}
