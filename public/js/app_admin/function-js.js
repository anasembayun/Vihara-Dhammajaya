// disable sidebar 
function disSidebar(a1, a2, a3, a4, a5, a6, a7, a8, a9) {
    document.getElementById(a1).classList.remove("w3-show")
    document.getElementById(a2).classList.remove("w3-show")
    document.getElementById(a3).classList.remove("w3-show")

    document.getElementById(a4).classList.remove("w3-show")
    document.getElementById(a5).classList.remove("w3-show")
    document.getElementById(a6).classList.remove("w3-show")

    document.getElementById(a7).classList.remove("w3-show")
    document.getElementById(a8).classList.remove("w3-show")
    document.getElementById(a9).classList.remove("w3-show")
}

// to make arrow icon default
function arrowDefault(a, b) {
    let myList = ["arrow-d-01 arrow-n-01", "arrow-d-02 arrow-n-02", "arrow-d-03 arrow-n-03", "arrow-d-04 arrow-n-04", "arrow-d-05 arrow-n-05", "arrow-d-06 arrow-n-06",
        "arrow-d-07 arrow-n-07", "arrow-d-08 arrow-n-08", "arrow-d-09 arrow-n-09", "arrow-d-10 arrow-n-10"]
    for (let i of myList) {
        arg = i.split(" ")
        document.getElementById(arg[1]).classList.add("arrow-miss") // ensure down arrow not pop up
        document.getElementById(arg[0]).classList.remove("arrow-miss") // ensure right arrow still there
    }
    document.getElementById(a).classList.add("arrow-miss") // remove right arrow
    document.getElementById(b).classList.remove("arrow-miss") // add down arrow
}

// to make arrow icon pop-up / not default
function arrowPopUp(a, b) {
    document.getElementById(a).classList.remove("arrow-miss")
    document.getElementById(b).classList.add("arrow-miss")
}

// list all dropshow 
// demoAcc, drop-show-02, drop-show-03, drop-show-04, drop-show-05, drop-show-06, drop-show-07, drop-show-08, drop-show-09

// Accordion dropdown sidebar 01
function myAccFunc() {
    let x = document.getElementById("demoAcc");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        arrowDefault("arrow-d-01", "arrow-n-01");
        x.className += " w3-show"
        disSidebar('drop-show-02', 'drop-show-03', 'drop-show-04', 'drop-show-05', 'drop-show-06', 'drop-show-07', 'drop-show-08', 'drop-show-09', 'drop-show-10')
    } else {
        x.classList.remove("w3-show")
        arrowPopUp("arrow-d-01", "arrow-n-01");
    }
}
// dropdown sidebar 02

function dropShow() {
    // get dropdown 02
    let x = document.getElementById("drop-show-02");
    // check class in dropdown 02
    let result = x.classList.contains("w3-show")

    if (result === false) {
        // enable dropdown 02
        x.className += " w3-show"
        // disable dropdown 01 and others
        disSidebar('drop-show-03', 'drop-show-04', 'drop-show-05', 'drop-show-06', 'drop-show-07', 'drop-show-08', 'drop-show-09', 'drop-show-10', 'demoAcc')
        // customize arrow dirrection 
        arrowDefault("arrow-d-02", "arrow-n-02")
    } else {
        // disable dropdown 02
        x.classList.remove("w3-show")
        // customize arrow direction
        arrowPopUp("arrow-d-02", "arrow-n-02")
    }
}

// dropdown sidebar 03
function dropShow03() {
    // get dropdown 03
    let x = document.getElementById("drop-show-03");
    // check class in dropdown 03
    let result = x.classList.contains("w3-show")

    if (result === false) {
        // enable dropdown 03
        x.className += " w3-show"
        // disable dropdown 01 an others
        disSidebar('drop-show-02', 'drop-show-04', 'drop-show-05', 'drop-show-06', 'drop-show-07', 'drop-show-08', 'drop-show-09', 'drop-show-10', 'demoAcc')
        arrowDefault("arrow-d-03", "arrow-n-03")
    } else {
        // disable dropdown 03
        x.classList.remove("w3-show")
        arrowPopUp("arrow-d-03", "arrow-n-03")
    }
}

