const iconSettings = $$('.icon-setting');
const iconBans = $$('.icon-ban');
const roleSelects = $$('.role-select');

iconSettings.forEach((iconSetting, index) => {
    const iconBan = iconBans[index];
    const roleSelect = roleSelects[index];
    
    iconSetting.addEventListener('click', (event) => {
        roleSelect.style.display = 'block';
        iconBan.style.display = "none";
        iconSetting.style.display = "none";
        event.stopPropagation();
    });

    roleSelect.addEventListener('change', (event) => {
        const newRole = event.target.value;
        const userId = parseInt(event.target.closest('tr').dataset.userid);
        console.log($$(".icon-setting.active").length);
        if (($$(".icon-setting.active").length) <= 1 && newRole == "User") {
            showToast("There must be at least 1 administrator!");
        } else {
            updateUserRole(userId, newRole);
            if (newRole === "User") {
                iconSetting.classList.remove("active");
            } else if (newRole === "Admin") {
                iconSetting.classList.add("active");
            }
        }
        roleSelect.style.display = "none";
        iconSetting.style.display = "inline-block";
        iconBan.style.display = "inline-block";
    });
});

function updateUserRole(userId, newRole) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", `./admin/updateUserRole/`, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.readyState == 4 && xhr.status === 200) {
            console.log("Role updated", xhr.responseText);
            showToast("Change role successfully!");
        } else {
            console.error("Error updating role");
            showToast("Not successfully!");

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
            iconBans[index].style.display = "inline-block";
        });
    }
});

iconBans.forEach((iconBan) => {
    iconBan.addEventListener("click", (event) => {
        if(event.target.closest("tr").querySelector(".icon-setting").classList.contains("active")) {
            showToast("Administrators cannot be banned!");
            return;
        }
        const modal = new bootstrap.Modal($("#confirmBanUser"));
        modal.show();
        event.stopPropagation();
        $("#confirmButton").addEventListener("click", function () {
            const userId = parseInt(event.target.closest('tr').dataset.userid);
            banUser(userId);
            event.target.closest('tr').remove();
            const modal = bootstrap.Modal.getInstance($("#confirmBanUser"));
            modal.hide();
        });
    })
})


function banUser(userId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./admin/banUser/", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        console.log(this.response)
        if(this.readyState == 4 && this.status == 200) {
            if(JSON.parse(this.response) == 1) {
                showToast("Ban successfully!");
            }
        }
    }
    xhr.send(JSON.stringify({"user_id": userId}));
}