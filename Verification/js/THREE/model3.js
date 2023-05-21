import * as THREE from 'three'
import {GLTFLoader} from 'three/addons/loaders/GLTFLoader.js'
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
import {RGBELoader} from 'three/addons/loaders/RGBELoader.js'

const scene = new THREE.Scene();
const canvas = document.getElementById('responsive-canvas1');
var heightRatio = 1.5;
canvas.height = canvas.width * heightRatio;

const camera= new THREE.PerspectiveCamera(
  75,
  window.innerWidth/window.innerHeight,
  0.01,
  1000
);

camera.position.set(2  ,2   , 2  );




const RGBEloader = new RGBELoader();
RGBEloader.load('../../src/HDR_Free_City_Night_Lights_Ref.hdr', function(texture){
  texture.mapping = THREE.EquirectangularReflectionMapping;
  // scene.background=texture;
  scene.environment=texture;
})

const renderer= new THREE.WebGLRenderer({
  canvas: canvas,
  alpha: true, 
  // antialias: true,
  logarithmicDepthBuffer: true
});

const controls = new OrbitControls( camera, renderer.domElement );
controls.enableDamping=true;

renderer.outputEncoding =THREE.sRGBEncoding;
// renderer.toneMapping=THREE.ACESFilmicToneMapping
// renderer.toneMappingExposure=1.8;


renderer.setSize(window.innerWidth, window.innerHeight);
// renderer.setClearColor(0x000000, 0);
renderer.setPixelRatio( window.devicePixelRatio );


const loader= new GLTFLoader();

let mixer;
let obj;
loader.load('../../models/samurai_helmet/scene.gltf', function(gltf){
  obj=gltf.scene;
  obj.position.z=0
  obj.position.y=0
  obj.position.x=0

 
  scene.add(gltf.scene);
  mixer = new THREE.AnimationMixer(obj);
  const clips=gltf.animations;
  const clip = THREE.AnimationClip.findByName(clips, 'Object_0');
  const action =mixer.clipAction(clip);
  action.play();
});


// scene.background=new THREE.Color(0xffffff);
const axesHelper = new THREE.AxesHelper( 500);
scene.add( axesHelper );

const ambientLight = new THREE.AmbientLight(0x404040, 0.1);

const light = new THREE.DirectionalLight(0x404040, 3); // soft white light
light.position.set(150,159,96);
light.target.position.set(-100,-50,0);

scene.add( light );
scene.add(light.target)
scene.add( ambientLight );

// const helper = new THREE.DirectionalLightHelper(light, 5);

// light.add(helper);

let rotationBool=true;
let increment=0.0002

const clock = new THREE.Clock();


const modelContainer = document.getElementById('modelContainer');

// Resize function
function resizeCanvas() {
  const containerWidth = modelContainer.offsetWidth;
  const containerHeight = modelContainer.offsetHeight;
  
  // Adjust the canvas size while maintaining the aspect ratio
  const aspect = containerWidth / containerHeight;
  const canvasWidth = Math.floor(containerHeight * heightRatio * aspect);
  const canvasHeight = Math.floor(containerHeight * heightRatio);

  // Update the canvas dimensions
  canvas.width = canvasWidth;
  canvas.height = canvasHeight;

  // Update the camera aspect ratio
  camera.aspect = aspect;
  camera.updateProjectionMatrix();

  // Update the renderer size
  renderer.setSize(canvasWidth, canvasHeight);
}

// Call the resize function on page load and when the window is resized
window.addEventListener('load', resizeCanvas);
window.addEventListener('resize', resizeCanvas);



function animate() {
    // console.log(camera.position)
  	requestAnimationFrame( animate );

    controls.update();

    console.log(camera.position)
    console.log(obj.position)

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








