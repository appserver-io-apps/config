<?php

namespace AppserverIo\Apps\Config\Servlets;

use AppserverIo\Apps\Config\Services\FileService;
use AppserverIo\Psr\Servlet\ServletConfigInterface;
use AppserverIo\Psr\Servlet\Http\HttpServlet;
use AppserverIo\Psr\Servlet\Http\HttpServletRequestInterface;
use AppserverIo\Psr\Servlet\Http\HttpServletResponseInterface;


/**
 * Class FileServlet
 *
 * @Route(name="file",
 *        displayName="FileServlet",
 *        description="Provides file web-api.",
 *        urlPattern={"/service/file.do", "/service/file.do*"})
 */
class FileServlet extends HttpServlet
{

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

        // @todo Do all the bootstrapping here, because this method will
        //       be invoked only once when the Servlet Engines starts up
    }

    /**
     * Injects the session bean by its setter method.
     *
     * @param \AppserverIo\Apps\Config\Services\FileService $fileService The file service instance to inject
     * @EnterpriseBean(name="FileService")
     */
    public function setFileService(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Returns the file service instance
     *
     * @return \AppserverIo\Apps\Config\Services\FileService
     */
    public function getFileService()
    {
        return $this->fileService;
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
        // init local refs
        $fileService = $this->getFileService();

        // get params from request
        $filename = $servletRequest->getParameter('filename');

        $fileContents = $fileService->getContents($filename);

        $servletResponse->appendBodyStream($fileContents);
    }

}