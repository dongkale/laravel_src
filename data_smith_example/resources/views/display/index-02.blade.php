@extends('layouts.app')

@section('title', 'Display')

@section('content')

{{-- https://naver.github.io/egjs-view3d/ --}}

<div>
    <p>3D 모델을 불러옵니다.</p>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <input id="file" type="file" class="form-control" name="file" style="height:auto;" accept=".gltf" required />
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary" onclick="loadModel()">Load</button>
        </div>
    </div>
</div>

{{-- <div id="display-view3d"> --}}
    {{-- <div id="view3d" class="view3d-wrapper view3d-square">
    <canvas class="view3d-canvas" style="width: 500px;height:500px"></canvas>
    </div> --}}

    {{-- <div id="view3d2" class="view3d2-wrapper view3d-square">
    <canvas class="view3d2-canvas" style="width: 500px;height:500px"></canvas>
    </div> --}}
{{-- </div> --}}
<div id="view3d" class="view3d-wrapper view3d-square">
    {{-- <canvas class="view3d-canvas" style="width: 500px;height:500px">dfg</canvas> --}}
</div>

<link rel="stylesheet" href="https://unpkg.com/@egjs/view3d@latest/css/view3d-bundle.min.css">

<script src="https://unpkg.com/@egjs/view3d@latest/dist/view3d.pkgd.min.js"></script>

<script>

// const view3D = new View3D("#view3d", {
//   src: "/data/LDK_03.gltf",
//   envmap: "",
//   zoom: {
//         doubleTap: false
//     },
//   scrollable: true
// });

// let view3D = null;

function loadModel() {
    let id = "#view3d";
    var file = $('#file')[0].files[0];

    __loadModel(id, file.name);
}

function __loadModel(id, fileName) {
  // let srcPath = "/data/" + fileName;
  let srcPath = "http://localhost:3030/" + fileName;

  console.log("src: " + srcPath);

//   if (view3D) {
//     view3D.destroy();

//   }

//   $("#display-view3d").children().remove();
//   let html  = `<div id="view3d" class="view3d-wrapper view3d-square">`;
//       html += ` <canvas class="view3d-canvas" style="width: 500px;height:500px"></canvas>`;
//       html += `</div">`;
//   $("#display-view3d").append(html);
    const width = 500;
    const height = 500;

    $("#view3d").children().remove();
    $("#view3d").append(`<canvas id="id-canvas" class="view3d-canvas" style="width: ${width}px;height: ${height}px"></canvas>`);

    // $(".view3d-annotation-wrapper").remove();

  // 다시 로드

  const view3D = new View3D(id, {
    src: srcPath,
    canvasSelector: "#id-canvas",
    zoom: {
        doubleTap: false
    },
    scrollable: true
  });

  console.log(view3D);

  view3D.on("load", function(e) {
    console.log("loaded");
  });

  view3D.on("error", function(e) {
    console.log("error");
  });

  view3D.on("change", function(e) {
    console.log("change");
  });

  view3D.on("animationend", function(e) {
    console.log("animationend");
  });

  view3D.on("animationstart", function(e) {
    console.log("animationstart");
  });

  view3D.on("animationupdate", function(e) {
    console.log("animationupdate");
  });

  view3D.on("click", function(e) {
    console.log("click");
  });

  view3D.on("contextmenu", function(e) {
    console.log("contextmenu");
  });

  view3D.on("dblclick", function(e) {
    console.log("dblclick");
  });

  view3D.on("mousedown", function(e) {
    console.log("mousedown");
  });

  view3D.on("mousemove", function(e) {
    console.log("mousemove");
  });

  view3D.on("mouseup", function(e) {
    console.log("mouseup");
  });

  view3D.on("resize", function(e) {
    console.log("resize");
  });

  view3D.on("wheel", function(e) {
    console.log("wheel");
  });

  view3D.on("animationend", function(e) {
    console.log("animationend");
  });

  view3D.on("animationstart", function(e) {
    console.log("animationstart");
  });

  view3D.on("animationupdate", function(e) {
    console.log("animationupdate");
  });
}

</script>
@endsection
