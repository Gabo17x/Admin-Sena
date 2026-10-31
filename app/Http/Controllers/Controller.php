<?php

namespace App\Http\Controllers;

use Cloudinary\Cloudinary;

abstract class Controller
{
    protected function subirImagen($archivo, $carpeta)
    {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $archivo->getRealPath(),
            [
                'folder' => $carpeta,
                'resource_type' => 'image',
            ]
        );

        return $resultado['secure_url'];
    }
}