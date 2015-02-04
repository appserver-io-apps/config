<?php

namespace AppserverIo\Apps\Config\Servlets;

use AppserverIo\Psr\Servlet\ServletConfigInterface;
use AppserverIo\Psr\Servlet\Http\HttpServlet;
use AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface;
use AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface;


/**
 * This is the famous 'Hello World' as servlet implementation.
 *
 * @Route(name="helloWorld",
 *        displayName="I'm the 'Hello World!' servlet",
 *        description="A annotated 'Hello World!' servlet implementation.",
 *        urlPattern={"/helloWorld.do", "/helloWorld.do*"})
 */
class HelloWorldServlet extends HttpServlet
{

    /**
     * The text to be rendered.
     *
     * @var string
     */
    protected $helloWorld = '';

    /**
     * Initializes the servlet with the passed configuration.
     *
     * @param \AppserverIo\Psr\Servlet\ServletConfig $config
     *   The configuration to initialize the servlet with
     *
     * @return void
     */
    public function init(ServletConfigInterface $config)
    {

        // call parent method
        parent::init($config);

        // prepare the text here
        $this->helloWorld = 'Hello World!';

        // @todo Do all the bootstrapping here, because this method will
        //       be invoked only once when the Servlet Engines starts up
    }

    /**
     * Handles a HTTP GET request.
     *
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface  $servletRequest
     *   The request instance
     * @param \AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface $servletResponse
     *   The response instance
     *
     * @return void
     * @see \AppserverIo\Psr\Servlet\Http\HttpServlet::doGet()
     */
    public function doGet(
        HttpServletRequestInterface $servletRequest,
        HttpServletResponseInterface $servletResponse)
    {
        $servletResponse->appendBodyStream($this->helloWorld);
    }
}