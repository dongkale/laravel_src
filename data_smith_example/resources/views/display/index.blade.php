@extends('layouts.app')

@section('title', 'Display')

@section('content')

<style>
.btn-3d {
    background-color: #007bff;
    padding: 0;
    border: none;
    cursor: pointer;
    font-size: 15px;
    width: 75px;
    height: 40px;
    background: url("/images/icons8-3d-48-2.png") #007bff;
    background-size: 32px 32px;
    background-repeat: no-repeat;
    background-position: center;
}

.btn-3d:hover {
    background-color: #0a58ca;
    color: white;
    border-color: #0a53be;
}

.card:hover {
    border: 1px solid #4285f4;;
}

.flex-container {
  display: flex;
  align-items: center; /* Vertically centers the flex items */
  float: right;
  /* margin-bottom: 8px; // Adjust the margin if needed */
}

#lazy-load-poster {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: url("/images/icons8-로딩-서클-3.gif");
    background-size: 48px 48px;
    background-repeat: no-repeat;
    background-position: center;
}

/* spinner */
/* https://codepen.io/huange/pen/QGbRxX */
.spinner {
  /*margin: 50px auto 0;*/
  width: 70px;
  text-align: center;
  /*overflow: auto;*/

  position:absolute;
  bottom:0;
  right:46%;
  margin-bottom: 10px;
/*
position: absolute;
left:50%;
bottom:10%;
z-index: 9999;
height: 100%;
width: 100%;
margin:-70px 0 0 -79px;
*/
}

.spinner > div {
  width: 18px;
  height: 18px;
  background-color: #4C80F1;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% {
      -webkit-transform: scale(0);
      transform: scale(0);
  } 40% {
      -webkit-transform: scale(1.0);
      transform: scale(1.0);
  }
}
/* spinner */

/* model-viewer{
  height: inherit;
  width: inherit;
} */

/* .model-view-css-fix{
  object-fit: contain;
  height: 80vh;
  width:auto;
}
model-viewer {
  width: 40vh;
  height: 80vh;
} */

/* 검색 버튼: [입력창:리스트박스:검색버튼] */
.search-container {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 4px;
    overflow: hidden;
}

.search-input {
    border: none;
    padding: 10px;
    font-size: 16px;
    outline: none;
    flex: 1;
}

.search-listbox {
    border: none;
    padding: 10px;
    font-size: 16px;
    outline: none;
    background-color: white;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
}

.search-button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    outline: none;
}

.search-button:hover {
    background-color: #0056b3;
}

.form-inline .form-control, .form-inline .btn {
    display: inline-block;
    width: auto;
    vertical-align: middle;
}

</style>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>

{{-- <div class="model-view-css-fix">
      <model-viewer id="viewer"
       alt="Neil Armstrong's Spacesuit from the Smithsonian Digitization Programs Office and National Air and Space Museum"
       src="http://localhost:3002/__data/image_01.gltf"
       ar ar-modes="webxr scene-viewer quick-look"
       seamless-poster
       shadow-intensity="1"
       camera-controls>
      </model-viewer>
</div>

<button id="download-button1" onclick="downloadPosterToBlob()">Download1</button>
<button id="download-button2" onclick="downloadPosterToDataURL()">Download2</button> --}}

{{-- <a href="http://localhost:3050/gltf_models/image-01/WorldGridMaterial_BaseColor.png" download>
  <img src="http://localhost:3050/gltf_models/image-01/WorldGridMaterial_BaseColor.png" alt="W3Schools">
</a> --}}

