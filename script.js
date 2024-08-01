var i = 0; // Start index
var images = []; // Array to store image paths
var time = 3000; // Time interval (3000 milliseconds = 3 seconds)

// List of image paths
images[0] = 'ramreplacement.jpg';
images[1] = 'servicenow.jpg';
images[2] = 'mars.jpg';
images[3] = 'hardware.jpg';
images[4] = 'Linux.jpg';
// Function to change the image
function changeImg() {
    var mainImg = document.getElementById('mainImg');
    if (!mainImg) {
        console.error('Image element with id "mainImg" not found.');
        return;
    }
    mainImg.src = images[i]; // Set image source

    // Increment index or reset to 0 if at the end of the array
    i = (i + 1) % images.length;

    // Call changeImg again after the specified time
    setTimeout(changeImg, time);
}

// Start image change when the page loads
window.onload = changeImg;
