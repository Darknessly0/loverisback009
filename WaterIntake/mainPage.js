var menuHolder = document.getElementById('menuHolder')
var siteBrand = document.getElementById('siteBrand')
function menuToggle(){
    if(menuHolder.className === "drawMenu") menuHolder.className = ""
    else menuHolder.className = "drawMenu"
}
if(window.innerWidth < 426) siteBrand.innerHTML = "MAS"
window.onresize = function(){
    if(window.innerWidth < 420) siteBrand.innerHTML = "MAS"
    else siteBrand.innerHTML = "MY AWESOME WEBSITE"
}


function calculateWaterIntake() {
    // Get user input
    const weightInput = document.getElementById("weight");
    const unit = document.getElementById("unit").value;
    const activityLevel = document.getElementById("activity-level").value;

    // Validate the weight input
    const weight = parseFloat(weightInput.value);

    if (isNaN(weight)) {
        document.getElementById("result-paragraph").textContent = "Please enter a valid weight.";
        return;
    }

    // Define water intake constants based on activity level
    const activityLevels = {
        "sedentary": 0.5,
        "lightly-active": 0.6,
        "moderately-active": 0.7,
        "very-active": 0.8,
        "super-active": 0.9
    };

    // Calculate water intake based on the selected unit
    let waterIntake;

    if (unit === "kg") {
        // Calculate for Kg unit
        waterIntake = weight * activityLevels[activityLevel];
    } else {
        // Calculate for Lb unit
        waterIntake = (weight * activityLevels[activityLevel] / 2.20462);
    }

    // Display the result in a separate paragraph
    const unitLabel = unit === "kg" ? "Kg" : "Lb";
    document.getElementById("result-paragraph").textContent = `Your recommended daily water intake is: ${waterIntake.toFixed(2)} ounces (${unitLabel})`;
}

// Add onchange event listeners to trigger calculation when inputs change
document.getElementById("weight").onchange = calculateWaterIntake;
document.getElementById("unit").onchange = calculateWaterIntake;
document.getElementById("activity-level").onchange = calculateWaterIntake;

// Initial calculation when the page loads
calculateWaterIntake();




