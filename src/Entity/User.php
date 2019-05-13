<?php


namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $send_push;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $send_sms;

    /**
     * @ORM\Column(type="integer")
     */
    protected $mobile;


    /**
     * @ORM\Column(type="string")
     */
    protected $device_token;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return String
     */
    public function getDeviceToken() : String
    {
        return $this->device_token;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @return mixed
     */
    public function getSendPush()
    {
        return $this->send_push;
    }

    /**
     * @return mixed
     */
    public function getSendSms()
    {
        return $this->send_sms;
    }

    /**
     * @param mixed $device_token
     */
    public function setDeviceToken($device_token): void
    {
        $this->device_token = $device_token;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @param mixed $send_push
     */
    public function setSendPush($send_push): void
    {
        $this->send_push = $send_push;
    }

    /**
     * @param mixed $send_sms
     */
    public function setSendSms($send_sms): void
    {
        $this->send_sms = $send_sms;
    }

}