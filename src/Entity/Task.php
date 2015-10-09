<?php
/**
 * Created by PhpStorm.
 * User: eu
 * Date: 09/10/2015
 * Time: 19:42
 */

namespace Flow\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;

/**
 * Class Task
 *
 * @package Flow\Entity
 *
 * @Entity
 */
class Task
{
    /**
     * @var int
     * @Id @Column(type="integer") @GeneratedValue
     */
    private $_id = 0;

    /**
     * @var string
     * @Column(type="string", length=255, nullable=false, unique=false)
     */
    private $_title = '';

    /**
     * @var bool
     * @Column(type="boolean")
     */
    private $_done = false;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return boolean
     */
    public function isDone()
    {
        return $this->_done;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @param boolean $done
     */
    public function setDone($done)
    {
        $this->_done = $done;
    }
}