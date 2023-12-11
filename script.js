function showVarieties() {
    let fishType = document.getElementById("fish-type").value;
    let varietiesDropdown = document.getElementById("varieties-dropdown");

    // Reset the varieties dropdown
    document.getElementById("fish-variety").innerHTML = '';

    if (fishType === "Goldfish") {
        populateDropdown(["Others", "Veiltail", "Shubunkin", "Ryukin", "Lionhead", "Oranda", "Redcap", "Telescope", "Buble Eye", "Crystal Eye", "Tamasaba", "Ranchu", "Comet"]);
    } else if (fishType === "Koi") {
        populateDropdown(["Others", "Aka Matsuba", "Asagi", "Benigoi", "Chagoi", "Ginga", "Goshiki", "Hi Utsuri", "Kikusui", "Kohaku", "Sanke", "Shiro Utsuri", "Showa"]);
    }else if (fishType === "Betta") {
        populateDropdown(["Rare", "Veiltail", "Halfmoon", "Giant Betta", "Delta", "Crowntail", "HMPK", "Marine Betta", "Doubletail Haftmoon", "Doubletail HMPK"]);
    } else if (fishType === "Guppy") {
        populateDropdown(["Red", "Yellow", "Blue"]);
    } else {
        // Hide the varieties dropdown if no fish type is selected
        varietiesDropdown.style.display = "none";
    }
}

function populateDropdown(varieties) {
    var varietiesDropdown = document.getElementById("varieties-dropdown");

    // Populate the varieties dropdown
    var selectVariety = document.getElementById("fish-variety");
    for (var i = 0; i < varieties.length; i++) {
        var option = document.createElement("option");
        option.text = varieties[i];
        selectVariety.add(option);
    }

    // Show the varieties dropdown
    varietiesDropdown.style.display = "block";
}
