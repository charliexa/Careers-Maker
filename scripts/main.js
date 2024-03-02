    // Start header Name Transition
    let home = document.querySelector(".link-1");
    let jobs = document.querySelector(".link-2");
    let contact_us = document.querySelector(".link-3");
    if (home.title == "home") {
        jobs.classList.remove("active")
        contact_us.classList.remove("active")
        home.classList.add("active")
    } else if (home.title == "jobs") {
        home.classList.remove("active")
        contact_us.classList.remove("active")
        jobs.classList.add("active")
    } else if (home.title == "contact-us") {
        jobs.classList.remove("active")
        home.classList.remove("active")
        contact_us.classList.add("active")
    }
    // End header Name Transition
    // Start Like Button
    let btn = document.querySelector(".btnn")
    let icon = document.querySelector(".fa-heart")
    btn.onclick = () => {
        if (btn.classList.contains("pink")) {
            icon.classList.add("fa-regular")
            icon.classList.remove("fa-solid")
            btn.classList.remove("pink")
        } else {
            icon.classList.remove("fa-regular")
            icon.classList.add("fa-solid")
            btn.classList.add("pink")
        }
    }
    // End Like Button
    // Start Edit Menu
    let btn_menu = document.querySelector(".brdr")
    let menu = document.querySelector(".menu")
    let select = document.querySelector(".menu div")
    btn_menu.onclick = () => {
        menu.classList.toggle("d-block");
    }
    document.addEventListener("click", function(e) {
        let menu = document.querySelector(".menu");
        let btn_menu = document.querySelector(".brdr")
        const isClickInsideMenu = menu.contains(e.target);
        const isClickInsideMenuBtn = btn_menu.contains(e.target);
        if (!isClickInsideMenu && !isClickInsideMenuBtn) {
            menu.classList.remove("d-block");
        }
    });
    let del_btn = document.querySelector(".delete");
    del_btn.addEventListener("click", ()=>{
        let sure = document.getElementById("sure");
        sure.style.display = "block"
    })
    let sure = document.getElementById("sure");
    if(sure.style.display === "block"){
        document.addEventListener("click", function(e) {
            const isClickInsideSure = sure.contains(e.target);
            if (!isClickInsideSure) {
                sure.style.display = "none";
            }
        });
    }
    // End Edit Menu
    // Start Pop Up
    let pop_up = document.querySelector(".pop-up")
    let page = document.querySelector(".con")
    let add = document.querySelector(".add-post")
    add.onclick = (e) => {
        pop_up.classList.remove("d-none")
        pop_up.classList.add("d-block")
    }

    // End Pop Up