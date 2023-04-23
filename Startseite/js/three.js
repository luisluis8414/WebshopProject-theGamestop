import * as THREE from 'three'
import {GLTFLoader} from 'three/addons/loaders/GLTFLoader.js'

const scene = new THREE.Scene();
const canvas = document.getElementById('model1');

const camera= new THREE.PerspectiveCamera(
  75,
  window.innerWidth/window.innerHeight,
  0.01,
  1000
);

camera.position.set(1, 0 , 3);

const renderer= new THREE.WebGLRenderer({
  canvas: canvas
});

renderer.setSize(window.innerWidth/2, window.innerHeight/2);


const loader= new GLTFLoader();


let obj;
loader.load('models/plane2/scene.gltf', function(gltf){
  obj=gltf.scene;
  scene.add(gltf.scene);
});

scene.background=new THREE.Color(0xffffff);

const light = new THREE.AmbientLight( 0x404040, 3 ); // soft white light
scene.add( light );



function animate() {
  	requestAnimationFrame( animate );
    obj.rotation.y+=0.01
  	renderer.render( scene, camera );
  }

  animate()
// const canvas=document.getElementById('model1');
// const sizes={
//   width: canvas.width,
//   height: canvas.height
// }
// const renderer = new THREE.WebGLRenderer({
//   canvas: canvas
// });

// const camera = new THREE.PerspectiveCamera( 75, sizes.width / sizes.height, 0.1, 1000 );
// camera.position.set(0,1,2);
// scene.add(camera)
// // camera.position.z = 5;


// const loader = new GLTFLoader();

// loader.load( '../models/scene.gltf', function ( gltf ) {

// 	scene.add( gltf.scene );

// }, undefined, function ( error ) {

// 	console.error( error );

// } );

// const light = new THREE.AmbientLight( 0x404040 ); // soft white light
// scene.add( light );

// function animate() {
// 	requestAnimationFrame( animate );
// 	renderer.render( scene, camera );
// }
// animate();


// const scene = new THREE.Scene();
// const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
// const renderer = new THREE.WebGLRenderer();
// const canvas=document.getElementById('model1');

// renderer.setSize( window.innerWidth/2, window.innerHeight/2 );
// document.body.appendChild( renderer.domElement );

// const geometry = new THREE.BoxGeometry( 1, 1, 1 );
// const material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
// const cube = new THREE.Mesh( geometry, material );
// scene.add( cube );

// camera.position.z = 5;

// function animate() {
// 	requestAnimationFrame( animate );
//   cube.rotation.x += 0.01;
//   cube.rotation.y += 0.01;
// 	renderer.render( scene, camera );
// }
// animate();


















// // Initialize ThreeJS
// const scene = new THREE.Scene();
// const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
// const renderer = new THREE.WebGLRenderer({ canvas: document.getElementById("model1"), alpha: true });

// // Create a new GLTF loader
// const loader = new GLTFLoader();

// // Load the GLTF file
// loader.load(
//   // URL of the GLTF file
//   'models/scene.gltf',

//   // Called when the loading is complete
//   function ( gltf ) {
//     // Add the loaded object to the scene
//     scene.add( gltf.scene );
//   },

//   // Called while loading is progressing
//   function ( xhr ) {
//     console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );
//   },

//   // Called when loading has errors
//   function ( error ) {
//     console.log( 'An error happened', error );
//   }
// );
// // Create an instance of AmbientLight
// const light = new THREE.AmbientLight(0xffffff, 1);

// // Add the light to the scene
// scene.add(light);

// // Set up the renderer
// renderer.setClearColor(0xffffff, 1);

// // Render the scene
// function render() {
//   requestAnimationFrame(render);
//   renderer.render(scene, camera);
// }
// render();
