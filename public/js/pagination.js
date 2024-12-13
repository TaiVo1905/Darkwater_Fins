const itemsPerPage = 6; // Số item hiển thị trên mỗi trang
        const items = document.querySelectorAll(".item");
        const pageLinks = document.querySelectorAll(".page-link[data-page]");

        function displayPage(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            items.forEach((item, index) => {
                if (index >= startIndex && index < endIndex) {
                    item.style.display = "block"; 
                } else {
                    item.style.display = "none"; 
                }
            });
        }

        pageLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault(); 
                const page = parseInt(link.getAttribute("data-page"));
                if (!isNaN(page)) {
                    displayPage(page);
                }
            });
        });

        displayPage(1);
