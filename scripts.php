<!-- JavaScript for Dynamic Fields -->
<script>
    // Add Visitor
    document
        .getElementById("add-visitor")
        .addEventListener("click", function() {
            const container = document.getElementById("visitors-container");
            const newVisitor = container.firstElementChild.cloneNode(true);
            newVisitor
                .querySelectorAll("input")
                .forEach((input) => (input.value = ""));
            container.appendChild(newVisitor);
        });

    // Remove Visitor
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-visitor")) {
            e.target.closest(".visitor-group").remove();
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Add Plant
        document
            .getElementById("add-plant")
            .addEventListener("click", function() {
                const container = document.getElementById("plant-container");
                const newGroup = container
                    .querySelector(".plant-group")
                    .cloneNode(true);
                newGroup
                    .querySelectorAll("input, textarea")
                    .forEach((input) => (input.value = "")); // Clear inputs
                container.appendChild(newGroup);
            });

        // Remove Plant
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("remove-plant")) {
                const group = event.target.closest(".plant-group");
                if (group && document.querySelectorAll(".plant-group").length > 1) {
                    group.remove();
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Add Personnel
        document
            .getElementById("add-personnel")
            .addEventListener("click", function() {
                const container = document.getElementById("personnel-container");
                const newGroup = container
                    .querySelector(".personnel-group")
                    .cloneNode(true);
                newGroup
                    .querySelectorAll("input, textarea")
                    .forEach((input) => (input.value = "")); // Clear inputs
                container.appendChild(newGroup);
            });

        // Remove Personnel
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("remove-personnel")) {
                const group = event.target.closest(".personnel-group");
                if (
                    group &&
                    document.querySelectorAll(".personnel-group").length > 1
                ) {
                    group.remove();
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Add Materials
        document
            .getElementById("add-materials")
            .addEventListener("click", function() {
                const container = document.getElementById("materials-container");
                const newGroup = container
                    .querySelector(".materials-group")
                    .cloneNode(true);
                newGroup
                    .querySelectorAll("input, textarea")
                    .forEach((input) => (input.value = "")); // Clear inputs
                container.appendChild(newGroup);
            });

        // Remove Materials
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("remove-materials")) {
                const group = event.target.closest(".materials-group");
                if (
                    group &&
                    document.querySelectorAll(".materials-group").length > 1
                ) {
                    group.remove();
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Add Other
        document
            .getElementById("add-other")
            .addEventListener("click", function() {
                const container = document.getElementById("other-container");
                const newGroup = container
                    .querySelector(".other-group")
                    .cloneNode(true);
                newGroup
                    .querySelectorAll("input, textarea")
                    .forEach((input) => (input.value = "")); // Clear inputs
                container.appendChild(newGroup);
            });

        // Remove Other
        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("remove-other")) {
                const group = event.target.closest(".other-group");
                if (group && document.querySelectorAll(".other-group").length > 1) {
                    group.remove();
                }
            }
        });
    });

    document.querySelectorAll("ul.navbar-nav .nav-link")[2].classList.add("active")
</script>