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
    document.addEventListener("DOMContentLoaded", function() {
        let btn_menu = document.querySelector(".brdr");
        let menu = document.querySelector(".menu");
        let overlay = document.querySelector(".overlay");
        let del_btn = document.querySelector(".delete");
        let edit = document.querySelector(".edit")

        btn_menu.onclick = () => {
            menu.classList.toggle("d-block");
        };

        document.addEventListener("click", function(e) {
            const isClickInsideMenu = menu.contains(e.target);
            const isClickInsideMenuBtn = btn_menu.contains(e.target);
            if (!isClickInsideMenu && !isClickInsideMenuBtn) {
                menu.classList.remove("d-block");
            }
        });
        del_btn.addEventListener("click", () => {
            let sure = document.getElementById("sure");
            sure.style.display = "block";
            overlay.classList.add("d-flex");
            document.body.classList.add("blur");
        });
        edit.addEventListener("click", () => {
            let edit_pop_up = document.querySelector(".edit-pop-up")
            edit_pop_up.classList.remove("d-none");
            edit_pop_up.classList.add("d-block");
            overlay.style.display = "block";
            document.body.classList.add("blur");
        });
    });

    // End Edit Menu
    // Start Pop Up
    let overlay = document.querySelector(".overlay");
    let pop_up = document.querySelector(".pop-up")
    let page = document.querySelector(".con")
    let add = document.querySelector(".add-post")
    add.onclick = (e) => {
        pop_up.classList.remove("d-none");
        pop_up.classList.add("d-block");
        overlay.classList.add("d-block");
        document.body.classList.add("blur");
    }
    document.addEventListener("click", function(e) {
        const isClickInsidePopUp = pop_up.contains(e.target);
        const isClickInsideAdd = add.contains(e.target);
        if (!isClickInsidePopUp && !isClickInsideAdd) {
            pop_up.classList.remove("d-block");
            pop_up.classList.add("d-none");
            overlay.classList.remove("d-block");
        }
    });
    // End Pop Up