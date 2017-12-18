<?php

namespace PlannerBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
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
     * @ORM\OneToMany(targetEntity="Task", mappedBy="users")
     */
    private $task;



    public function __construct()
    {
        parent::__construct();
        /*
        ...
        */
    }


    /**
     * Add task
     *
     * @param \PlannerBundle\Entity\Task $task
     *
     * @return User
     */
    public function addTask(\PlannerBundle\Entity\Task $task)
    {
        $this->task[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \PlannerBundle\Entity\Task $task
     */
    public function removeTask(\PlannerBundle\Entity\Task $task)
    {
        $this->task->removeElement($task);
    }

    /**
     * Get task
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTask()
    {
        return $this->task;
    }
}
