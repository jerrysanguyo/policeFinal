<?php

namespace App\Services;

use Illuminate\Support\Facades\{
    Auth,
    File,
    Log,
};

use App\{
    Models\Physical,
    Models\Physical_picture,
    Models\Physical_pft,
};

class PhysicalService
{
    public function store(array $data)
    {
        $userId = Auth::id();
        $userFolder = public_path("physical_fitness/user_{$userId}");

        // Ensure the user's folder exists directly inside public
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0755, true);
        }

        // Debugging: Check the uploaded file's MIME type and extension
        foreach (['left', 'right', 'front'] as $position) {
            $picture = $data["picture_{$position}"] ?? null;
            if ($picture) {
                $mimeType = $picture->getMimeType();
                $extension = $picture->getClientOriginalExtension();
                \Log::info("Uploading {$position} picture - MIME type: {$mimeType}, Extension: {$extension}");
            }
        }

        // Store Physical data
        $physical = Physical::create([
            'user_id'       => $userId,
            'bmi_result'    => $data['bmi_result'],
            'bmi_category'  => $data['bmi_category'],
            'waist'         => $data['waist'],
            'hip'           => $data['hip'],
            'wrist'         => $data['wrist'],
            'height'        => $data['height'],
        ]);

        $this->storePictures($data, $userId, $userFolder);

        $this->storePftResults($data, $userId, $userFolder);

        return $physical;
    }

    private function storePictures($data, $userId, $userFolder)
    {
        foreach (['left', 'right', 'front'] as $position) {
            $picture = $data["picture_{$position}"] ?? null;
            if ($picture) {
                $filePath = "{$userFolder}/athletic-pictures";
                if (!File::exists($filePath)) {
                    File::makeDirectory($filePath, 0755, true);
                }

                $pictureName = "athletic_{$position}_" . time() . '.' . $picture->getClientOriginalExtension();
                $picture->move($filePath, $pictureName);

                Physical_picture::create([
                    'user_id'       => $userId,
                    'picture_name'  => $pictureName,
                    'picture_path'  => "physical_fitness/user_{$userId}/athletic-pictures/{$pictureName}",
                    'remarks'       => "athletic {$position}",
                ]);
            }
        }
    }

    private function storePftResults($data, $userId, $userFolder)
    {
        foreach ($data['year'] as $index => $year) {
            $pftPicture = $data['pft_picture'][$index] ?? null;
            $filePath = "{$userFolder}/pft_results";
            if (!File::exists($filePath)) {
                File::makeDirectory($filePath, 0755, true);
            }

            $pftFilePath = null;
            if ($pftPicture) {
                $pftFileName = "pft_{$year}_" . time() . '.' . $pftPicture->getClientOriginalExtension();
                $pftPicture->move($filePath, $pftFileName);
                $pftFilePath = "physical_fitness/user_{$userId}/pft_results/{$pftFileName}";
            }

            Physical_pft::create([
                'user_id'           => $userId,
                'year'              => $year,
                'month'             => 'January-December',
                'date_pft'          => $data['date_pft'][$index],
                'remarks'           => $data['remarks'][$index],
                'score'             => $data['score'][$index],
                'type'              => $data['type'][$index],
                'pft_result_name'   => $pftFileName,
                'pft_result_path'   => $pftFilePath,
            ]);
        }
    }

    public function update(Physical $physical, array $data)
    {
        $physical->update([
            'bmi_result'    => $data['bmi_result'],
            'bmi_category'  => $data['bmi_category'],
            'waist'         => $data['waist'],
            'hip'           => $data['hip'],
            'wrist'         => $data['wrist'],
            'height'        => $data['height'],
        ]);

        return $physical;
    }
    
    public function updatePhysicalPic(Physical_picture $physicalPic, $newPicture)
    {
        // Define only the directory path
        $pictureFolder = public_path(dirname($physicalPic->picture_path));
        $pictureName = basename($physicalPic->picture_path);
    
        // Create directory if it doesn't exist
        if (!File::exists($pictureFolder)) {
            if (!File::makeDirectory($pictureFolder, 0775, true)) {
                return response()->json(['error' => 'Unable to create directory.'], 500);
            }
        }
    
        // Move the new picture to the directory, replacing the old one if it exists
        $newPicture->move($pictureFolder, $pictureName);
    
        return $newPicture;
    }

    public function updatephysicalPft(Physical_pft $physicalPft, array $data, $newPicture)
    {    
        // Only process the new picture if it's provided
        if ($newPicture) {
            $pictureFolder = public_path(dirname($physicalPft->pft_result_path));
            $pictureName = basename($physicalPft->pft_result_name);
    
            // Ensure the directory exists or create it
            if (!File::exists($pictureFolder)) {
                if (!File::makeDirectory($pictureFolder, 0775, true)) {
                    return response()->json(['error' => 'Unable to create directory.'], 500);
                }
            }
    
            // Move the new picture to the directory, replacing the old one if it exists
            $newPicture->move($pictureFolder, $pictureName);
        }

        $physicalPft->update([
            'year'              => $data['year'],
            'month'             => 'January-December',
            'date_pft'          => $data['date_pft'],
            'remarks'           => $data['remarks'],
            'score'             => $data['score'],
            'type'              => $data['type'],
        ]);

        return $physicalPft;
    }

    public function destroy()
    {
        
    }
}