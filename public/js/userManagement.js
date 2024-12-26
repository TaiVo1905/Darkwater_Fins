const iconSettings = $$('.icon-setting');
const iconDeletes = $$('.icon-delete');
const roleSelects = $$('.role-select');

iconSettings.forEach((iconSetting, index) => {
    const iconDelete = iconDeletes[index];
    const roleSelect = roleSelects[index];
    
    iconSetting.addEventListener('click', (event) => {
        roleSelect.style.display = 'block';
        iconDelete.style.display = "none";
        iconSetting.style.display = "none";
        event.stopPropagation();
    });

    roleSelect.addEventListener('change', (event) => {
        const newRole = event.target.value;
        const userId = parseInt(event.target.closest('tr').dataset.userid);
        updateUserRole(userId, newRole);
        if (newRole === "User") {
            iconSetting.classList.remove("active");
        } else if (newRole === "Admin") {
            iconSetting.classList.add("active");
        }

        roleSelect.style.display = "none";
        iconSetting.style.display = "inline-block";
        iconDelete.style.display = "inline-block";
    });
});

function updateUserRole(userId, newRole) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", `./admin/updateUserRole/`, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("Role updated", xhr.responseText);
        } else {
            console.error("Error updating role");
        }
    };
    xhr.send("userId=" + userId + "&role=" + newRole);
}

document.addEventListener('click', (event) => {
    const isClickInside = event.target.closest('.role-select') || event.target.closest('.icon-setting');
    
    if (!isClickInside) {
        roleSelects.forEach((roleSelect, index) => {
            roleSelect.style.display = "none";
            iconSettings[index].style.display = "inline-block";
            iconDeletes[index].style.display = "inline-block";
        });
    }
});
