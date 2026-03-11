document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded!"); // Debugging

    let sidebar = document.getElementById("sidebar");
    let content = document.getElementById("content");
    let header = document.querySelector(".app-header");
    let sidebarToggle = document.getElementById("sidebarCollapse");

    if (!sidebar || !content || !header || !sidebarToggle) {
        console.error("Error: Sidebar, header, atau tombol tidak ditemukan!");
        return;
    }

    // Sidebar Toggle
    sidebarToggle.addEventListener("click", function () {
        console.log("Sidebar Toggle Clicked!"); // Debugging
        
        sidebar.classList.toggle("collapsed");
        content.classList.toggle("full-width");
        header.classList.toggle("full-width");

        if (sidebar.classList.contains("collapsed")) {
            content.style.marginLeft = "0";
            content.style.width = "100%";
            header.style.marginLeft = "0";
            header.style.width = "100%";
        } else {
            content.style.marginLeft = "250px";
            content.style.width = "calc(100% - 250px)";
            header.style.marginLeft = "20px";
            header.style.width = "calc(100% - 250px)";
        }
    });

    // Responsiveness
    window.addEventListener("resize", function () {
        if (window.innerWidth > 768 && sidebar.classList.contains("collapsed")) {
            sidebar.classList.remove("collapsed");
            content.style.marginLeft = "250px";
            content.style.width = "calc(100% - 250px)";
            header.style.marginLeft = "250px";
            header.style.width = "calc(100% - 250px)";
        }
    });

    // Highlight Active Sidebar Link dan Perbaikan Background Aktif
    let currentPath = window.location.pathname;
    let foundActive = false;

    document.querySelectorAll(".sidebar-link").forEach(link => {
        let linkPath = new URL(link.href, window.location.origin).pathname;  

        if (currentPath === linkPath) {
            link.classList.add("active");
            foundActive = true;

            // Jika submenu aktif, buka parent dropdown
            let parentCollapse = link.closest(".collapse");
            if (parentCollapse) {
                parentCollapse.classList.add("show"); 
                let parentMenu = parentCollapse.previousElementSibling;
                if (parentMenu) {
                    parentMenu.classList.add("active");
                }
            }
        }
    });

    // Perbaikan jika tidak ada submenu aktif, hilangkan background di parent menu
    let petaniMenu = document.getElementById("petaniMenu");
    if (petaniMenu) {
        let parentMenu = petaniMenu.previousElementSibling; // Link utama Petani
        let activeSubmenu = petaniMenu.querySelector(".sidebar-link.active");

        if (!activeSubmenu) {
            petaniMenu.classList.remove("show"); // Pastikan tidak terbuka
            if (parentMenu) {
                parentMenu.classList.remove("active"); // Hilangkan background biru
            }
        }
    }

    console.log("Sidebar script loaded!"); 
});
