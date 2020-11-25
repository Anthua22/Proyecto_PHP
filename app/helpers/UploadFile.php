<?php

namespace FUTAPP\app\helpers;
trait UploadFile
{
    private string $error;
    private string $urlUploadedFile;
    private string $uploadsDirectory;
    private string $uploadedFileName;

    private function checkUploadError(array $fileProperties) : bool
    {
        $existError = $fileProperties['error'] !== UPLOAD_ERR_OK;
        if ($existError) {
            switch($fileProperties['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $this->error = "Se ha superado el tamaño máximo de archivo";
                    break;
                default:
                    $this->error = "No se ha podido subir el archivo";
                    break;
            }
        }

        return !$existError;
    }

    private function checkFileType(
        array $allowedFileTypes,
        array $fileProperties) : bool
    {
        if (array_search(
                $fileProperties['type'],
                $allowedFileTypes) === false)
        {
            $this->error = "Formato de archivo no soportado, solo se admite jpg y png";
            return false;
        }
        return true;
    }

    private function checkHackerAttack(array $fileProperties) : bool
    {
        if (is_uploaded_file($fileProperties['tmp_name']) === false) {
            $this->error = "Ha habido un problema con el archivo subido al servidor, puede haber sido un ataque";
            return false;
        }

        return true;
    }

    private function prepareUploadsDirectory(string $uploadsDirectory)
    {
        $this->uploadsDirectory = $uploadsDirectory;
        if (substr($this->uploadsDirectory, -1) !== '/')
            $this->uploadsDirectory .= '/';
    }

    private function generateUrlUploadFile(array $fileProperties)
    {
        $this->uploadedFileName = $fileProperties['name'];
        $this->urlUploadedFile = $this->uploadsDirectory . $this->uploadedFileName;
        if (is_file($this->urlUploadedFile)) {
            $idUnico = time();
            $this->uploadedFileName = $idUnico . $this->uploadedFileName;
            $this->urlUploadedFile = $this->uploadsDirectory . $this->uploadedFileName;
        }
    }

    private function getPathUploadedFile() : string
    {
        return __DIR__ . '/../' . $this->uploadsDirectory;
    }

    private function moveUploadFile(array $fileProperties)
    {
        $this->generateUrlUploadFile($fileProperties);
        $pathUploadedFile = $this->getPathUploadedFile() . $this->uploadedFileName;

        if (move_uploaded_file(
                $fileProperties['tmp_name'],
                $pathUploadedFile) === false)
            $this->error = "No se ha podido movel el fichero subido";
    }

    public function uploadFile(
        array $allowedFileTypes,
        string $uploadsDirectory,
        array $fileProperties)
    {
        $this->error = '';
        $this->prepareUploadsDirectory($uploadsDirectory);

        if (!isset($fileProperties))
            $this->error = "No existe el campo imagen";
        else {
            if ($this->checkUploadError($fileProperties) === true)
            {
                if ($this->checkFileType($allowedFileTypes, $fileProperties) === true)
                {
                    if ($this->checkHackerAttack($fileProperties) === true)
                        $this->moveUploadFile($fileProperties);
                }
            }
        }
    }

    public function getLastError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getUrlUploadedFile(): string
    {
        return $this->urlUploadedFile;
    }

    /**
     * @return string
     */
    public function getUploadedFileName(): string
    {
        return $this->uploadedFileName;
    }

    /**
     * @param string $uploadedFileName
     * @return UploadFile
     */
    public function setUploadedFileName(string $uploadedFileName): UploadFile
    {
        $this->uploadedFileName = $uploadedFileName;
        return $this;
    }

}