<?php

namespace Lturi\FormatXml;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class FileManager {
    protected $filesystem;
    protected $finder;

    public function __construct ()
    {
        $this->filesystem = new Filesystem();
        $this->finder = new Finder();
    }

    /**
     * @param $folder
     *
     * @return Finder
     */
    public function listFile($folder) {
        return $this->finder->in(ROOT_PATH.$folder);
    }

    /**
     * @param SplFileInfo $file
     *
     * @return mixed
     */
    public function read($file) {
        return $file->getContents();
    }

    /**
     * @param string $where
     * @param string $content
     */
    public function write($where, $content) {
        $this->filesystem->dumpFile(ROOT_PATH . $where, $content);
    }
}