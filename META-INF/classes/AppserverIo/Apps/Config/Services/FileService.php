<?php

/**
 * \AppserverIo\Apps\Config\Services\FileService
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Johann Zelger <jz@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-apps/config
 * @link      http://www.appserver.io/
 */

namespace AppserverIo\Apps\Config\Services;

use Filicious\Filesystem;
use Filicious\Local\LocalAdapter;

/**
 * Class FileService
 *
 * Provides simple file service functionality for servlets usage.
 *
 * @author    Johann Zelger <jz@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-apps/config
 * @link      http://www.appserver.io/
 *
 * @Stateless
 */
class FileService
{

    /**
     * Holds the filesystems adapter to use
     *
     * @var \Filicious\Local\LocalAdapter $adapter
     */
    protected $adapter;

    /**
     * Holds the filesystem instance
     *
     * @var \Filicious\Filesystem $fileSystem
     */
    protected $fileSystem;

    /**
     * Constructs the file service
     */
    public function __construct()
    {
        $this->adapter = new LocalAdapter('/opt/appserver/etc/');
        $this->fileSystem = new Filesystem($this->adapter);
    }

    /**
     * Returns the filesystem instance
     *
     * @return \Filicious\Filesystem
     */
    protected function getFileSystem()
    {
        return $this->fileSystem;
    }

    /**
     * Returns the contents of the given filename
     *
     * @param string $filename The path to filename
     *
     * @return string The file contents
     */
    public function getContents($filename)
    {
        $file = $this->getFileSystem()->getFile($filename);
        return $file->getContents();
    }

    /**
     * Sets the contents given for specific filename
     *
     * @param string $content  The content string to set
     * @param string $filename The filename to set the contents string into it
     *
     * @return null
     */
    public function setContents($content, $filename)
    {
        $file = $this->getFileSystem()->getFile($filename);
        $file->setContents($content);
    }
}
