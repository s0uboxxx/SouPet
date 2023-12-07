<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $level;
    public $actionText;
    public $greeting;
    public $actionUrl;
    public $introLines;
    public $outroLines;

    public $status_id;

    public $displayableActionUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($level, $actionText, $greeting, $actionUrl, $introLines, $outroLines, $displayableActionUrl, $status_id)
    {
        $this->level = $level;
        $this->actionText = $actionText;
        $this->greeting = $greeting;
        $this->actionUrl = $actionUrl;
        $this->introLines = $introLines;
        $this->outroLines = $outroLines;
        $this->displayableActionUrl = $displayableActionUrl;
        $this->status_id = $status_id;
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

        $subject = isset($statusSubjectMap[$this->status_id])
        ? $statusSubjectMap[$this->status_id]
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
