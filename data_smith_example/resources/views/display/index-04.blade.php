@extends('layouts.app')

@section('title', 'Display')

@section('content')


<style>
  /* This keeps child nodes hidden while the element loads */
  :not(:defined) > * {
    display: none;
  }

  model-viewer {
    background-color: #eee;
    overflow-x: hidden;
  }

  #ar-button {
    background-image: url(../../assets/ic_view_in_ar_new_googblue_48dp.png);
    background-repeat: no-repeat;
    background-size: 20px 20px;
    background-position: 12px 50%;
    background-color: #fff;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    bottom: 132px;
    padding: 0px 16px 0px 40px;
    font-family: Roboto Regular, Helvetica Neue, sans-serif;
    font-size: 14px;
    color:#4285f4;
    height: 36px;
    line-height: 36px;
    border-radius: 18px;
    border: 1px solid #DADCE0;
  }

  #ar-button:active {
    background-color: #E8EAED;
  }

  #ar-button:focus {
    outline: none;
  }

  #ar-button:focus-visible {
    outline: 1px solid #4285f4;
  }

  @keyframes circle {
    from { transform: translateX(-50%) rotate(0deg) translateX(50px) rotate(0deg); }
    to   { transform: translateX(-50%) rotate(360deg) translateX(50px) rotate(-360deg); }
  }

  @keyframes elongate {
    from { transform: translateX(100px); }
    to   { transform: translateX(-100px); }
  }

  model-viewer > #ar-prompt {
    position: absolute;
    left: 50%;
    bottom: 175px;
    animation: elongate 2s infinite ease-in-out alternate;
    display: none;
  }

  model-viewer[ar-status="session-started"] > #ar-prompt {
    display: block;
  }

  model-viewer > #ar-prompt > img {
    animation: circle 4s linear infinite;
  }

  model-viewer > #ar-failure {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 175px;
    display: none;
  }

  model-viewer[ar-tracking="not-tracking"] > #ar-failure {
    display: block;
  }

  .slider {
    width: 100%;
    text-align: center;
    overflow: hidden;
    position: absolute;
    bottom: 16px;
  }

  .slides {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
  }

  .slide {
    scroll-snap-align: start;
    flex-shrink: 0;
    width: 100px;
    height: 100px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #fff;
    margin-right: 10px;
    border-radius: 10px;
    border: none;
    display: flex;
  }

  .slide.selected {
    border: 2px solid #4285f4;
  }

  .slide:focus {
    outline: none;
  }

  .slide:focus-visible {
    outline: 1px solid #4285f4;
  }

</style>


<style>
 .card:hover {
    border: 1px solid #4285f4;;
  }
</style>

