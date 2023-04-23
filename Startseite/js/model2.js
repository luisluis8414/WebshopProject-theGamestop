import * as THREE from 'three'
import {GLTFLoader} from 'three/addons/loaders/GLTFLoader.js'

const scene = new THREE.Scene();
const canvas = document.getElementById('model2');

const camera= new THREE.PerspectiveCamera(
  75,
  window.innerWidth/window.innerHeight,
  0.01,
  1000
);

camera.position.set(0, 1 , 1);

const renderer= new THREE.WebGLRenderer({
  canvas: canvas,
  alpha: true 
});

renderer.setSize(window.innerWidth/2, window.innerHeight/2);
renderer.setClearColor(0x000000, 0);
renderer.setPixelRatio( window.devicePixelRatio );


const loader= new GLTFLoader();

let mixer;
let obj;
loader.load('models/plane2/scene.gltf', function(gltf){
  obj=gltf.scene;
  obj.rotation.y-=3
  obj.position.z-=2
  scene.add(gltf.scene);
  mixer = new THREE.AnimationMixer(obj);
  const clips=gltf.animations;
  const clip = THREE.AnimationClip.findByName(clips, 'Action');
  const action =mixer.clipAction(clip);
  action.play();
});

// scene.background=new THREE.Color(0xffffff);

const light = new THREE.AmbientLight( 0x404040, 10); // soft white light
scene.add( light );

const clock = new THREE.Clock();
function animate() {
  	requestAnimationFrame( animate );
    if(obj) {
      obj.rotation.y+=0;
    //   if(obj.position.z<0)obj.position.z+=0.001;
      mixer.update(clock.getDelta());
    }
  	renderer.render(scene, camera);
  } 

  animate()