document.addEventListener("DOMContentLoaded", () => {
    const url = (window.location.pathname);
    console.log(url)
    if(url.includes("userManagement")) {
        $$(".sidebar a")[1].classList.add("active");
    } else if(url.includes("productManagement")) {
        $$(".sidebar a")[2].classList.add("active");
    } else if(url.includes("orderManagement")) {
        $$(".sidebar a")[3].classList.add("active");
    }else if(url.includes("pendingOrder")) {
        $$(".sidebar a")[4].classList.add("active");
    } else {
        $$(".sidebar a")[0].classList.add("active");
    }
})