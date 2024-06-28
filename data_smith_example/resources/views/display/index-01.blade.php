@extends('layouts.app')

@section('title', 'Display')

@section('content')


{{-- https://webgi.xyz/docs/quickstart --}}

<!--Add this script tag in the page head-->
<script src="https://dist.pixotronics.com/webgi/runtime/viewer-0.9.7.js"> </script>
<!--Add the viewer element somewhere inside the body of the page.-->

{{-- <webgi-viewer
        id="viewer-3d"
        src="https://dist.pixotronics.com/webgi/assets/gltf/cube_diamond_sample.gltf"
        environment="https://dist.pixotronics.com/webgi/assets/hdr/gem_2.hdr"
        style="width: 100%; height: 100%; z-index: 1; display: block;"/> --}}

<webgi-viewer id="viewer-3d" src="/data/LDK_03.gltf" environment="https://dist.pixotronics.com/webgi/assets/hdr/gem_2.hdr" style="width: 100%; height: 100%; z-index: 1; display: block;"/>

<script>
const element = document.getElementById('viewer-3d');

element.addEventListener('initialized', ()=>{
    const viewer = element.viewer; // `ViewerApp`
    console.log(viewer);
    // Use the viewer
    viewer.load("some_other_model");
    viewer.getPlugin(DepthOfFieldPlugin).enabled = true;

})

</script>
@endsection
