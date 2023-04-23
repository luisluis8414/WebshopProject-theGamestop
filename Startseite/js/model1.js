import * as THREE from 'three'
import {GLTFLoader} from 'three/addons/loaders/GLTFLoader.js'
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

const scene = new THREE.Scene();
const canvas = document.getElementById('model1');

const camera= new THREE.PerspectiveCamera(
  75,
  window.innerWidth/window.innerHeight,
  0.01,
  1000
);

camera.position.set(0, 0.4 , 2);

const renderer= new THREE.WebGLRenderer({
  canvas: canvas,
  alpha: true, 
  antialias: true
});

const controls = new OrbitControls( camera, renderer.domElement );
controls.enableDamping=true;



renderer.setSize(window.innerWidth/2, window.innerHeight/2);
// renderer.setClearColor(0x000000, 0);
renderer.setPixelRatio( window.devicePixelRatio );


const loader= new GLTFLoader();

let mixer;
let obj;
loader.load('models/WW1Plane/scene.gltf', function(gltf){
  obj=gltf.scene;
  obj.rotation.y-=0.3
  // obj.position.z-=2
  scene.add(gltf.scene);
  mixer = new THREE.AnimationMixer(obj);
  const clips=gltf.animations;
  const clip = THREE.AnimationClip.findByName(clips, 'Take 001');
  const action =mixer.clipAction(clip);
  action.play();
});


// scene.background=new THREE.Color(0xffffff);

const light = new THREE.AmbientLight( 0x404040, 10); // soft white light
scene.add( light );

let rotationBool=true;
let increment=0.001

const clock = new THREE.Clock();
function animate() {
  	requestAnimationFrame( animate );

    controls.update();

    animationFlying();
    // if(obj2) obj2.rotation.y+=0.01;
  	renderer.render(scene, camera);
  } 
function animationFlying(){
  if(obj) {
    mixer.update(clock.getDelta());
    if (rotationBool) {
      obj.rotation.y += increment;
    } else {
      obj.rotation.y -= increment;
    }
    if (obj.rotation.y > 0.5 || obj.rotation.y < -0.5) {
      rotationBool = !rotationBool;
    }
  }
}
  animate()








