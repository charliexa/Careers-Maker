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
    let btn = document.querySelectorAll(".btnn")
    btn.forEach(ele => {
        ele.onclick = () => {
            let icon = ele.firstChild;
            if (ele.classList.contains("pink")) {
                icon.classList.add("fa-regular")
                icon.classList.remove("fa-solid")
                ele.classList.remove("pink")
            } else {
                icon.classList.remove("fa-regular")
                icon.classList.add("fa-solid")
                ele.classList.add("pink")
            }
        }
    });
    // End Like Button
    // Start Edit Menu
    document.addEventListener("DOMContentLoaded", function() {
        let btn_menu = document.querySelectorAll(".brdr");
        let overlay = document.querySelector(".overlay");
    
        btn_menu.forEach(ele => {
            ele.onclick = () => {
                let menu = ele.children[1];
                menu.classList.toggle("d-block");
                document.addEventListener("click", function(e) {
                    const isClickInsideMenu = menu.contains(e.target);
                    const isClickInsideMenuBtn = ele.contains(e.target);
                    if (!isClickInsideMenu && !isClickInsideMenuBtn) {
                        menu.classList.remove("d-block");
                    }
                });
            };
        });

        // let del_btn = document.querySelectorAll(".delete");

        // del_btn.forEach(ele => {
        //     ele.addEventListener("click", () => {
        //         let sure = document.getElementById("sure");
        //         sure.style.display = "block";
        //         overlay.classList.add("d-flex");
        //         document.body.classList.add("blur");
        //     });
        // });

        let del_btn = document.querySelectorAll(".delete");

        del_btn.forEach(ele => {
            ele.addEventListener("click", () => {
                let postId = ele.closest('.card').title;
                let sure = document.getElementById(`sure-${postId}`);
                sure.style.display = "block";
                overlay.classList.add("d-flex");
                document.body.classList.add("blur");
            });
        });

        // Start edit-pop-up
        let edit_btn = document.querySelectorAll(".edit");
        edit_btn.forEach(ele => {
            ele.addEventListener("click", ()=>{
                let editId = ele.closest('.card').title;
                let edit_pop_up = document.getElementById(`edit-pop-up-${editId}`);
                edit_pop_up.classList.remove("d-none");
                edit_pop_up.classList.add("d-flex");
                overlay.classList.add("d-flex");
                document.body.classList.add("blur");
            })
        });
        // End edit-pop-up
    });
    // End Edit Menu

    // Start Pop Up
    let overlay = document.querySelector(".overlay");
    let pop_up = document.querySelector(".pop-up")
    let page = document.querySelector(".con")
    let add = document.querySelector(".add-post")
    add.onclick = (e) => {
        pop_up.classList.remove("d-none")
        pop_up.classList.add("d-block")
        overlay.classList.add("d-block");
        document.body.classList.add("blur")
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