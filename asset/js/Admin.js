// //My code to hide or show elements of my dashboard on click
function hideElements(elements) {
      elements.forEach(selector => {
        const element = document.querySelector(selector);
        if (element) {
          element.style.display = 'none';
        }
      });
    }

    function showElements(elements) {
      elements.forEach(selector => {
        const element = document.querySelector(selector);
        if (element) {
          element.style.display = '';
        }
      });
    }

    function handleNavigationClick(clickedId) {
      let elementsToHide = [];

      switch (clickedId) {
        case 'dashboard':
          elementsToHide = ['.tabular-wrapper2', '.tabular-wrapper3', '.tabular-wrapper4', '.tabular-wrapper5', '.tabular-wrapper6'];
          break;
        case 'profile':
          elementsToHide = ['.tabular-wrapper1', '.tabular-wrapper3', '.tabular-wrapper4', '.tabular-wrapper5', '.tabular-wrapper6'];
          break;
        case 'graduate':
          elementsToHide = ['.tabular-wrapper1', '.tabular-wrapper2', '.tabular-wrapper4', '.tabular-wrapper5', '.tabular-wrapper6'];
          break;
        case 'undergraduate':
          elementsToHide = ['.tabular-wrapper1', '.tabular-wrapper2', '.tabular-wrapper3', '.tabular-wrapper5', '.tabular-wrapper6'];
          break;
        case 'statistics':
          elementsToHide = ['.tabular-wrapper1', '.tabular-wrapper2', '.tabular-wrapper3', '.tabular-wrapper4', '.tabular-wrapper6'];
          break;
        case 'settings':
          elementsToHide = ['.tabular-wrapper1', '.tabular-wrapper2', '.tabular-wrapper3', '.tabular-wrapper4', '.tabular-wrapper5'];
          break;
      }

      // Show all elements before hiding the selected ones
      showElements(['.tabular-wrapper1', '.tabular-wrapper2', '.tabular-wrapper3', '.tabular-wrapper4', '.tabular-wrapper5', '.tabular-wrapper6']);
      hideElements(elementsToHide);

      // Store the current state in localStorage
      localStorage.setItem('hiddenElements', JSON.stringify(elementsToHide));
      localStorage.setItem('lastClicked', clickedId);
    }

    // Add event listeners to navigation items after the DOM is ready
    document.addEventListener('DOMContentLoaded', () => {
      const dashboard = document.getElementById('dashboard');
      const profile = document.getElementById('profile');
      const graduate = document.getElementById('graduate');
      const undergraduate = document.getElementById('undergraduate');
      const statistics = document.getElementById('statistics');
      const settings = document.getElementById('settings');

      if (dashboard) dashboard.addEventListener('click', () => handleNavigationClick('dashboard'));
      if (profile) profile.addEventListener('click', () => handleNavigationClick('profile'));
      if (graduate) graduate.addEventListener('click', () => handleNavigationClick('graduate'));
      if (undergraduate) undergraduate.addEventListener('click', () => handleNavigationClick('undergraduate'));
      if (statistics) statistics.addEventListener('click', () => handleNavigationClick('statistics'));
      if (settings) settings.addEventListener('click', () => handleNavigationClick('settings'));

      // On page load, check if there's a stored state
      const hiddenElements = JSON.parse(localStorage.getItem('hiddenElements'));
      const lastClicked = localStorage.getItem('lastClicked');
      if (hiddenElements) {
        hideElements(hiddenElements);
      }
    });
    
    // Add event listeners directly
    const dashboard = document.getElementById('dashboard');
    const profile = document.getElementById('profile');
    const graduate = document.getElementById('graduate');
    const undergraduate = document.getElementById('undergraduate');
    const statistics = document.getElementById('statistics');
    const settings = document.getElementById('settings');

    if (dashboard) dashboard.addEventListener('click', () => handleNavigationClick('dashboard'));
    if (profile) profile.addEventListener('click', () => handleNavigationClick('profile'));
    if (graduate) graduate.addEventListener('click', () => handleNavigationClick('graduate'));
    if (undergraduate) undergraduate.addEventListener('click', () => handleNavigationClick('undergraduate'));
    if (statistics) statistics.addEventListener('click', () => handleNavigationClick('statistics'));
    if (settings) settings.addEventListener('click', () => handleNavigationClick('settings'));

    


