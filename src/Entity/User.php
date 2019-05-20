<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
     * @ORM\Column(type="boolean", options={"default":0}, nullable=true)
     */
    protected $send_push;

    /**
     * @ORM\Column(type="boolean", options={"default":FALSE}, nullable=true)
     */
    protected $send_sms;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $mobile;


    /**
     * @ORM\Column(type="string", nullable=true)
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="assignee")
     */
    private $assigned_tickets;

    public function __construct()
    {
        parent::__construct();
        $this->ticket = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->assigned_tickets = new ArrayCollection();
    }

    /**
     * @return String|null
     */
    public function getDeviceToken() : ?String
    {
        return $this->device_token;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getMobile() : ?string
    {
        return $this->mobile;
    }

    /**
     * @return bool|null
     */
    public function getSendPush() : ?bool
    {
        return $this->send_push;
    }

    /**
     * @return bool|null
     */
    public function getSendSms() : ?bool
    {
        return $this->send_sms;
    }

    /**
     * @param mixed $device_token
     */
    public function setDeviceToken($device_token): self
    {
        $this->device_token = $device_token;
        return $this;
    }


    public function setMobile($mobile): self
    {
        $this->mobile = $mobile;
        return $this;
    }

    public function setSendPush($send_push): self
    {
        $this->send_push = $send_push;
        return $this;
    }


    public function setSendSms($send_sms): self
    {
        $this->send_sms = $send_sms;
        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTicket(): Collection
    {
        return $this->ticket;
    }

    public function setTicket(Ticket $ticket): self
    {
        if (!$this->ticket->contains($ticket)) {
            $this->ticket[] = $ticket;
            $ticket->setOwner($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->ticket->contains($ticket)) {
            $this->ticket->removeElement($ticket);
            // set the owning side to null (unless already changed)
            if ($ticket->getOwner() === $this) {
                $ticket->setOwner(null);
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

    /**
     * @return Collection|Ticket[]
     */
    public function getAssignedTickets(): Collection
    {
        return $this->assigned_tickets;
    }

    public function addAssignedTicket(Ticket $assignedTicket): self
    {
        if (!$this->assigned_tickets->contains($assignedTicket)) {
            $this->assigned_tickets[] = $assignedTicket;
            $assignedTicket->setAssignee($this);
        }

        return $this;
    }

    public function removeAssignedTicket(Ticket $assignedTicket): self
    {
        if ($this->assigned_tickets->contains($assignedTicket)) {
            $this->assigned_tickets->removeElement($assignedTicket);
            // set the owning side to null (unless already changed)
            if ($assignedTicket->getAssignee() === $this) {
                $assignedTicket->setAssignee(null);
            }
        }

        return $this;
    }

}