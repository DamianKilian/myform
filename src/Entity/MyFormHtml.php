<?php

namespace MyForm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class MyFormHtml
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="html", type="text")
     */
    private $html;

    /**
     * Get the value of html
     *
     * @return  string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Set the value of html
     *
     * @param  string  $html
     *
     * @return  self
     */
    public function setHtml(string $html)
    {
        $this->html = $html;

        return $this;
    }
}