{{-- //<a href='http://localhost:3050/gltf_models/image-01/WorldGridMaterial_BaseColor.png' download Onclick()>Download image</a> --}}


{{-- <a href='#' onclick="downloadImage('http://localhost:3050/gltf_models/image-01/WorldGridMaterial_BaseColor.png', 'WorldGridMaterial_BaseColor.png')">Download image</a>
<a href='#' onclick="downloadNormal('http://localhost:3050/gltf_models/image-01/image_01.bin', 'image_01.bin')">Download normal</a> --}}

<div class="row">
    <div class="col-md-12 mt-3">
        {{-- <div class="search-container">
            <input type="text" class="search-input" placeholder="Search...">
             <select class="search-listbox">
                <option value="all">전체</option>
                <option value="option1">선택 1</option>
                <option value="option2">선택 2</option>
                <option value="option3">선택 3</option>
            </select>
            <button class="search-button">검색</button>
        </div> --}}

        <div class="container">
            <div class="input-group">
                <input type="text" class="form-control" style="width: 50%;" placeholder="검색..." id="searchValue">
                <select class="custom-select">
                    <option value="all">전체</option>
                    <option value="option1">선택 1</option>
                    <option value="option2">선택 2</option>
                    <option value="option3">선택 3</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" onClick="click__()">검색</button>
                </div>
            </div>
        </div>

        {{-- <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            <div class="col-md-3">
                <select class="form-control">
                    <option value="all">All</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block" type="button">Search</button>
            </div>
        </div> --}}

        {{-- <div class="container mt-5">
            <form class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" style="width: 50%;" placeholder="Search...">
                    <select class="form-control" style="width: 25%;">
                        <option value="all">All</option>
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </div>
            </form>
        </div> --}}
    </div>
</div>

<div class="row">
    <div class="col-md-3 mt-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="flex-container">
                    <span>저격총 셋트</span>
                    <button class="btn-3d rounded-sm" style="margin: 0 10px" onClick="click__()"></button>
                    <span>♡ 123 </span>
                </div>
            </div>
            <div class="card-body">
                <div>
                    {{-- <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3002/__data/image_01.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                        <div id="lazy-load-poster" slot="poster"></div>
                    </model-viewer> --}}

                    <model-viewer style="width: 400px; height: 300px;"
                                {{-- src="http://localhost:3030/image-01/image_01.gltf" --}}
                                {{-- src="http://localhost:3050/gltf-files/image-03/image_03.gltf" --}}
                                src="{{$mainUrl . '/image-01/image_01.gltf' }}"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                        <div id="lazy-load-poster" slot="poster"></div>
                    </model-viewer>
                </div>
            </div>
            <div class="card-tail">
                <div class="text-center">
                    <text name="comment" id="comment" cols="3" rows="3" class="form-control">설명...</textarea>
                </div>
                <div class="text-left p-1" style="font-size:13px">
                    <span>created by: 이동관, 2024-06-01</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="asset-list" style="display: ''">
    {{-- <div class="col-md-3 mt-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="flex-container">
                    <span>저격총 셋트</span>
                    <button class="btn-3d rounded-sm" style="margin: 0 10px" onClick="click__()"></button>
                    <span>♡ 123 </span>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3002/__data/image_01.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                        <div id="lazy-load-poster" slot="poster"></div>
                    </model-viewer>

                    <model-viewer style="width: 400px; height: 300px;"
                                src="{{$mainUrl . '/image-01/image_01.gltf' }}"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                        <div id="lazy-load-poster" slot="poster"></div>
                    </model-viewer>
                </div>
            </div>
            <div class="card-tail">
                <div class="text-center">
                    <text name="comment" id="comment" cols="3" rows="3" class="form-control">설명...</textarea>
                </div>
                <div class="text-left p-1" style="font-size:13px">
                    <span>created by: 이동관, 2024-06-01</span>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-3 mt-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-02
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3002/__data/image_02.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-03
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3002/__data/image_03.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-04
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3002/__data/image_04.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mt-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-05
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3002/__data/image_05.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div> --}}



    {{-- <div class="col-md-2">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-05
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 243px; height: 200px;"
                                src="http://localhost:3002/__data/image_05.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-06
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 243px; height: 200px;"
                                src="http://localhost:3002/__data/image_06.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<div class="spinner" id="spinner" style="display: none;margin-bottom:500px" >
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
</div>

{{-- <script type="module">
  import { multiDownload } from '../../node_modules/multi-download/index.js';
</script> --}}

{{-- <script type="module">
	import multiDownload from './index.js';

	document.querySelector('#download-button').addEventListener('click', event => {
		const files = event.target.dataset.files.split(' ');
		multiDownload(files);
	});

	document.querySelector('#download-rename-button').addEventListener('click', event => {
		const files = event.target.dataset.files.split(' ');

		multiDownload(files, {
			rename: ({url, index, urls}) => {
				const extension = url.slice(url.lastIndexOf('.') + 1);
				return `file${index}.${extension}`;
			}
		});
	});
</script> --}}

<script>

let Page = 1;
let Offset = 0;

let PagePerCount = 8;   // 페이지마다 보여줄 갯수
let TotalCount = 0;// 24; // 전체 갯수

// let CurCount = 0;

$(document).ready( function() {
    // arrayAssetList = @json($assetList);

    // const htmlAssetList = getMakeHtmlAssetList(arrayAssetList);
    // $("#asset-list").children().remove();
    // $("#asset-list").append(htmlAssetList);

    // initListenerAssetList(arrayAssetList);

    // var finalPage = Math.floor((TotalCount + (PagePerCount - 1)) / PagePerCount);
    // var offSet = (Page - 1) * PagePerCount;
	// var limit = PagePerCount;

    // viewAssetList(offSet, limit);

    // Page++;

    // console.log(`Page:${Page}, PagePerCount:${PagePerCount}, Offset:${offSet}, Limit:${limit}, finalPage:${finalPage}, TotalCount:${TotalCount}`);

    Page = viewPageAssetList(Page, PagePerCount, TotalCount);



    // for (let item of arrayAssetList) {
    //     const modelViewer = document.getElementById(`id_${item.name}`);

    //     modelViewer.addEventListener('error', (event) => {
    //         console.error('error: ', event.detail);
    //     });

    //     modelViewer.addEventListener('load', (event) => {
    //         console.log('Load: ', event.detail);

    //         dimensions = modelViewer.getDimensions();
    //         console.log(dimensions)
    //         console.log(dimensions.toString());

    //         downloadPosterToDataURL__(modelViewer, `__${item.name}_capture__.png`);
    //     });

    //     modelViewer.addEventListener('poster-dismissed', () => {
    //         console.log('poster-dismissed: ');
    //     });

    //     modelViewer.addEventListener('model-visibility', (event) => {
    //         console.log('model-visibility: ', event.detail.visible);
    //     });

    //     // modelViewer.addEventListener('progress', (event) => {
    //     //     console.log(`progress: ${event.detail.totalProgress * 100} %`);
    //     // });
    // }

    // let options = {
    // 	// root: document.querySelector('#asset-list'),
    //     rootMargin: '0px',
    //     threshold: 1.0
    // }

    // // options에 따라 인스턴스 생성
    // let observer = new IntersectionObserver(callback, options);

    // // 타겟 요소 관찰 시작
    // let target = document.querySelector('#asset-lis');
    // observer.observe(target);

    // const observer = new IntersectionObserver((entries) => {
    //     // if (entries[0].isIntersecting) {
    //     //     console.log('Intersecting');
    //     // }

    //     console.log(`===`);

    //      entries.forEach(entry => {
    //         console.log(entry) // entry is 'IntersectionObserverEntry'
    //     })
    // }, { threshold: 1.0 });
} );

function makeModelViewerId(assetName) {
    return `id_${assetName}`;
}

function initListenerAssetList(assetList) {
    for (const asset of assetList) {
        const modelViewerId = makeModelViewerId(asset.name);

        const modelViewer = document.getElementById(modelViewerId);
        if (!modelViewer) {
            console.error(`modelViewer is null: ${modelViewerId}`);
            continue;
        }

        modelViewer.addEventListener('error', (event) => {
            console.error('error: ', event.detail);
        });

        modelViewer.addEventListener('load', (event) => {
            console.log('Load: ', event.detail);

            // dimensions = modelViewer.getDimensions();
            // console.log(dimensions)
            // console.log(dimensions.toString());

            // downloadPosterToDataURL__(modelViewer, `__${item.name}_capture__.png`);
        });

        // modelViewer.addEventListener('poster-dismissed', () => {
        //     console.log('poster-dismissed: ');
        // });

        // modelViewer.addEventListener('model-visibility', (event) => {
        //     console.log('model-visibility: ', event.detail.visible);
        // });

        modelViewer.addEventListener('progress', (event) => {
            // console.log(`progress: ${event.detail.totalProgress * 100} %`);
            // $(`#${modelViewerId}_per`).html(`${event.detail.totalProgress * 100} %`);
        });
    }
}

function convertDatetime(datetime) {
    const date = new Date(datetime);

    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // getMonth() is zero-based
    const day = String(date.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}

function getMakeHtmlAssetList(arrayAssetList) {
    return arrayAssetList.map(item => getMakeHtmlAsset(item)).join('');
}

function getMakeHtmlAssetList__(arrayAssetList) {
    return arrayAssetList.reduce((html, item) => html + getMakeHtmlAsset(item), '');
}

function getMakeHtmlAsset(assetData) {
    let html = '';

    const modelViewId = makeModelViewerId(assetData.name);

    html += `<div class="col-md-3 mt-3">`;
    html += `   <div class="card">`;
    html += `       <div class="card-header">`;
    html += `           <div style="font-size:18px" class="flex-container text-right float-right">`;
    html += `                <span>${assetData.name}</span>`;
    // html += `                <button class="btn-3d rounded-sm" style="margin: 0 10px" onClick="clickDownload('${assetData.main_url}', '${assetData.forder}', '${assetData.model_files}')"></button>`;
    html += `                <span class="ml-2">♡ ${assetData.download_cnt}</span>`;
    html += `                <a class="ml-2" onclick="clickSnapShot('${modelViewId}', '${assetData.name}')">SnapShot</a>`;
    // html += `                <span id="${modelViewId}_per"></span>`;
    html += `             </div>`;
    html += `       </div>`;
    html += `       <div class="card-body">`;
    html += `           <div>`;
    html += `               <model-viewer id="${modelViewId}" style="width: 400px; height: 300px;"`;
    html += `                       src="${assetData.main_url}/${assetData.forder}/${assetData.model_file}"`;
    html += `                       shadow-intensity="1"`;
    html += `                       camera-controls`;
    html += `                       disable-tap`;
    html += `                       auto-rotate>`;
    html += `                   <div id="lazy-load-poster" slot="poster"></div>`;
    html += `               </model-viewer>`;
    html += `           </div>`;
    html += `       </div>`;
    html += `       <div class="card-tail">`;
    html += `          <div class="text-center">`;
    html += `              <textarea name="description" id="description" cols="2" rows="2" class="form-control">${assetData.description}</textarea>`;
    html += `          </div>`;
    html += `          <div class="text-left p-1" style="font-size:13px">`;
    html += `              <span>created by: ${assetData.author}, ${convertDatetime(assetData.created_at)} <a href='#'>snap shot </a></span>`
    html += `          </div>`
    if (assetData.model_files) {
        const files = assetData.model_files.split(',');
        html += `      <div class="text-left p-1" style="font-size:13px">`;
        html += `           <ul>`;
        for(let file of files) {
            // html += `           <li style="margin-left: -10px;"><a href="${assetData.main_url}/${assetData.forder}/${file}" download>${file}</a></li>`;
            // html += `           <li style="margin-left: -10px;"><a href='#' onclick="downloadImage('${assetData.main_url}/${assetData.forder}/${file}', '${file}')">Download image</a></li>`;
            // const downloadFunc = file.match(/\.(jpg|jpeg|png|gif)$/i) ? 'downloadImage' : 'downloadNormal';

            html += `              <li style="margin-left: -10px;">`;
            html += `                  <a href='#' onclick="${isImageFile(file) ? 'downloadImage' : 'downloadNormal'}('${assetData.main_url}/${assetData.forder}/${file}', '${file}')">${file}</a>`;
            html += `              </li>`;
        }
        html += `           </ul>`;
        html += `      </div>`
    }
    html += `       </div>`;
    html += `   </div>`;
    html += `</div>`;

    return html;
}

function click__() {
    const searchValue = $('#searchValue').val();
    const searchSelect = $('.custom-select').val();

    console.log(`=== click__: searchValue: ${searchValue}, searchSelect: ${searchSelect}`);
}

function clickSnapShot(modelViewId, name) {
    const modelViewer = document.getElementById(modelViewId);
    const url = modelViewer.toDataURL();
    const a = document.createElement("a");
    a.href  = url;
    a.download = name;
    a.click();
    URL.revokeObjectURL(url);
}

async function viewAssetListAsync(searchKey, offset, limit) {
    let totalCount = 0;

    await callAPI({
        method: 'GET',
        url: '/assetList',
        data: {
            "searchKey" : searchKey,
            "offset": offset,
            "limit": limit
        }
    }).then(function (response) {
        if (response.result_code == 0) {
            const arrayAssetList = response.result_data.asset_list;

            if (offset == 1) {
                $("#asset-list").children().remove();
            }

            totalCount = arrayAssetList[0].total_count;

            const htmlAssetList = getMakeHtmlAssetList(arrayAssetList);
            $("#asset-list").append(htmlAssetList);

            initListenerAssetList(arrayAssetList);
        } else {
            alert("처리 중 문제가 발생하였습니다.(0)");
        }
    }).catch(function (error) {
        alert("처리 중 문제가 발생하였습니다.(1)");
        console.log(error);
    }).finally(function () {
        ;
    })

    return totalCount;
}

function viewAssetList(offset, limit) {
    callAPI({
        method: 'GET',
        url: '/assetList',
        data: {
            "offset": offset,
            "limit": limit
        }
    }).then(function (response) {
        var html = '';

        if (response.result_code == 0) {
            const arrayAssetList = response.result_data.asset_list;

            if (offset == 1) {
                $("#asset-list").children().remove();
            }

            TotalCount = arrayAssetList[0].total_count;

            const htmlAssetList = getMakeHtmlAssetList(arrayAssetList);
            $("#asset-list").append(htmlAssetList);

            initListenerAssetList(arrayAssetList);
        } else {
            alert("처리 중 문제가 발생하였습니다.(0)");
        }
    }).catch(function (error) {
        alert("처리 중 문제가 발생하였습니다.(1)");
        console.log(error);
    }).finally(function () {
        ;
    })
}

$(window).scroll(function() {
    // if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
        var finalPage = Math.floor((TotalCount + (PagePerCount - 1)) / PagePerCount);

        console.log(`[OnScroll] === Page:${Page}, finalPage:${finalPage}, TotalCount:${TotalCount}`)

        if (Page <= finalPage) {
            $(".spinner").attr("style", "display:''");
            console.log(`=== scrolling...`);

            // $("#asset-list").append(getMakeHtmlAssetList(arrayAssetList));

            // var offSet = (Page - 1) * PagePerCount;
            // var limit = PagePerCount;

            // viewAssetList(offSet, limit);

            // Page++;

            // console.log(`Page:${Page}, PagePerCount:${PagePerCount}, Offset:${offSet}, Limit:${limit}, finalPage:${finalPage}, TotalCount:${TotalCount}`);

            Page = viewPageAssetList(Page, PagePerCount, TotalCount);
        } else {
             $(".spinner").attr("style", "display:none");

             console.log(`=== scroll end...`);
        }
    }

    // var offset = $('#recruitSearchGroup').offset();
    // var pos = $('#recruitSearchGroup').position();
    // var height = $('#recruitSearchGroup').height();
    // if ($(window).scrollTop() >= pos.top + height) {
    //     console.log(`===`);
    // } else {
    //     console.log(`===`);
    // }
});

function viewPageAssetList(page, pagePerCount, totalCount) {
    const finalPage = Math.floor((totalCount + (pagePerCount - 1)) / pagePerCount);
    const offSet = (page - 1) * pagePerCount;
    const limit = pagePerCount;

    TotalCount = viewAssetList(offSet, limit);

    console.log(`Page:${page}, PagePerCount:${pagePerCount}, Offset:${offSet}, Limit:${limit}, finalPage:${finalPage}, totalCount:${totalCount}`);

    return page + 1;
}

async function viewPageAssetListAsync(page, pagePerCount, searchKey) {
    const __searchValue = $('#searchValue').val();
    const __searchSelect = $('.custom-select').val();

    const offSet = (page - 1) * pagePerCount;
    const limit = pagePerCount;

    TotalCount = await viewAssetListAsync(searchKey, offSet, limit);

    const finalPage = Math.floor((TotalCount + (pagePerCount - 1)) / pagePerCount);

    console.log(`Page:${page}, PagePerCount:${pagePerCount}, Offset:${offSet}, Limit:${limit}, finalPage:${finalPage}, TotalCount:${TotalCount}`);

    return page + 1;
}

async function downloadImage(imageSrc, imageName) {
  const image = await fetch(imageSrc)
  const imageBlog = await image.blob()
  const imageURL = URL.createObjectURL(imageBlog)

  const link = document.createElement('a')
  link.href = imageURL
  link.download = imageName
  document.body.appendChild(link)
  link.click()
  document.body.removeChild(link)
}

async function downloadNormal(fileSrc, fileName) {
    const link = document.createElement('a');
    link.href = fileSrc;
    link.download = fileName;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

///// ------------------------------------------------------------------------
///// ------------------------------------------------------------------------


function __old_getMakeHtmlAssetList(arrayAssetList) {
    let html = '';

    for (let item of arrayAssetList) {
        html += getMakeHtmlAsset(item);
    };

    return html;
}

function clickDownload(mainUrl, forder, modelFiles) {
    const arrayFiles = modelFiles.split(',');

    // console.log(`=== clickDownload: ${arrayFiles}`);

    const arrayFilesDownload = [];
    for (let file of arrayFiles) {
        // console.log(`=== file: ${file}`);
        arrayFilesDownload.push(`${mainUrl}/${forder}/${file}`);
    }

    console.log(`=== file: ${arrayFilesDownload}`);
}

const modelViewer = document.getElementById("viewer");

function downloadPosterToBlob() {
    const blob = modelViewer.toBlob({ idealAspect: false });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "modelViewer_toBlob.png";
    a.click();
    URL.revokeObjectURL(url);
}

function downloadPosterToDataURL() {
    const url = modelViewer.toDataURL();
    const a = document.createElement("a");
    a.href = url;
    a.download = "modelViewer_toDataURL.png";
    a.click();
    URL.revokeObjectURL(url);
}

function downloadPosterToDataURL__(modelViewer, name) {
    const url = modelViewer.toDataURL();
    const a = document.createElement("a");
    a.href = url;
    a.download = name;
    a.click();
    URL.revokeObjectURL(url);
}

// document.querySelector("#download-button1").addEventListener("click", downloadPosterToBlob);
// document.querySelector("#download-button2").addEventListener("click", downloadPosterToDataURL);

// document.addEventListener('DOMContentLoaded', function () {
//     console.log('DOMContentLoaded');
//     const modelViewer = document.querySelector('model-viewer');
//     modelViewer.addEventListener('click', (event) => {
//         console.log('Clicked');
//     });
// });

async function downloadNormal__(fileSrc, fileName) {
//   const link = document.createElement('a')
//   link.href = fileSrc
//   link.download = fileName
//   document.body.appendChild(link)
//   link.click()
//   document.body.removeChild(link)

    // const a = document.createElement('a');
    // a.href = fileSrc;
    // a.download = fileName;
    // document.body.appendChild(a);
    // a.click();
    // document.body.removeChild(a);

    var frame = document.createElement("iframe");
    frame.src = fileSrc;
    frame["download"] = 1
    document.body.appendChild(frame);
}

// import multiDownload from '../multi-download';
// const multiDownload = require("multi-download");

function __clickDownload(mainUrl, forder, modelFiles) {
    const arrayFiles = modelFiles.split(',');

    const arrayFilesDownload = [];
    for (let file of arrayFiles) {
        // window.open(`${mainUrl}/${forder}/${file}`, '_blank');
        // // window.open(`${mainUrl}/${forder}/${file}`);
        // console.log(`=== ${mainUrl}/${forder}/${file}`);

        const url = `${mainUrl}/${forder}/${file}`;
        // const a = document.createElement('a');
        // a.href = url;
        // a.download = file.split('/').pop(); // Get the filename from the URL
        // document.body.appendChild(a);
        // a.click();
        // document.body.removeChild(a);

        // var frame = document.createElement("iframe");
        // frame.src = url;
        // frame["download"] = 1
        // document.body.appendChild(frame);

        // arrayFilesDownload.push([url, 'data:text/csv;charset=utf8,'+encodeURIComponent('my,csv,file\and,so,on')]);

        arrayFilesDownload.push(url);
    }

    multiDownload(arrayFilesDownload);

    // downloadAll([
    //     ['file1.csv', 'data:text/csv;charset=utf8,'+
    //               encodeURIComponent('my,csv,file\and,so,on')],
    //     ['file2.txt', 'data:text/plain;charset=utf8,'+
    //               encodeURIComponent('this script can do what I need.')],
    //     ['file3.js', 'data:text/javascriptcharset=utf8,'+
    //               encodeURIComponent('alert(\'You can donate me your house if you like this script :-) \')')]
    // ]);

    // downloadAll(arrayFilesDownload);
}

// function downloadAll(files){
//     if(files.length == 0) return;
//     file = files.pop();
//     var theAnchor = $('<a />')
//         .attr('href', file[1])
//         .attr('download',file[0])
//         // Firefox does not fires click if the link is outside
//         // the DOM
//         .appendTo('body');

//     theAnchor[0].click();
//     theAnchor.remove();
//     downloadAll(files);
// }

const delay = milliseconds => new Promise(resolve => {
	setTimeout(resolve, milliseconds);
});

const download = async (url, name) => {
	const a = document.createElement('a');
	a.download = name;
	a.href = url;
	a.style.display = 'none';
	document.body.append(a);
	a.click();

	// Chrome requires the timeout
	await delay(100);
	a.remove();
};

async function multiDownload(urls, {rename} = {}) {
	if (!urls) {
		throw new Error('`urls` required');
	}

	for (const [index, url] of urls.entries()) {
		const name = typeof rename === 'function' ? rename({url, index, urls}) : '';

		await delay(index * 1000); // eslint-disable-line no-await-in-loop
		download(url, name);
	}
}

function __old_getMakeHtmlAssetList(arrayAssetList) {
    let html = '';

    for (let item of arrayAssetList) {
        const modelViewId = makeModelViewerId(assetData.name);

        html += getMakeHtmlAsset(modelViewId, item);

        // const viewId = `id_${item.name}`;

        // html += `<div class="col-md-3 mt-3">`;
        // html += `   <div class="card">`;
        // html += `       <div class="card-header">`;
        // html += `           <div style="font-size:18px" class="flex-container text-right float-right">`;
        // html += `                <span>${item.name}</span>`;
        // // html += `                <button class="btn-3d rounded-sm" style="margin: 0 10px" onClick="clickDownload('${item.forder}', '${item.model_files}')"></button>`;
        // html += `                <span class="ml-2">♡ ${item.download_cnt}</span>`;
        // html += `                <a class="ml-2" onclick="clickSnapShot('${viewId}', '${item.name}')">SnapShot</a>`;
        // html += `             </div>`;
        // html += `       </div>`;
        // html += `       <div class="card-body">`;
        // html += `           <div>`;
        // html += `               <model-viewer id="${viewId}" style="width: 400px; height: 300px;"`;
        // html += `                       src="${item.main_url}/${item.forder}/${item.model_file}"`;
        // html += `                       shadow-intensity="1"`;
        // html += `                       camera-controls`;
        // html += `                       disable-tap`;
        // html += `                       auto-rotate>`;
        // html += `                   <div id="lazy-load-poster" slot="poster"></div>`;
        // html += `               </model-viewer>`;
        // html += `           </div>`;
        // html += `       </div>`;
        // html += `       <div class="card-tail">`;
        // html += `          <div class="text-center">`;
        // html += `              <textarea name="description" id="description" cols="2" rows="2" class="form-control">${item.description}</textarea>`;
        // html += `          </div>`;
        // html += `          <div class="text-left p-1" style="font-size:13px">`;
        // html += `              <span>created by: ${item.author}, ${convertDatetime(item.created_at)} <a href='#'>short cut </a></span>`
        // html += `          </div>`
        // if (item.model_files) {
        //     const files = item.model_files.split(',');
        //     html += `      <div class="text-left p-1" style="font-size:13px">`;
        //     html += `           <ul>`;
        //     for(let file of files) {
        //         // html += `           <li style="margin-left: -10px;"><a href="${mainUrl}/${item.forder}/${file}" download>${file}</a></li>`;
        //         // html += `           <li style="margin-left: -10px;"><a href='#' onclick="downloadImage('${mainUrl}/${item.forder}/${file}', '${file}')">Download image</a></li>`;
        //         const downloadFunc = file.match(/\.(jpg|jpeg|png|gif)$/i) ? 'downloadImage' : 'downloadNormal';
        //         html += `              <li style="margin-left: -10px;"><a href='#' onclick="${downloadFunc}('${mainUrl}/${item.forder}/${file}', '${file}')">${file}</a></li>`;
        //     }
        //     html += `           </ul>`;
        //     html += `      </div>`
        // }
        // html += `       </div>`;
        // html += `   </div>`;
        // html += `</div>`;
    };

    // html += `                <button class="btn-3d rounded-sm" style="margin: 0 10px" onClick="clickDownload('${item.forder}', '${item.model_files}')"></button>`;

    return html;
}

</script>

@endsection
