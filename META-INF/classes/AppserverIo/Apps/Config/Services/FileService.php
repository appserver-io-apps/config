<?php

namespace AppserverIo\Apps\Config\Services;

use Filicious\Filesystem;
use Filicious\Local\LocalAdapter;

/**
 * Class FileService
 *
 * Provides simple file service functionality for servlets usage.
 *
 * @package AppserverIo\Apps\Config\Services
 * @author Johann Zelger <jz@appserver.io>
 *
 * @Stateless
 */
class FileService {

    /**
     * Holds the filesystems adapter to use
     *
     * @var \Filicious\Local\LocalAdapter
     */
    protected $adapter;

    /**
     * Holds the filesystem instance
     *
     * @var \Filicious\Filesystem
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
     */
    public function setContents($content, $filename)
    {
        $file = $this->getFileSystem()->getFile($filename);
        $file->setContents($content);
    }

}