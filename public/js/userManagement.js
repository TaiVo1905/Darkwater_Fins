function toggleRoleSelect(icon) {
    const select = icon.nextElementSibling; // Tìm ô select cạnh icon
    select.style.display = select.style.display === "none" ? "block" : "none";
}

function updateRole(select) {
    const row = select.closest("tr");

    const icon = row.querySelector(".icon-setting");
    const newRole = select.value;

    if (newRole === "User") {
        icon.classList.remove("admin");
        icon.classList.add("user");
        icon.style.color = "blue";
    } else if (newRole === "Admin") {
        icon.classList.remove("user");
        icon.classList.add("admin");
        icon.style.color = "green";
    }

    select.style.display = "none";
}