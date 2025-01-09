let itemsPerPage = 6;
let items = $$(".item");
if (window.location.href.includes("admin")) {
    itemsPerPage = 25; // Số item hiển thị trên mỗi trang
    items = $$(".admin-table-row");
}
const pageLinks = $$(".page-link[data-page]");

function displayPage(page, items, itemsPerPage) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    items.forEach((item, index) => {
        if (index >= startIndex && index < endIndex) {
            if (window.location.href.includes("admin")) {
                item.style.display = "table"; 
            } else {
                item.style.display = "block"; 
            }
        } else {
            item.style.display = "none"; 
        }
    });
}

function preparepagination(pageLinks, items, itemsPerPage) {
    pageLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            $(".page-item.active")?.classList.remove("active");
            event.preventDefault();
            link.closest(".page-item").classList.add("active");
            const page = parseInt(link.getAttribute("data-page"));
            if (!isNaN(page)) {
                displayPage(page, items, itemsPerPage);
            }
        });
    });
}

preparepagination(pageLinks, items, itemsPerPage);
$(".page-link[data-page='1']")?.click();
