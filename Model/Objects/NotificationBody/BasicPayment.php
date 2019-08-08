<?php
namespace tpaySDK\Model\Objects\NotificationBody;

use tpaySDK\Model\Fields\Notification\Crc;
use tpaySDK\Model\Fields\Notification\Description;
use tpaySDK\Model\Fields\Notification\Error;
use tpaySDK\Model\Fields\Notification\Md5sum;
use tpaySDK\Model\Fields\Notification\Paid;
use tpaySDK\Model\Fields\Notification\TestMode;
use tpaySDK\Model\Fields\Notification\TransactionAmount;
use tpaySDK\Model\Fields\Notification\TransactionChannel;
use tpaySDK\Model\Fields\Notification\TransactionDate;
use tpaySDK\Model\Fields\Notification\TransactionId;
use tpaySDK\Model\Fields\Notification\TransactionStatus;
use tpaySDK\Model\Fields\Notification\Wallet;
use tpaySDK\Model\Fields\Person\Email;
use tpaySDK\Model\Objects\ObjectHelper;
use tpaySDK\Model\Objects\Objects;
use tpaySDK\Model\Primitives\Id;

class BasicPayment extends Objects
{
    use ObjectHelper;

    const OBJECT_FIELDS = [
        'id' => Id::class,
        'tr_id' => TransactionId::class,
        'tr_date' => TransactionDate::class,
        'tr_crc' => Crc::class,
        'tr_amount' => TransactionAmount::class,
        'tr_paid' => Paid::class,
        'tr_desc' => Description::class,
        'tr_status' => TransactionStatus::class,
        'tr_error' => Error::class,
        'tr_email' => Email::class,
        'md5sum' => Md5sum::class,
        'test_mode' => TestMode::class,
        'wallet' => Wallet::class,
        'tr_channel' => TransactionChannel::class,
    ];

    /**
     * @var Id
     */
    public $id;

    /**
     * @var TransactionId
     */
    public $tr_id;

    /**
     * @var TransactionDate
     */
    public $tr_date;

    /**
     * @var Crc
     */
    public $tr_crc;

    /**
     * @var TransactionAmount
     */
    public $tr_amount;

    /**
     * @var Paid
     */
    public $tr_paid;

    /**
     * @var Description
     */
    public $tr_desc;

    /**
     * @var TransactionStatus
     */
    public $tr_status;

    /**
     * @var Error
     */
    public $tr_error;

    /**
     * @var Email
     */
    public $tr_email;

    /**
     * @var Md5sum
     */
    public $md5sum;

    /**
     * @var TestMode
     */
    public $test_mode;

    /**
     * @var Wallet
     */
    public $wallet;

    /**
     * @var TransactionChannel
     */
    public $tr_channel;

    public function getRequiredFields()
    {
        return [
            $this->id,
            $this->tr_id,
            $this->tr_date,
            $this->tr_crc,
            $this->tr_amount,
            $this->tr_paid,
            $this->tr_desc,
            $this->tr_status,
            $this->tr_error,
            $this->tr_email,
            $this->md5sum,
        ];
    }

}