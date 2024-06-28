@extends('layouts.app')

@section('title', 'Display')

@section('content')

<style>
body { margin: 0; }
canvas { display: block; }

/* body {
  background: #222;
  color: #fff;
  margin: 0;
}

gltf-modelviewer {
  display: block;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
}

gltf-modelviewer canvas {
  width: 100%;
  height: 100%;
} */
</style>

<div>
    <h1>Display</h1>
</div>

{{-- <iframe src="https://raw.githubusercontent.com/KhronosGroup/glTF-Sample-Models/master/2.0/Duck/glTF/Duck.gltf"  style="width: 100%;" height="400px" frameBorder="0"></iframe> --}}

{{-- <p>
  <a href="https://sketchfab.com/models/294e79652f494130ad2ab00a13fdbafd">Buster Drone</a>,
  by <a href="https://sketchfab.com/lavadragon">LaVADraGoN</a>.
</p>

<iframe src="https://gltf-viewer.donmccurdy.com#kiosk=1&model=https://storage.googleapis.com/blocks-town/tmp/busterDrone/busterDrone.gltf" style="width: 100%;" height="400px" frameBorder="0"></iframe>


<gltf-modelviewer role="img" aria-label="It's a duck" src="https://raw.githubusercontent.com/KhronosGroup/glTF-Sample-Models/master/2.0/Duck/glTF/Duck.gltf" autorotate></gltf-modelviewer> --}}


