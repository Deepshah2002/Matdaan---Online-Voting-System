function changeText() {

    //Assign drop down and radio button values to variables based on their ids
    var stateDropdown = document.getElementById("statedropdown");
    var districtDropdown = document.getElementById("districtdropdown");
    var bjpSpan = document.getElementById("BJP");
    var congressSpan = document.getElementById("Congress");
    var aapSpan = document.getElementById("AAP");
    var notaSpan = document.getElementById("NOTA");
    var vdot = document.querySelectorAll(".vdot");

    // Set the span textContent to a value based on the value selected in statedropdown and districtdropdown
    if (stateDropdown.value == "Maharashtra" && districtDropdown.value == "Thane") {
        bjpSpan.textContent = "Kelkar Sanjay Mukund (BJP)";
        congressSpan.textContent = "Kanti Koli (INC)";
        aapSpan.textContent = "Preeti Sharma Menon (AAP)";
        notaSpan.textContent = "NOTA";

        // Display the radio button text if selection has been made
        bjpSpan.style.display = "block";
        congressSpan.style.display = "block";
        aapSpan.style.display = "block";
        notaSpan.style.display = "block";

        //Display all the corresponding radio buttons if selection has been made
        for (var i = 0; i < vdot.length; i++) {
            vdot[i].style.display = "block";
          }
    } else if (stateDropdown.value == "Maharashtra" && districtDropdown.value == "Kurla") {
        bjpSpan.textContent = "Manoj Kotak (BJP)";
        congressSpan.textContent = "Govind Singh (INC)";
        aapSpan.textContent = "Raghav Chaddha (AAP)";
        notaSpan.textContent = "NOTA";

        // Display the radio button text if selection has been made
        bjpSpan.style.display = "block";
        congressSpan.style.display = "block";
        aapSpan.style.display = "block";
        notaSpan.style.display = "block";

        //Display all the corresponding radio buttons if selection has been made
        for (var i = 0; i < vdot.length; i++) {
            vdot[i].style.display = "block";
          }
    } else if (stateDropdown.value == "Delhi" && districtDropdown.value == "New Delhi") {
        bjpSpan.textContent = "Mohan Singh Bisht (BJP)";
        congressSpan.textContent = "Neetu Verma Soin (INC)";
        aapSpan.textContent = "Dilip Pandey (AAP)";
        notaSpan.textContent = "NOTA";

        // Display the radio button text if selection has been made
        bjpSpan.style.display = "block";
        congressSpan.style.display = "block";
        aapSpan.style.display = "block";
        notaSpan.style.display = "block";

        //Display all the corresponding radio buttons if selection has been made
        for (var i = 0; i < vdot.length; i++) {
            vdot[i].style.display = "block";
          }
    } else if (stateDropdown.value == "Delhi" && districtDropdown.value == "South Delhi") {
        bjpSpan.textContent = "Sahi Ram (BJP)";
        congressSpan.textContent = "Dr. Yoganand Shashtri (INC)";
        aapSpan.textContent = "Somnath Bharti (AAP)";
        notaSpan.textContent = "NOTA";

        // Display the radio button text if selection has been made
        bjpSpan.style.display = "block";
        congressSpan.style.display = "block";
        aapSpan.style.display = "block";
        notaSpan.style.display = "block";

        //Display all the corresponding radio buttons if selection has been made
        for (var i = 0; i < vdot.length; i++) {
            vdot[i].style.display = "block";
          }
    } else if (stateDropdown.value == "Kolkata" && districtDropdown.value == "Bhabanipur") {
        bjpSpan.textContent = "Priyanka Tibrewal (BJP)";
        congressSpan.textContent = "Md. Shadab Khan (INC)";
        aapSpan.textContent = "Sanjay Basu (AAP)";
        notaSpan.textContent = "NOTA";

        // Display the radio button text if selection has been made
        bjpSpan.style.display = "block";
        congressSpan.style.display = "block";
        aapSpan.style.display = "block";
        notaSpan.style.display = "block";

        //Display all the corresponding radio buttons if selection has been made
        for (var i = 0; i < vdot.length; i++) {
            vdot[i].style.display = "block";
          }
    } else if (stateDropdown.value == "Kolkata" && districtDropdown.value == "Rashbehari") {
        bjpSpan.textContent = "Samir Banerjee (BJP)";
        congressSpan.textContent = "Ashutosh Chatterjee (INC)";
        aapSpan.textContent = "Bizman Mohd Quadir (AAP)"
        notaSpan.textContent = "NOTA";

        // Display the radio button text if selection has been made
        bjpSpan.style.display = "block";
        congressSpan.style.display = "block";
        aapSpan.style.display = "block";
        notaSpan.style.display = "block";

        //Display all the corresponding radio buttons if selection has been made
        for (var i = 0; i < vdot.length; i++) {
            vdot[i].style.display = "block";
          }
    }else if (stateDropdown.value == "Select a State" || districtDropdown.value == "Select a District") {
        bjpSpan.textContent = "";
        congressSpan.textContent = "";
        aapSpan.textContent = "";
        notaSpan.textContent = "";
        
        //Display all the corresponding radio buttons if selection has been made
        for (var i = 0; i < vdot.length; i++) {
            vdot[i].style.display = "none";
          }
    }
}

function updateDistrictDropdown() {

    //Assign drop downs to variables based on their ids
    var statedropdown = document.getElementById("statedropdown");
    var districtdropdown = document.getElementById("districtdropdown");

    //Provide a set of correct district values for each state
    var maharashtraDistricts = ["Select a District", "Kurla", "Thane"];
    var delhiDistricts = ["Select a District", "New Delhi", "South Delhi"];
    var kolkataDistricts = ["Select a District", "Bhabanipur", "Rashbehari"];
    var selectaState = ["Select a State first"];

    //Fetch the selected state
    var selectedState = statedropdown.options[statedropdown.selectedIndex].value;

    // Clear previous options
    districtdropdown.innerHTML = "";

    //Add the correct district values to the district drop down depending on the value selected in the state drop down
    if (selectedState === "Maharashtra") {
        for (var i = 0; i < maharashtraDistricts.length; i++) {

            //Create instance of "option tag"
            var option = document.createElement("option");

            //Fetch the ith element of the maharastraDistrict tuple
            option.text = maharashtraDistricts[i];

            //Add the options to the district drop down one by one
            districtdropdown.add(option);
        }
    } else if (selectedState === "Delhi") {
        for (var i = 0; i < delhiDistricts.length; i++) {
            var option = document.createElement("option");
            option.text = delhiDistricts[i];
            districtdropdown.add(option);
        }
    } else if (selectedState === "Kolkata") {
        for (var i = 0; i < kolkataDistricts.length; i++) {
            var option = document.createElement("option");
            option.text = kolkataDistricts[i];
            districtdropdown.add(option);
        }
    } else if (selectedState === "Select a State") {
        for (var i = 0; i < selectaState.length; i++) {
            var option = document.createElement("option");
            option.text = selectaState[i];
            districtdropdown.add(option);
        }
    }

    changeText();
}