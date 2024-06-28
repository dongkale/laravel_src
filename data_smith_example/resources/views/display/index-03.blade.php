@extends('layouts.app')

@section('title', 'Display')

@section('content')

{{-- https://doc.babylonjs.com/features/featuresDeepDive/babylonViewer --}}

<script src="https://cdn.babylonjs.com/viewer/babylon.viewer.js"></script>

<babylon model="http://localhost:3030/FF2.gltf">
    <vr object-scale-factor="1">
    </vr>
    <!-- This is needed in order to show the VR button. It is also possible to toggleVR() using javascript -->
    <templates>
        <nav-bar>
            <params hide-vr="false"></params>
        </nav-bar>
    </templates>
</babylon>

<babylon extends="minimal">
    <model url="http://localhost:3030/FF2.gltf">
        <scaling x="1" y="1" z="1"></scaling>
    </model>
    <camera>
        <behaviors>
            <auto-rotate type="0"></auto-rotate>
        </behaviors>
    </camera>
</babylon>

<script>
</script>
@endsection
