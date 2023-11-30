<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $level;
    public $actionText;
    public $greeting;
    public $actionUrl;
    public $introLines;
    public $outroLines;

    public $id_status;

    public $displayableActionUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($level, $actionText, $greeting, $actionUrl, $introLines, $outroLines, $displayableActionUrl, $id_status)
    {
        $this->level = $level;
        $this->actionText = $actionText;
        $this->greeting = $greeting;
        $this->actionUrl = $actionUrl;
        $this->introLines = $introLines;
        $this->outroLines = $outroLines;
        $this->displayableActionUrl = $displayableActionUrl;
        $this->id_status = $id_status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $statusSubjectMap = [
            '1' => 'Đặt hàng thành công',
            '2' => 'Đơn hàng đang trên đường vận chuyển',
            '3' => 'Giao hàng thành công',
            '4' => 'Đơn hàng hủy thành công',
        ];

        $subject = isset($statusSubjectMap[$this->id_status])
        ? $statusSubjectMap[$this->id_status]
        : 'Xin chào bạn';

        return $this->markdown('vendor.notifications.email', [
            'level' => $this->level,
            'actionText' => $this->actionText,
            'greeting' => $this->greeting,
            'actionUrl' => $this->actionUrl,
            'introLines' => $this->introLines,
            'outroLines' => $this->outroLines,
        ])->subject($subject);
    }
}
