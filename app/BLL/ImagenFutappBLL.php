<?php
require_once __DIR__.'/../helpers/UploadFile.php';


class ImagenFutappBLL
{
    use UploadFile;

    private array $allowedFileTypes;
    private string $uploadsDirectory;
    private array $fileProperties;

    /**
     * ImagenFutappBLL constructor.
     * @param array $allowedFileTypes
     * @param string $uploadsDirectory
     * @param array $fileProperties
     */
    public function __construct(array $fileProperties)
    {
        $this->allowedFileTypes = ['image/png','image/jpeg'];
        $this->uploadsDirectory = 'images/equipos';
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