/* The line `document.addEventListener('DOMContentLoaded', () => {` is adding an event listener to the
`DOMContentLoaded` event of the `document` object. This event is fired when the initial HTML
document has been completely loaded and parsed, without waiting for stylesheets, images, and
subframes to finish loading. */
document.addEventListener('DOMContentLoaded', () => {

    const body = document.body;
    const handle = document.getElementById("handle");
    const rotator = document.getElementById("rotator");
    const angleDisplay = document.getElementById("angleDisplay");
    
    const currentBaseDisplay = document.getElementById("currentBase");
    const currentGradientDisplay = document.getElementById("currentGradient");
    const currentAngleDisplay = document.getElementById("currentAngle");
    const applyBtn = document.getElementById("applyBtn");

    let confirmedSettings = {
        angle: 0,
        base: getSelectedColor('baseInput'),
        gradient: getSelectedColor('gradientInput')
    };

/* The line `let previewSettings = { ...confirmedSettings };` is creating a new object named
`previewSettings` that is a shallow copy of the `confirmedSettings` object. This means that
`previewSettings` will initially have the same properties and values as `confirmedSettings`. */
    let previewSettings = { ...confirmedSettings };

    let dragging = false;

/**
 * The function `getSelectedColor` returns the value of the selected radio button with the specified
 * class name, or 'white' if no radio button is selected.
 * @param className - The `className` parameter is a string that represents the class name of the
 * elements you want to select. In this function, it is used to find the selected element with the
 * specified class name and retrieve its value.
 * @returns The function `getSelectedColor` returns the value of the selected radio button with the
 * specified class name (`className`). If no radio button is selected, it returns the string 'white'.
 */
    function getSelectedColor(className) {
        const selected = document.querySelector(`.${className}:checked`);
        return selected ? selected.value : 'white';
    }

/**
 * The function `updatePreview` sets the background of an element to a linear gradient based on the
 * provided settings.
 * @param settings - The `settings` parameter is an object that contains the following properties:
 */
    function updatePreview(settings) {
        body.style.background = `linear-gradient(${settings.angle}deg, ${settings.base}, ${settings.gradient})`;
        if (angleDisplay) {
            angleDisplay.textContent = Math.round(settings.angle) + "°";
        }

    }

/**
 * The function `updateConfirmedDisplay` updates the display with confirmed settings for base color,
 * gradient color, and angle.
 */
    function updateConfirmedDisplay() {
        currentBaseDisplay.textContent = confirmedSettings.base;
        currentGradientDisplay.textContent = confirmedSettings.gradient;
        currentAngleDisplay.textContent = Math.round(confirmedSettings.angle) + "°";
    }
    
/**
 * The function `updateControls` updates the rotation angle and selected radio buttons based on the
 * provided settings.
 * @param settings - The `settings` parameter is an object that contains the following properties:
 */
    function updateControls(settings) {
        rotator.style.transform = `rotate(${settings.angle}deg)`;
        
        document.querySelector(`.baseInput[value="${settings.base}"]`).checked = true;
        document.querySelector(`.gradientInput[value="${settings.gradient}"]`).checked = true;
    }

/**
 * The function `getAngle` calculates the angle between the center of a rectangle and the mouse cursor
 * position.
 * @param e - The parameter `e` typically represents the event object in JavaScript, which contains
 * information about the event that occurred, such as a mouse click or touch event.
 * @param rect - The `rect` parameter in the `getAngle` function represents a rectangle object with
 * properties `left`, `top`, `width`, and `height`. These properties define the position and dimensions
 * of the rectangle on the screen. The `left` and `top` properties specify the coordinates of the top
 * @returns The function `getAngle` calculates the angle in degrees between the center of a rectangle
 * (`rect`) and the mouse pointer position (`e`) on the screen. The function returns the calculated
 * angle in degrees.
 */
    function getAngle(e, rect) {
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        const x = e.clientX - centerX;
        const y = e.clientY - centerY;
        let angle = Math.atan2(x, -y) * (180 / Math.PI);
        if (angle < 0) angle += 360;
        return angle;
    }

    handle.addEventListener("mousedown", (e) => {
        e.preventDefault();
        dragging = true;
        handle.style.cursor = "grabbing";
    });

    document.addEventListener("mouseup", () => {
        dragging = false;
        handle.style.cursor = "grab";
    });

/* The `document.addEventListener("mousemove", (e) => { ... })` code snippet is adding an event
listener to the `document` object for the `mousemove` event. This event listener function is
triggered whenever the mouse cursor moves on the document. */
    document.addEventListener("mousemove", (e) => {
        if (!dragging) return;
        const rect = rotator.getBoundingClientRect();
        const angle = getAngle(e, rect);
        
  
        previewSettings.angle = angle;
        rotator.style.transform = `rotate(${angle}deg)`;
        angleDisplay.style.transform = `translate(-50%, -50%) rotate(${-angle}deg)`;
        updatePreview(previewSettings);
    });

/* The code snippet `document.querySelectorAll('.baseInput, .gradientInput').forEach(input => { ... })`
is selecting all elements with the class name 'baseInput' and 'gradientInput', and then adding an
event listener to each of these elements. */
    document.querySelectorAll('.baseInput, .gradientInput').forEach(input => {
        input.addEventListener('change', () => {
            previewSettings.base = getSelectedColor('baseInput');
            previewSettings.gradient = getSelectedColor('gradientInput');
            updatePreview(previewSettings);
        });
    });


/* The `applyBtn.addEventListener('click', () => { ... })` code snippet is adding a click event
listener to the `applyBtn` element. When the button is clicked, it triggers a confirmation dialog
asking the user if they want to apply the changes. */
    applyBtn.addEventListener('click', () => {
        if (confirm('Do you want to apply these changes ?')) {
            confirmedSettings = { ...previewSettings }; 
            updateConfirmedDisplay();
        } else {
            alert("Changes cancelled. Settings were not applied");
        }
    });


/* The code snippet `updateControls(confirmedSettings);`, `updatePreview(confirmedSettings);`, and
`updateConfirmedDisplay();` is performing the following actions: */
    updateControls(confirmedSettings);
    updatePreview(confirmedSettings);
    updateConfirmedDisplay();
});