{{-- <script src="https://cdn.skypack.dev/three/build/three.module.js"></script>
<script src="https://cdn.skypack.dev/three/examples/jsm/controls/OrbitControls.js"></script>
<script src="https://cdn.skypack.dev/three/examples/jsm/loaders/GLTFLoader.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/build/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>

<script>

    // Scene 생성
    var scene = new THREE.Scene();

    // Camera 생성
    var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(0, 0, 5);

    // Renderer 생성
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    // glTF 파일 로드
    var loader = new THREE.GLTFLoader();
    loader.load("https://raw.githubusercontent.com/KhronosGroup/glTF-Sample-Models/master/2.0/Duck/glTF/Duck.gltf", function (gltf) {
      scene.add(gltf.scene);
    });

    // 렌더링 함수
    function animate() {
      requestAnimationFrame(animate);
      renderer.render(scene, camera);
    }
    animate();

// // import * as THREE from 'https://cdn.skypack.dev/three/build/three.module.js';
// // import { OrbitControls } from 'https://cdn.skypack.dev/three/examples/jsm/controls/OrbitControls.js';

// const { OrbitControls } = THREE;

// // //import { GLTFLoader } from 'https://cdn.skypack.dev/three/examples/jsm/loaders/GLTFLoader.js';
// const { GLTFLoader } = THREE;


// class GLTFModelViewer extends HTMLElement {
//   constructor() {
//     super();
//     this.renderer = null;
//     this.scene = null;
//     this.camera = null;
//     this.controls = null;
//     this.frame = -1;
//     this.render = this.render.bind(this);
//     this.onResize = this.onResize.bind(this);
//     this.attributeChangedCallback = this.attributeChangedCallback.bind(this);
//     this.dragging = false;
//   }

//   static register() {
//     if (typeof customElements.get('gltf-modelviewer') === 'undefined') {
//       customElements.define('gltf-modelviewer', GLTFModelViewer);
//     }
//   }

//   static get observedAttributes() {
//     return ['src', 'autorotate'];
//   }

//   get autoRotate() {
//     return this.hasAttribute('autorotate')
//   }

//   get isInitialized() {
//     return Boolean(this.scene && this.controls && this.camera)
//   }

//   onMouseDown(e) {
//     console.log('down');
//     if (e.target === this.canvas) {
//       this.dragging = true;
//     }
//   }

//   onMouseUp(e) {
//     this.dragging = false;
//   }

//   attributeChangedCallback(name, oldValue, newValue) {
//     if (name === 'src' && oldValue !== newValue && this.isInitialized) {
//       this.cleanupScene();
//       this.initScene();
//     }
//     if (name === 'autorotate' && this.isInitialized) {
//       this.updateAutorotate();
//     }
//   }

//   updateAutorotate() {
//     if (this.isInitialized) {
//       this.controls.autoRotate = this.autoRotate;
//       this.controls.update();
//     }

//   }


//   connectedCallback() {
//     if (!this.renderer) {
//       this.setup();
//     }
//   }

//   disconnectedCallback() {
//     this.dispose();
//   }

//   get fov() {
//     return parseInt(this.getAttribute('fov'), 10) || 45;
//   }

//   get aspectRatio() {
//     return this.clientWidth / this.clientWidth || 1;
//   }

//   get src() {
//     return this.getAttribute('src');
//   }

//   setup() {
//     const canvas = document.createElement('canvas');
//     canvas.classList.add('loading');
//     this.appendChild(canvas);
//     this.canvas = canvas;

//     const renderer = new THREE.WebGLRenderer({
//       canvas,
//       alpha: true,
//       antialias: true,
//     });
//     this.renderer = renderer;

//     const near = 0.1;
//     const far = 100;
//     const camera = new THREE.PerspectiveCamera(
//       this.fov,
//       this.aspectRatio,
//       near,
//       far
//     );
//     camera.position.set(0, 10, 20);
//     this.camera = camera;

//     const controls = new OrbitControls(camera, canvas);
//     controls.target.set(0, 5, 0);
//     controls.update();
//     this.controls = controls;

//     const scene = new THREE.Scene();
//     this.scene = scene;

//     this.initScene();

//     this.onResize();
//     window.addEventListener('resize', this.onResize, false);
//     this.updateAutorotate();
//     this.frame = requestAnimationFrame(this.render);
//   }

//   initScene() {
//     this.setupLight();
//     this.loadModel();
//   }

//   setupLight() {
//     const { scene } = this;
//     {
//       const skyColor = 0xb1e1ff; // light blue
//       const groundColor = 0xb97a20; // brownish orange
//       const intensity = 1;
//       const light = new THREE.HemisphereLight(skyColor, groundColor, intensity);
//       scene.add(light);
//     }
//     {
//       const color = 0xffffff;
//       const intensity = 1;
//       const light = new THREE.DirectionalLight(color, intensity);
//       light.position.set(5, 10, 2);
//       scene.add(light);
//       scene.add(light.target);
//     }
//   }

//   createPlane() {
//     const { scene } = this;
//     const planeSize = 40;
//     const loader = new THREE.TextureLoader();
//     const texture = loader.load('/textures/checker.png');
//     texture.wrapS = THREE.RepeatWrapping;
//     texture.wrapT = THREE.RepeatWrapping;
//     texture.magFilter = THREE.NearestFilter;
//     const repeats = planeSize / 2;
//     texture.repeat.set(repeats, repeats);
//     const planeGeo = new THREE.PlaneBufferGeometry(planeSize, planeSize);
//     const planeMat = new THREE.MeshPhongMaterial({
//       map: texture,
//       side: THREE.DoubleSide,
//     });
//     const mesh = new THREE.Mesh(planeGeo, planeMat);
//     mesh.rotation.x = Math.PI * -0.5;
//     scene.add(mesh);
//   }

//   loadModel() {
//     const { controls, scene, camera, canvas } = this;
//     const gltfLoader = new GLTFLoader();
//     gltfLoader.load(
//       this.src,
//       (gltf) => {
//         const root = gltf.scene;
//         scene.add(root);
//         this.model = root;
//         // compute the box that contains all the stuff
//         // from root and below
//         const box = new THREE.Box3().setFromObject(root);

//         const boxSize = box.getSize(new THREE.Vector3()).length();
//         const boxCenter = box.getCenter(new THREE.Vector3());

//         // set the camera to frame the box
//         this.frameArea(boxSize * 2., boxSize, boxCenter, camera);

//         // update the Trackball controls to handle the new size
//         controls.maxDistance = boxSize * 10;
//         controls.target.copy(boxCenter);
//         controls.update();
//         canvas.classList.remove('loading');
//       }
//     );
//   }

//   /**
//    * Arrange the camera so the object fits in the canvas
//    * @param {*} sizeToFitOnScreen
//    * @param {*} boxSize
//    * @param {*} boxCenter
//    */
//   frameArea(sizeToFitOnScreen, boxSize, boxCenter) {
//     const { camera } = this;
//     const halfSizeToFitOnScreen = sizeToFitOnScreen * 0.5;
//     const halfFovY = THREE.MathUtils.degToRad(camera.fov * 0.5);
//     const distance = halfSizeToFitOnScreen / Math.tan(halfFovY);

//     // compute a unit vector that points in the direction the camera is now
//     // in the xz plane from the center of the box
//     const direction = new THREE.Vector3()
//       .subVectors(camera.position, boxCenter)
//       .multiply(new THREE.Vector3(1, 0, 1))
//       .normalize();

//     // move the camera to a position distance units way from the center
//     // in whatever direction the camera was from the center already
//     camera.position.copy(direction.multiplyScalar(distance).add(boxCenter));

//     // pick some near and far values for the frustum that
//     // will contain the box.
//     camera.near = boxSize / 100;
//     camera.far = boxSize * 100;

//     camera.updateProjectionMatrix();

//     // point the camera to look at the center of the box
//     camera.lookAt(boxCenter.x, boxCenter.y, boxCenter.z);
//   }

//   /**
//    * Clean up the scene materials, meshes, geometries, textures
//    */
//   cleanupScene(groupOrScene = null) {
//     if (groupOrScene === null) {
//       groupOrScene = this.scene;
//     }
//     const items = [...groupOrScene.children];
//     for (let item of items) {
//       if (item.children && item.children.length > 0) {
//         this.cleanupScene(item);
//       }
//       const { geometry, material, texture } = item;
//       if (geometry) {
//         geometry.dispose();
//       }
//       if (material) {
//         material.dispose();
//       }
//       if (texture) {
//         texture.dispose();
//       }
//       if (typeof item.dispose === 'function') {
//         item.dispose();
//       }
//       groupOrScene.remove(item);
//     }
//   }

//   dispose() {
//     this.cleanupScene();
//     window.removeEventListener('resize', this.onResize, false);
//     if (this.frame > -1) {
//       cancelAnimationFrame(this.frame);
//       this.frame = -1;
//     }
//     const context = this.renderer.getContext();
//     this.renderer.dispose();
//     const loseCtx = context.getExtension('WEBGL_lose_context');
//     if (loseCtx && typeof loseCtx.loseContext === 'function') {
//       loseCtx.loseContext();
//     }
//     this.removeChild(this.canvas);
//     this.renderer = null;
//     this.scene = null;
//     this.camera = null;
//     this.controls = null;
//   }

//   onResize() {
//     const { renderer, camera } = this;
//     camera.aspect = this.clientWidth / this.clientHeight;
//     camera.updateProjectionMatrix();
//     renderer.setSize(this.clientWidth, this.clientHeight);
//   }

//   needsResize() {
//     const { canvas } = this;
//     const dpr = this.devicePixelRatio;
//     return (
//       canvas.width !== this.clientWidth * dpr ||
//       canvas.height !== this.clientHeight * dpr
//     );
//   }

//   render() {
//     const { renderer, scene, camera } = this;
//     if (this.needsResize()) {
//       this.onResize();
//     }
//     this.controls.update();
//     renderer.render(scene, camera);
//     this.frame = requestAnimationFrame(this.render);
//   }
// }

// GLTFModelViewer.register();

</script>

@endsection