{{-- https://medium.com/@356sandhu/model-viewer-the-web-component-making-3d-and-ar-accessible-to-everyone-87bb8308a732 --}}
{{-- https://modelviewer.dev/docs/index.html --}}
{{-- https://modelviewer.dev/examples/postprocessing/index.html --}}

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
{{-- <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script> --}}

{{-- <div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-01
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3003/__data/image_01.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-02
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3003/__data/image_02.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-03
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3003/__data/image_03.gltf"
                                shadow-intensity="1"
                                camera-controls
                                disable-tap
                                auto-rotate>
                    </model-viewer>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header" style="font-size:14px">
                <div style="font-size:20px" class="text-right float-right mb-2">image-04
                    <button type="button" class="btn btn-primary" onclick="click__()">...</button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <model-viewer style="width: 400px; height: 300px;"
                                src="http://localhost:3003/__data/image_04.gltf"
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



{{-- <model-viewer style="width: 400px; height: 300px;"
              src="http://localhost:3002/__data/image_01.gltf"
              shadow-intensity="1"
              camera-controls
              disable-tap
              auto-rotate>
</model-viewer>

<model-viewer style="width: 400px; height: 300px;"
              src="http://localhost:3002/__data/image_02.gltf"
              shadow-intensity="1"
              camera-controls
              auto-rotate>
</model-viewer>

<model-viewer style="width: 400px; height: 300px;"
              src="http://localhost:3002/__data/image_03.gltf"
              shadow-intensity="1"
              camera-controls
              auto-rotate>
</model-viewer>

<model-viewer style="width: 400px; height: 300px;"
              src="http://localhost:3002/__data/image_05.gltf"
              shadow-intensity="1"
              camera-controls
              auto-rotate>
</model-viewer>
<model-viewer style="width: 400px; height: 300px;"
              src="http://localhost:3002/__data/image_06.gltf"
              shadow-intensity="1"
              camera-controls
              auto-rotate>
</model-viewer> --}}

{{-- <model-viewer  style="width: 800px; height: 600px;"
               autoplay ar camera-controls touch-action="pan-y" src="http://localhost:3003/__data/image_02.gltf" scale="0.01 0.01 0.01" alt="A 3D model of a horse galloping.">
  <effect-composer>
    <pixelate-effect></pixelate-effect>
  </effect-composer>
</model-viewer> --}}



<model-viewer id="blendViewer" style="width: 800px; height: 600px;" camera-controls touch-action="pan-y" ar src="http://localhost:3003/__data/apollo-11-command-module-exterior-3d-model/scene.gltf" alt="A 3D model of an astronaut">
  <effect-composer render-mode="quality" msaa="8">
    {{-- <color-grade-effect contrast="0.5" saturation="-1" opacity="1" blend-mode="DIVIDE"></color-grade-effect> --}}
    <color-grade-effect contrast="0.5" saturation="-1" opacity="1" blend-mode="DIVIDE" tonemapping="ACES_FILMIC" brightness="0" hue="0"></color-grade-effect>
  </effect-composer>
  <div class="controls">
    <label for="opacity">Opacity</label>
    <input id="opacity" type="range" min="0" max="1" step="0.01" value="1">
    <label for="blend-mode">Blend Mode:</label>
    <select id="blend-mode">
        <option value="default">Default</option>
        <option value="skip">Skip</option>
        <option value="add">Add</option>
        <option value="subtract">Subtract</option>
        <option value="divide">Divide</option>
        <option value="negation">Negation</option>
    </select>
  </div>
</model-viewer>

<model-viewer id="colorViewer" style="width: 800px; height: 600px;" camera-controls touch-action="pan-y" ar src="http://localhost:3003/__data/apollo-11-command-module-exterior-3d-model/scene.gltf" scale="0.1 0.1 0.1" alt="A 3D model of an astronaut">
  <effect-composer render-mode="quality" msaa="8">
    <bloom-effect></bloom-effect>
    <color-grade-effect></color-grade-effect>
  </effect-composer>
  <div class="controls">
    <label for="colorgrading">Color Grading</label>
    <input type="checkbox" id="colorgrading" checked>
    <label for="tonemapping">Tonemapping:</label>
    <select id="tonemapping">
        <option value="aces_filmic">Aces Filmic</option>
        <option value="reinhard">Reinhard</option>
        <option value="reinhard2">Reinhard2</option>
        <option value="reinhard2_adaptive">Reinhard2 Adaptive</option>
        <option value="optimized_cineon">Optimized Cineon</option>
    </select>
  </div>
</model-viewer>


<model-viewer id="transform" style="width: 800px; height: 600px;"  orientation="20deg 0 0" shadow-intensity="1" camera-controls touch-action="pan-y" ar src="http://localhost:3003/__data/apollo-11-command-module-exterior-3d-model/scene.gltf" alt="A 3D model of an astronaut">
  <div class="controls">
    <div>Roll: <input id="roll" value="20" size="3" class="number"> degrees</div>
    <div>Pitch: <input id="pitch" value="0" size="3" class="number"> degrees</div>
    <div>Yaw: <input id="yaw" value="0" size="3" class="number"> degrees</div>
    <div>
      Scale: X: <input id="x" value="1" size="3" class="number">,
      Y: <input id="y" value="1" size="3" class="number">,
      Z: <input id="z" value="1" size="3" class="number">
    </div>
    <button id="frame">Update Framing</button>
  </div>
</model-viewer>


<model-viewer id="color" style="width: 800px; height: 600px;"  camera-controls touch-action="pan-y" interaction-prompt="none" src="http://localhost:3003/__data/apollo-11-command-module-exterior-3d-model/scene.gltf" ar alt="A 3D model of an astronaut">
  <div class="controls" id="color-controls">
    <button data-color="#ff0000" style="color:#ff0000">Red</button>
    <button data-color="#00ff00" style="color:#00ff00">Green</button>
    <button data-color="#0000ff" style="color:#0000ff">Blue</button>
    <button data-color="#FFFF00" style="color:#FFFF00">Yellow</button>
  </div>
</model-viewer>


<model-viewer id="sphere" style="width: 800px; height: 600px;"  camera-controls touch-action="pan-y" interaction-prompt="none" src="http://localhost:3003/__data/apollo-11-command-module-exterior-3d-model/scene.gltf" ar alt="A 3D model of a sphere">
  <div class="controls">
    <div>
      <p>Metalness: <span id="metalness-value"></span></p>
      <input id="metalness" type="range" min="0" max="1" step="0.01" value="1">
    </div>
    <div>
      <p>Roughness: <span id="roughness-value"></span></p>
      <input id="roughness" type="range" min="0" max="1" step="0.01" value="0">
    </div>
  </div>
</model-viewer>

<model-viewer id="neutral-demo" style="width: 800px; height: 600px;" tone-mapping="neutral" camera-controls touch-action="pan-y" auto-rotate alt="A 3D model of a kitchen mixer" src="http://localhost:3003/__data/apollo-11-command-module-exterior-3d-model/scene.gltf">
  <label for="neutral">Neutral Lighting: </label>
  <input id="neutral" type="checkbox" checked="true">
</model-viewer>




<model-viewer id="box" style="width: 800px; height: 600px;" camera-controls touch-action="pan-y" src="http://localhost:3003/__data/apollo-11-command-module-exterior-3d-model/scene.gltf" ar alt="A 3D model of a helmet">
  <div class="controls">
      <p>Rotation: <span id="texture-rotation"></span></p>
      <input type="range" min="0" max="3.14" value="0" step="0.01" id="rotationSlider">
      <p>Scale: <span id="texture-scale"></span></p>
      <input type="range" min="0.5" max="1.5" value="1" step="0.01" id="scaleSlider">
      <p>Offset</p>
      <input type="range" min="0" max="1" value="0" step="0.01" id="offsetSlider">
      <p>WrapMode</p>
      <select id="wrapMode">
        <option value="10497">Repeat</option>
        <option value="33071">ClampToEdge</option>
        <option value="33648">MirroredRepeat</option>
      </select>
    </div>
</model-viewer>


{{-- switch example  --}}
{{-- <model-viewer style="width: 800px; height: 600px;" src="http://localhost:3002/__data/FF2.gltf" tone-mapping="neutral" shadow-intensity="1" ar camera-controls touch-action="pan-y" alt="A 3D model carousel">
  <button slot="ar-button" id="ar-button">
    View in your space
  </button>

  <div id="ar-prompt">
    <img src="http://localhost:3002/__data/컴퓨터.png">
  </div>

  <button id="ar-failure">
    AR is not tracking!
  </button>

  <div class="slider">
    <div class="slides">
      <button class="slide selected" onclick="switchSrc(this, 'FF2')" style="background-image: url('http://localhost:3002/__data/컴퓨터.png');"></button>
      <button class="slide" onclick="switchSrc(this, 'LDK_03')" style="background-image: url('http://localhost:3002/__data/컴퓨터.png');"></button>
    </button></div>
  </div>
</model-viewer> --}}


<script type="module">
const blendViewer = document.querySelector("model-viewer#blendViewer");
const blendEffect = blendViewer.querySelector('color-grade-effect');
const opacity = blendViewer.querySelector('#opacity');
const mode = blendViewer.querySelector('#blend-mode');

opacity.addEventListener('input', (e) => blendEffect.opacity = e.target.value);
mode.addEventListener('change', (e) => blendEffect.blendMode = e.target.value);

// ----

const colorViewer = document.querySelector("model-viewer#colorViewer");
const colorGradeEffect = colorViewer.querySelector('color-grade-effect');
const colorGrading = colorViewer.querySelector('#colorgrading');
const tonemapping = colorViewer.querySelector('#tonemapping');

colorGrading.addEventListener('change', (e) => colorGradeEffect.blendMode = e.target.checked ? 'default' : 'skip');
tonemapping.addEventListener('input', (e) => colorGradeEffect.tonemapping = e.target.value);

// ----

const modelViewerTransform = document.querySelector("model-viewer#transform");
const roll = document.querySelector('#roll');
const pitch = document.querySelector('#pitch');
const yaw = document.querySelector('#yaw');
const x = document.querySelector('#x');
const y = document.querySelector('#y');
const z = document.querySelector('#z');
const frame = document.querySelector('#frame');

frame.addEventListener('click', () => {
  modelViewerTransform.updateFraming();
});

const updateOrientation = () => {
  modelViewerTransform.orientation = `${roll.value}deg ${pitch.value}deg ${yaw.value}deg`;
};

const updateScale = () => {
  modelViewerTransform.scale = `${x.value} ${y.value} ${z.value}`;
};

roll.addEventListener('input', () => {
  updateOrientation();
});
pitch.addEventListener('input', () => {
  updateOrientation();
});
yaw.addEventListener('input', () => {
  updateOrientation();
});
x.addEventListener('input', () => {
  updateScale();
});
y.addEventListener('input', () => {
  updateScale();
});
z.addEventListener('input', () => {
  updateScale();
});

// ---

const modelViewerColor = document.querySelector("model-viewer#color");

document.querySelector('#color-controls').addEventListener('click', (event) => {
  const colorString = event.target.dataset.color;
  const [material] = modelViewerColor.model.materials;
  material.pbrMetallicRoughness.setBaseColorFactor(colorString);
});

// ---

const modelViewerParameters = document.querySelector("model-viewer#sphere");

modelViewerParameters.addEventListener("load", (ev) => {

  let material = modelViewerParameters.model.materials[0];

  let metalnessDisplay = document.querySelector("#metalness-value");
  let roughnessDisplay = document.querySelector("#roughness-value");

  metalnessDisplay.textContent = material.pbrMetallicRoughness.metallicFactor;
  roughnessDisplay.textContent = material.pbrMetallicRoughness.roughnessFactor;

  // Defaults to gold
  material.pbrMetallicRoughness.setBaseColorFactor([0.7294, 0.5333, 0.0392]);

  document.querySelector('#metalness').addEventListener('input', (event) => {
    material.pbrMetallicRoughness.setMetallicFactor(event.target.value);
    metalnessDisplay.textContent = event.target.value;
  });

  document.querySelector('#roughness').addEventListener('input', (event) => {
    material.pbrMetallicRoughness.setRoughnessFactor(event.target.value);
    roughnessDisplay.textContent = event.target.value;
  });

  console.log(`===`);
  console.log(modelViewerParameters.model.materials);
  console.log(modelViewerParameters.model.getMaterialByName('Material'));

  for (let m of modelViewerParameters.model.materials) {
    console.log(m.emissiveFactor);
  }
});

// ---


(() => {
  const modelViewer = document.querySelector('#neutral-demo');
  const checkbox = document.querySelector('#neutral');

  checkbox.addEventListener('change',() => {
    modelViewer.environmentImage = checkbox.checked ? '' : 'legacy';
  });
})();

// ---

const modelViewerTexture2 = document.querySelector("model-viewer#box");
const rotationSlider = document.querySelector('#rotationSlider');
const scaleSlider = document.querySelector('#scaleSlider');
const offsetSlider = document.querySelector('#offsetSlider');

modelViewerTexture2.addEventListener("load", () => {

  const sampler = modelViewerTexture2.model.materials[0].pbrMetallicRoughness['baseColorTexture'].texture.sampler;

  const rotationDisplay = document.querySelector('#texture-rotation');
  const scaleDisplay = document.querySelector('#texture-scale');

  rotationDisplay.textContent = rotationSlider.value;
  scaleDisplay.textContent = scaleSlider.value;

  rotationSlider.addEventListener('input', (event) => {
    const rotation = rotationSlider.value;
    sampler.setRotation(rotation);
    rotationDisplay.textContent = rotation;
  });

  scaleSlider.addEventListener('input', (event) => {
    const scale = {
      u: scaleSlider.value,
      v: scaleSlider.value
    };
    sampler.setScale(scale);
    scaleDisplay.textContent = scale.x;
  });

  offsetSlider.addEventListener('input', (event) => {
    const offset = {
      u: offsetSlider.value,
      v: -offsetSlider.value
    };
    sampler.setOffset(offset);
  });

  document.querySelector('#wrapMode').addEventListener('input', (event) => {
    sampler.setWrapS(Number(event.target.value));
    sampler.setWrapT(Number(event.target.value));
  });
});

// ---

const modelViewer = document.querySelector("model-viewer");

  window.switchSrc = (element, name) => {
    // const base = "http://localhost:3030/" + name;
    const base = "http://localhost:3002/__data/" + name;
    modelViewer.src = base + '.gltf';
    // modelViewer.poster = base + '.webp';
    const slides = document.querySelectorAll(".slide");
    slides.forEach((element) => {element.classList.remove("selected");});
    element.classList.add("selected");
  };

  document.querySelector(".slider").addEventListener('beforexrselect', (ev) => {
    // Keep slider interactions from affecting the XR scene.
    ev.preventDefault();
  });

</script>

@endsection
