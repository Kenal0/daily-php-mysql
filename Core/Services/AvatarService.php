<?php

namespace Core\Services;

class AvatarService
{

    public static function store (array $file, int $userId): string
    {
        $oldFiles = glob(base_path('public/images/avatar_' . $userId . '.*'));
        foreach ($oldFiles as $oldFile)
        {
            if (file_exists($oldFile))
                unlink($oldFile);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'avatar_' . $userId . '.' . $extension;
        $destination = base_path('public/images/' . $filename);

        if (!move_uploaded_file($file['tmp_name'],$destination))
        {
            throw new \Exception("Could not move uploaded file.");
        }

        return '/images/' . $filename;
    }

}