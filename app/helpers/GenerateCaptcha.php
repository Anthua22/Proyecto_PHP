<?php


namespace FUTAPP\app\helpers;


class GenerateCaptcha
{
    const CARACTERES= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const FONTS = [__DIR__.'/../../public/fonts/Acme-Regular.ttf', __DIR__.'/../../public/fonts/Merriweather-Black.ttf', __DIR__.'/../../public/fonts/PlayfairDisplay-Italic-VariableFont_wght.ttf', __DIR__.'/../../public/fonts/Ubuntu-Bold.ttf'];
    const NUMLETRAS =6;
    /**
     * GenerateCaptcha constructor.
     */

    private array $colores;
    private $image;
    private array $textcolors;

    public function __construct()
    {
        $this->colores=[];
        $this->image= imagecreatetruecolor(200,50);
        imageantialias($this->image,true);

    }

    public function generateTextColor(){
        $black = imagecolorallocate($this->image, 0, 0, 0);
        $white = imagecolorallocate($this->image, 255, 255, 255);
        $this->textcolors = [$black, $white];

    }

    public function generateColors(){

        $red = rand(125, 175);
        $green = rand(125, 175);
        $blue = rand(125, 175);

        for($i = 0; $i < self::NUMLETRAS; $i++) {

            $this->colores[] = imagecolorallocate($this->image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
        }

        imagefill($this->image, 0, 0, $this->colores[0]);
    }

    public function setText(){
        $texto = $this->generateRandomText();
        $_SESSION['captcha'] = $texto;

        for($i = 0; $i < self::NUMLETRAS; $i++) {
            $letter_space = 170/6;
            $initial = 15;

            imagettftext($this->image, 24, rand(-15, 15), $initial + $i*$letter_space, rand(25, 45), $this->textcolors[rand(0, 1)], self::FONTS[array_rand( self::FONTS)],$texto[$i]);
        }

        header('Content-type: image/png');
        imagepng($this->image);
        imagedestroy($this->image);
    }


    private function generateRandomText():string{
        $input_length = strlen(self::CARACTERES);
        $random_string = '';
        for($i = 0; $i < self::NUMLETRAS; $i++) {
            $random_character = self::CARACTERES[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }







}