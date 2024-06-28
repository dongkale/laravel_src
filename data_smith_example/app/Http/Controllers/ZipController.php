<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use Auth;
use Zip;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\File;
use Storage;

class ZipController extends Controller
{
    public function createZip()
    {
        // https://stackoverflow.com/questions/76529080/class-ziparchive-not-found-in-laravel
        // https://stackoverflow.com/questions/47139800/how-to-fix-fatal-error-maximum-execution-time-of-30-seconds-exceeded

        // ; Maximum execution time of each script, in seconds
        // ; https://php.net/max-execution-time
        // ; Note: This directive is hardcoded to 0 for the CLI SAPI
        // max_execution_time = 360

        // https://github.com/stechstudio/laravel-zipstream

        $zip = new ZipArchive();
        $zipFileName = "sample.zip";

        if (
            $zip->open(public_path($zipFileName), ZipArchive::CREATE) === true
        ) {
            $filesToZip = [
                public_path("__data/image_01.bin"),
                public_path("__data/image_01.gltf"),
                public_path("__data/WorldGridMaterial_BaseColor.png"),
                public_path("__data/WorldGridMaterial_MetallicRoughness.png"),
                public_path("__data/WorldGridMaterial_Normal.png"),
            ];

            foreach ($filesToZip as $file) {
                $zip->addFile($file, basename($file));
            }

            $zip->close();

            return response()
                ->download(public_path($zipFileName))
                ->deleteFileAfterSend(true);
        } else {
            return "Failed to create the zip file.";
        }
    }

    public function createZip2()
    {
        # define file array
        $files = [
            "http://localhost:3003/__data/image_01.gltf",
            "http://localhost:3003/__data/image_02.gltf",
        ];

        # create new zip object
        $zip = new ZipArchive();
        $zipFileName = "sample.zip";

        // # create a temp file & open it
        // $tmp_file = tempnam(".", "");
        // $zip->open($tmp_file, ZipArchive::CREATE);

        // # loop through each file
        // foreach ($files as $file) {
        //     # download file
        //     $download_file = file_get_contents($file);

        //     // $download_file = $this->curl_get_contents($file);

        //     #add it to the zip
        //     $zip->addFromString(basename($file), $download_file);
        // }

        // # close zip
        // $zip->close();

        // # send the file to the browser as a download
        // // header('Content-disposition: attachment; filename="my file.zip"');
        // // header("Content-type: application/zip");
        // // readfile($tmp_file);
        // // unlink($tmp_file);

        // return response()
        //     ->download(public_path($zipFileName))
        //     ->deleteFileAfterSend(true);

        if (
            $zip->open(public_path($zipFileName), ZipArchive::CREATE) === true
        ) {
            $files = [
                "http://localhost:3003/__data/image_01.gltf",
                "http://localhost:3003/__data/image_01.bin",
            ];

            // # loop through each file
            foreach ($files as $file) {
                # download file
                $download_file = file_get_contents($file); // 큰화일은 안됨

                // $download_file = $this->curl_get_contents($file);

                #add it to the zip
                $zip->addFromString(basename($file), $download_file);
            }

            $zip->close();

            return response()
                ->download(public_path($zipFileName))
                ->deleteFileAfterSend(true);
        } else {
            return "Failed to create the zip file.";
        }
    }

    function curl_get_contents($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function downloadZip()
    {
        $zip = new ZipArchive();
        $fileName = "files.zip";
        $filePath = storage_path($fileName);

        $client = new Client();

        // 파일 URL 배열
        // $fileUrls = [
        //     "http://localhost:3003/__data/image_01.gltf",
        //     "http://localhost:3003/__data/image_01.bin",
        //     "http://localhost:3003/__data/image_02.gltf",
        //     "http://localhost:3003/__data/image_03.gltf",
        // ];
        // $fileUrls = [
        //     "http://localhost:3030/image-01/image_01.gltf",
        //     "http://localhost:3030/image-01/image_01.bin",
        //     "http://localhost:3030/image-01/WorldGridMaterial_BaseColor.png",
        //     "http://localhost:3030/image-01/WorldGridMaterial_MetallicRoughness.png",
        //     "http://localhost:3030/image-01/WorldGridMaterial_Normal.png",
        // ];

        $fileUrls = [
            "http://localhost:3050/gltf_models/image-01/image_01.gltf",
            "http://localhost:3050/gltf_models/image-01/image_01.bin",
            "http://localhost:3050/gltf_models/image-01/WorldGridMaterial_BaseColor.png",
            "http://localhost:3050/gltf_models/image-01/WorldGridMaterial_MetallicRoughness.png",
            "http://localhost:3050/gltf_models/image-01/WorldGridMaterial_Normal.png",
        ];

        // 임시 파일 저장 경로
        $tempDir = storage_path("temp_files");

        if (!File::exists($tempDir)) {
            File::makeDirectory($tempDir, 0755, true);
        }

        if (
            $zip->open(
                $filePath,
                ZipArchive::CREATE | ZipArchive::OVERWRITE
            ) === true
        ) {
            // foreach ($fileUrls as $fileUrl) {
            //     $fileName = basename($fileUrl);
            //     $tempFilePath = $tempDir . "/" . $fileName;

            //     // URL에서 파일 다운로드
            //     $response = $client->get($fileUrl, ["sink" => $tempFilePath]);

            //     // 다운로드가 성공하면 파일을 압축 파일에 추가
            //     if ($response->getStatusCode() == 200) {
            //         $zip->addFile($tempFilePath, $fileName);
            //     }
            // }

            foreach ($fileUrls as $fileUrl) {
                $fileName = basename($fileUrl);
                $tempFilePath = $tempDir . "/" . $fileName;

                try {
                    // URL에서 파일 다운로드
                    $response = $client->get($fileUrl, [
                        "sink" => $tempFilePath,
                        "verify" => false, // SSL 검증 비활성화 (테스트 목적)
                    ]);

                    // 다운로드가 성공하면 파일을 압축 파일에 추가
                    if ($response->getStatusCode() == 200) {
                        $zip->addFile($tempFilePath, $fileName);
                    }
                } catch (RequestException $e) {
                    // 에러 로그 출력
                    Log::error("File download failed: " . $e->getMessage());
                }
            }

            $zip->close();
        } else {
            return response()->json(
                ["error" => "Could not create zip file"],
                500
            );
        }

        // 임시 파일 삭제
        File::deleteDirectory($tempDir);

        return response()
            ->download($filePath)
            ->deleteFileAfterSend(true);
    }
}
