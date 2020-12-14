<?php

$image = new \FUTAPP\app\helpers\GenerateCaptcha();

$image->generateColors();
$image->generateTextColor();
$image->setText();
