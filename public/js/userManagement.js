const iconSettings = $$(`.icon-setting`);
const iconDeletes = $$(`.icon-delete`);
const roleSelects = $$(`.role-select`);

iconSettings.forEach((iconSetting, index) => {
    const iconDelete = iconDeletes[index];  
    const roleSelect = roleSelects[index]; 
    iconSetting.addEventListener('click', () => {
        roleSelect.style.display = 'block';  
        iconDelete.style.display = "none";  
        iconSetting.style.display = "none"; 
    });
    roleSelect.addEventListener('change', (event) => {
        const newRole = event.target.value;

        if (newRole === "User") {
            iconSetting.classList.remove("admin");
            iconSetting.classList.add("user");
            iconSetting.style.color = "blue";  
            iconDelete.style.color = "red";  
        } else if (newRole === "Admin") {
            iconSetting.classList.remove("user");
            iconSetting.classList.add("admin");
            iconSetting.style.color = "green"; 
            iconDelete.style.color = "red"; 
        }

        roleSelect.style.display = "none";  
        iconSetting.style.display = "inline-block"; 
        iconDelete.style.display = "inline-block"; 
    });
});