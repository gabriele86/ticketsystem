<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="owner")
     */
    private $ticket;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TicketComment", mappedBy="author")
     */
    private $comments;

    public function __construct()
    {
        parent::__construct();
        $this->ticket = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    /**
     * @return Collection|Ticket[]
     */
    public function getTicket(): Collection
    {
        return $this->created_at;
    }

    public function addTicket(Ticket $createdAt): self
    {
        if (!$this->created_at->contains($createdAt)) {
            $this->created_at[] = $createdAt;
            $createdAt->setOwner($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $createdAt): self
    {
        if ($this->created_at->contains($createdAt)) {
            $this->created_at->removeElement($createdAt);
            // set the owning side to null (unless already changed)
            if ($createdAt->getOwner() === $this) {
                $createdAt->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TicketComment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(TicketComment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setAuthor($this);
        }

        return $this;
    }

    public function removeComment(TicketComment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getAuthor() === $this) {
                $comment->setAuthor(null);
            }
        }

        return $this;
    }

}