<?php

namespace FUTAPP\app\BLL;
use FUTAPP\app\helpers\UploadFile;

class FutappBLL
{
    use UploadFile;

    private array $allowedFileTypes;
    private string $uploadsDirectory;
    private array $fileProperties;

    /**
     * FutappBLL constructor.
     * @param array $allowedFileTypes
     * @param string $uploadsDirectory
     * @param array $fileProperties
     */
    public function __construct(array $allowedFileTypes, string $uploadsDirectory, array $fileProperties)
    {
        $this->allowedFileTypes = $allowedFileTypes;
        $this->uploadsDirectory = $uploadsDirectory;
        $this->fileProperties = $fileProperties;
    }

    public function uploadImagen():void{
        $this->uploadFile(
            $this->allowedFileTypes,
            $this->uploadsDirectory,
            $this->fileProperties
        );
    }
}