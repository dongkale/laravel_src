<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DisplayController extends Controller
{
    public function display()
    {
        $mainUrl = "http://localhost:3050/gltf_models"; // 네트워크 드라이브
        // $mainUrl = "http://localhost:3030"; // nestjs 서버
        // $mainUrl = "http://localhost:3002/__data"; // 라라벨 서버

        $assetList = [
            [
                "name" => "sniper-rifle set",
                "keyword" => "",
                "description" => "저격총 셋트...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-01",
                "model_file" => "image_01.gltf",
                "model_files" =>
                    "image_01.gltf,image_01.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 1,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "sniper-rifle",
                "keyword" => "",
                "description" => "저격총...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-02",
                "model_file" => "image_02.gltf",
                "model_files" =>
                    "image_02.gltf,image_02.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 10,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "image-03",
                "keyword" => "",
                "description" =>
                    "image-03: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-03",
                "model_file" => "image_03.gltf",
                "model_files" =>
                    "image_03.gltf,image_03.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 5,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "공격용 소총",
                "keyword" => "",
                "description" =>
                    "image-04: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-04",
                "model_file" => "image_04.gltf",
                "model_files" =>
                    "image_04.gltf,image_04.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 8,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "image-05",
                "keyword" => "",
                "description" =>
                    "image-05: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-05",
                "model_file" => "image_05.gltf",
                "model_files" =>
                    "image_05.gltf,image_05.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 59,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "image-06",
                "keyword" => "",
                "description" =>
                    "image-06: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-06",
                "model_file" => "image_06.gltf",
                "model_files" =>
                    "image_06.gltf,image_06.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 1,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "image-07",
                "keyword" => "",
                "description" =>
                    "image-07: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-07",
                "model_file" => "image_07.gltf",
                "model_files" =>
                    "image_07.gltf,image_07.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 59,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "image-08",
                "keyword" => "",
                "description" =>
                    "image-08: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-08",
                "model_file" => "image_08.gltf",
                "model_files" =>
                    "image_08.gltf,image_08.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 1,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "name" => "image-09",
                "keyword" => "",
                "description" =>
                    "image-09: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-09",
                "model_file" => "image_09.gltf",
                "model_files" =>
                    "image_09.gltf,image_09.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 1,
                "created_at" => "2024-06-18 00:00:00",
            ],
        ];

        // for ($i = 0; $i < count($list); $i++) {
        //     $list[$i]["files"] = explode(",", $list[$i]["files"]);
        // }

        return view("display.index", [
            "mainUrl" => $mainUrl,
            "assetList" => $assetList,
        ]);
    }

    public function assetList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "offset" => "required",
            "limit" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "result_code" => -1,
                "result_message" => $validator->errors(),
            ]);
        }

        $offset = $request->offset;
        $limit = $request->limit;

        $totalCount = 16;

        $mainUrl = "http://localhost:3050/gltf_models"; // nodejs server(네트워크 드라이브, file)
        // $mainUrl = "http://localhost:3030"; // nestjs 서버
        // $mainUrl = "http://localhost:3002/__data"; // 라라벨 서버

        $assetList = [
            [
                "total_count" => $totalCount,
                "name" => "sniper-rifle-set",
                "keyword" => "",
                "description" => "저격총 셋트...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-01",
                "model_file" => "image_01.gltf",
                "model_files" =>
                    "image_01.gltf,image_01.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 1,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "total_count" => $totalCount,
                "name" => "sniper-rifle-01",
                "keyword" => "",
                "description" => "저격총...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-02",
                "model_file" => "image_02.gltf",
                "model_files" =>
                    "image_02.gltf,image_02.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 10,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "total_count" => $totalCount,
                "name" => "image-03",
                "keyword" => "",
                "description" =>
                    "image-03: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-03",
                "model_file" => "image_03.gltf",
                "model_files" =>
                    "image_03.gltf,image_03.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 5,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "total_count" => $totalCount,
                "name" => "sniper-rifle-02",
                "keyword" => "",
                "description" =>
                    "image-04: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-04",
                "model_file" => "image_04.gltf",
                "model_files" =>
                    "image_04.gltf,image_04.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 8,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "total_count" => $totalCount,
                "name" => "image-05",
                "keyword" => "",
                "description" =>
                    "image-05: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-05",
                "model_file" => "image_05.gltf",
                "model_files" =>
                    "image_05.gltf,image_05.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 59,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "total_count" => $totalCount,
                "name" => "image-06",
                "keyword" => "",
                "description" =>
                    "image-06: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-06",
                "model_file" => "image_06.gltf",
                "model_files" =>
                    "image_06.gltf,image_06.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 1,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "total_count" => $totalCount,
                "name" => "image-07",
                "keyword" => "",
                "description" =>
                    "image-07: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-07",
                "model_file" => "image_07.gltf",
                "model_files" =>
                    "image_07.gltf,image_07.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 59,
                "created_at" => "2024-06-18 00:00:00",
            ],
            [
                "total_count" => $totalCount,
                "name" => "image-08",
                "keyword" => "",
                "description" =>
                    "image-08: 설명...설명...설명...설명...설명...설명...설명...",
                "sshot_url" => "...",
                "main_url" => $mainUrl,
                "forder" => "image-08",
                "model_file" => "image_08.gltf",
                "model_files" =>
                    "image_08.gltf,image_08.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
                "author" => "LDK",
                "download_cnt" => 1,
                "created_at" => "2024-06-18 00:00:00",
            ],
            // [
            //     "total_count" => $totalCount,
            //     "name" => "image-09",
            //     "keyword" => "",
            //     "description" =>
            //         "image-09: 설명...설명...설명...설명...설명...설명...설명...",
            //     "sshot_url" => "...",
            //     "main_url" => $mainUrl,
            //     "forder" => "image-09",
            //     "model_file" => "image_09.gltf",
            //     "model_files" =>
            //         "image_09.gltf,image_09.bin,WorldGridMaterial_BaseColor.png,WorldGridMaterial_MetallicRoughness.png,WorldGridMaterial_Normal.png",
            //     "author" => "LDK",
            //     "download_cnt" => 1,
            //     "created_at" => "2024-06-18 00:00:00",
            // ],
        ];

        return response()->json([
            "result_code" => 0,
            "result_message" => "Success",
            "result_data" => [
                "asset_list" => $assetList,
                "offset" => $offset,
                "limit" => $limit,
            ],
        ]);
    }

    public function test()
    {
        return view("display.index-04", []);
    }
}
