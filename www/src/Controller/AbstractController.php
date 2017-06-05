<?php

namespace Masha\Controller;

class AbstractController
{
    /**
     * @var \Smarty
     */
    private $smarty;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->smarty = new \Smarty();
        $this->smarty->caching = false;
    }

    /**
     * @return \Smarty
     */
    protected function getSmarty()
    {
        return $this->smarty;
    }

    /**
     * @param string $url
     */
    public function redirect($url)
    {

        header("Location: " . $url);

        exit();
    }
}
