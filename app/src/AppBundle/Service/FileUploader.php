<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $uploadDirectory;

    public function __construct($uploadDirectory)
    {
        $this->uploadDirectory = $uploadDirectory;
    }


    public function upload(UploadedFile $file, $subdirectory_path)
    {
        $fileName = $this->generateFileName($file);
        $file->move($this->getTargetDirectory($subdirectory_path), $fileName);

        return $fileName;
    }

    public function getTargetDirectory($subdirectory_path)
    {
        return $this->uploadDirectory.'/'.$subdirectory_path;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function generateFileName($file)
    {
        var_dump($file);
        return md5(uniqid()).'.'.$file->guessExtension();
    }

    public function removeImageFile($fileName, $subdirectory_path)
    {
        $absolute_path = $this->uploadDirectory.'/'.$subdirectory_path.'/'.$fileName;
        if (file_exists($absolute_path) && !is_dir($absolute_path)) {
            unlink($absolute_path);
        }
    }
}
