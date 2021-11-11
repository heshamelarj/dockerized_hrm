<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 10/20/19
 * Time: 1:09 AM
 */

namespace App\Service;

    use Symfony\Component\HttpFoundation\File\Exception\FileException;
    use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploadService
{


    private  $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @param UploadedFile $file
     * @return string filename
     */
    public function upload(UploadedFile $file)
    {
        if(!$this->verifyUploadedImageFileExtension($file)) return null;
        $originalFileName = $file->getClientOriginalName();

        $fileName = $originalFileName.'-'. md5(uniqid()).'.'.$file->guessExtension();
        try{
            $file->move(
                $this->targetDirectory,
                $fileName
            );
        }catch(FileException $e) {
            //TODO (heshamelarj): handle this error

        }
        return $fileName;
    }

    /**
     * @param UploadedFile $fileToVerify
     * @return bool
     */
    public function verifyUploadedImageFileExtension(UploadedFile $fileToVerify) : bool
    {
        if($this->checkImageExtentionRegEx($fileToVerify->guessExtension())) return true;
        return false;
    }

    /**
     * @param $fileExtension
     * @return bool
     */
    public function checkImageExtentionRegEx($fileExtension) : bool
    {
        $regPattern = '/(jpeg|png|svg|jpg)/';

        if(preg_match($regPattern, $fileExtension)) return true;
        return false;
    }




}