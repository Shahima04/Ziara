function toggleSidebar() {
    const sidebar = document.querySelector(".w-64");
    sidebar.classList.toggle("hidden");
}

function setActive(btn, page) {
    document.querySelectorAll(".nav-btn").forEach(b => b.classList.remove("bg-gray-200"));
    btn.classList.add("bg-gray-200");
    document.getElementById("page-title").innerText = btn.innerText;
}