// Code for btn-profile (profile-div-img)
const button = document.getElementById('btn-profile');
const targetDiv = document.querySelector('.profile-div-img');
const fileInput = document.createElement('input');
fileInput.type = 'file';
fileInput.accept = 'image/*';
fileInput.style.display = 'none';
document.body.appendChild(fileInput);

button.addEventListener('click', () => {
  fileInput.click();
});

fileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      const dataURL = e.target.result;
      localStorage.setItem('profileDivImgBackgroundImage', dataURL); // Changed key here
      targetDiv.style.backgroundImage = `url(${dataURL})`;
    };
    reader.readAsDataURL(file);
  }
});

const storedBackgroundImage = localStorage.getItem('profileDivImgBackgroundImage'); // Changed key here
if (storedBackgroundImage) {
  targetDiv.style.backgroundImage = `url(${storedBackgroundImage})`;
}



// Code for btn-change (profile-div)
const btnChange = document.querySelector('.btn-change');
const profileDiv = document.querySelector('.profile-div');

if (!btnChange || !profileDiv) {
  console.error('Could not find .btn-change or .profile-div');
} else {
  btnChange.addEventListener('click', () => {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.onchange = (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          const dataURL = e.target.result;
          localStorage.setItem('profileDivBackgroundImage', dataURL); // Changed key here
          profileDiv.style.backgroundImage = `url(${dataURL})`;
        };
        reader.readAsDataURL(file);
      }
    };
    input.click();
  });

  const storedImage = localStorage.getItem('profileDivBackgroundImage'); // Changed key here
  if (storedImage) {
    profileDiv.style.backgroundImage = `url(${storedImage})`;
  }
}




// This code adds a hover effect to the .sidebar element, which in turn affects the .my-logo element.
// When the mouse hovers over .sidebar, .my-logo will scale up, move, and transition smoothly.
// When the mouse leaves .sidebar, .my-logo will return to its original position and size.
const sidebar = document.querySelector('.sidebar');
const myLogo = document.querySelector('.my-logo');

if (sidebar && myLogo) {
    const originalStyles = {
    transform: window.getComputedStyle(myLogo)['transform'],
    transition: window.getComputedStyle(myLogo)['transition']
    };

    sidebar.addEventListener('mouseover', () => {
    myLogo.style.transform = 'scale(1.5) translateX(60%) translateY(10%)';
    myLogo.style.transition = 'all 0.4s ease-out';
    });

    sidebar.addEventListener('mouseout', () => {
    myLogo.style.transform = originalStyles.transform;
    myLogo.style.transition = originalStyles.transition;
    });
} else {
    console.error("Could not find .sidebar or .my-logo element");
}




// The function to upload my profle image to the server
const express = require('express');
const mysql = require('mysql'); // Or your preferred database library
const cors = require('cors');
const app = express();
const port = 3000;

app.use(cors());
app.use(express.json({ limit: '50mb' })); // Enable JSON body parsing with a limit for large images

// Database connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'internship',
});

db.connect((err) => {
  if (err) {
    console.error('Database connection failed:', err);
    return;
  }
  console.log('Connected to the database');
});

// API endpoint to handle image uploads
app.post('/api/upload-image', (req, res) => {
  const { image } = req.body; // Assuming the image is sent as a base64 string

  if (!image) {
    return res.status(400).json({ error: 'No image provided' });
  }

  // You might want to decode the base64 image and save it as a file
  // Or store the base64 string directly in the database (less efficient)

  // Example: Storing the base64 string in the database
  const sql = 'INSERT INTO graduates (image) VALUES (?)';
  db.query(sql, [image], (err, result) => {
    if (err) {
      console.error('Database error:', err);
      return res.status(500).json({ error: 'Database error' });
    }
    console.log('Image saved to database');
    res.json({ message: 'Image uploaded successfully', id: result.insertId });
  });
});

app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
});