// dropdown sidebar 04
function dropShow04() {
    let x = document.getElementById("drop-show-04");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        x.className += " w3-show"
        disSidebar('drop-show-03', 'drop-show-02', 'drop-show-05', 'drop-show-06', 'drop-show-07', 'drop-show-08', 'drop-show-09', 'drop-show-10', 'demoAcc')
        arrowDefault("arrow-d-04", "arrow-n-04")
    } else {
        arrowPopUp("arrow-d-04", "arrow-n-04")
        x.classList.remove("w3-show")
    }
}

// dropdown sidebar 05
function dropShow05() {
    let x = document.getElementById("drop-show-05");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        x.className += " w3-show"
        arrowDefault("arrow-d-05", "arrow-n-05")
        disSidebar('drop-show-03', 'drop-show-04', 'drop-show-02', 'drop-show-06', 'drop-show-07', 'drop-show-08', 'drop-show-09', 'drop-show-10', 'demoAcc')
    } else {
        arrowPopUp("arrow-d-05", "arrow-n-05")
        x.classList.remove("w3-show")
    }
}

// dropdown sidebar 06
function dropShow06() {
    let x = document.getElementById("drop-show-06");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        x.className += " w3-show"
        disSidebar('drop-show-03', 'drop-show-04', 'drop-show-05', 'drop-show-02', 'drop-show-07', 'drop-show-08', 'drop-show-09', 'drop-show-10', 'demoAcc')
        arrowDefault("arrow-d-06", "arrow-n-06")
    } else {
        arrowDefault("arrow-d-06", "arrow-n-06")
        x.classList.remove("w3-show")
    }
}

// dropdown sidebar 07
function dropShow07() {
    let x = document.getElementById("drop-show-07");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        x.className += " w3-show"
        disSidebar('drop-show-03', 'drop-show-04', 'drop-show-05', 'drop-show-06', 'drop-show-02', 'drop-show-08', 'drop-show-09', 'drop-show-10', 'demoAcc')
        arrowDefault("arrow-d-07", "arrow-n-07")
    } else {
        arrowPopUp("arrow-d-07", "arrow-n-07")
        x.classList.remove("w3-show")
    }
}

// dropdown sidebar 08
function dropShow08() {
    let x = document.getElementById("drop-show-08");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        x.className += " w3-show"
        disSidebar('drop-show-03', 'drop-show-04', 'drop-show-05', 'drop-show-06', 'drop-show-07', 'drop-show-02', 'drop-show-09', 'drop-show-10', 'demoAcc')
        arrowDefault("arrow-d-08", "arrow-n-08")
    } else {
        arrowPopUp("arrow-d-08", "arrow-n-08")
        x.classList.remove("w3-show")
    }
}

// dropdown sidebar 09
function dropShow09() {
    let x = document.getElementById("drop-show-09");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        x.className += " w3-show"
        disSidebar('drop-show-03', 'drop-show-04', 'drop-show-05', 'drop-show-06', 'drop-show-07', 'drop-show-08', 'drop-show-02', 'drop-show-10', 'demoAcc')
        arrowDefault("arrow-d-09", "arrow-n-09")
    } else {
        x.classList.remove("w3-show")
        arrowPopUp("arrow-d-09", "arrow-n-09")
    }
}

// dropdown sidebar 10
function dropShow10() {
    let x = document.getElementById("drop-show-10");
    let result = x.classList.contains("w3-show")

    if (result === false) {
        x.className += " w3-show"
        disSidebar('drop-show-03', 'drop-show-04', 'drop-show-05', 'drop-show-06', 'drop-show-07', 'drop-show-08', 'drop-show-09', 'drop-show-02', 'demoAcc')
        arrowDefault("arrow-d-10", "arrow-n-10")
    } else {
        x.classList.remove("w3-show")
        arrowPopUp("arrow-d-10", "arrow-n-10")
    }
}
