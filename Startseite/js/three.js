const THREE = require('../../node_modules/three/build/three.module.js')
const GLTFLoader = require('../../node_modules/three/examples/jsm/loaders/GLTFLoader.js')

// Initialize ThreeJS
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ canvas: document.getElementById("model1"), alpha: true });

// Create a new GLTF loader
const loader = new GLTFLoader();

// Load the GLTF file
loader.load(
  // URL of the GLTF file
  'models/scene.gltf',

  // Called when the loading is complete
  function ( gltf ) {
    // Add the loaded object to the scene
    scene.add( gltf.scene );
  },

  // Called while loading is progressing
  function ( xhr ) {
    console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );
  },

  // Called when loading has errors
  function ( error ) {
    console.log( 'An error happened', error );
  }
);

// Set up the renderer
renderer.setClearColor(0x00000000, 0);

// Render the scene
function render() {
  requestAnimationFrame(render);
  renderer.render(scene, camera);
}
render();
