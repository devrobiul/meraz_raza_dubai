(function () {
    // Wait for page to fully load
    window.addEventListener("load", function () {
        // Add click handlers directly to all dropdown toggles
        document
            .querySelectorAll("li.has-dropdown > a")
            .forEach(function (toggle) {
                toggle.onclick = function (e) {
                    e.preventDefault();

                    // Find target menu
                    var targetId =
                        this.getAttribute("href") ||
                        this.getAttribute("data-bs-target");
                    var menu = document.querySelector(targetId);

                    if (!menu) return false;

                    // Toggle this menu
                    if (menu.style.display === "block") {
                        menu.style.display = "none";
                        this.setAttribute("aria-expanded", "false");
                    } else {
                        // Close all other menus
                        document
                            .querySelectorAll(".submenu")
                            .forEach(function (m) {
                                m.style.display = "none";
                            });

                        // Open this menu
                        menu.style.display = "block";
                        this.setAttribute("aria-expanded", "true");
                    }

                    return false;
                };
            });

        // Set active page
        var path = window.location.pathname;
        document.querySelectorAll(".submenu a").forEach(function (link) {
            var href = link.getAttribute("href");
            if (
                href === path ||
                href === path.substring(1) ||
                "/" + href === path
            ) {
                // Mark as active
                link.classList.add("active");

                // Show parent menu
                var menu = link.closest(".submenu");
                if (menu) {
                    menu.style.display = "block";

                    // Mark parent as active
                    var parent = document.querySelector(
                        'a[href="#' + menu.id + '"]'
                    );
                    if (parent) {
                        parent.classList.add("active-parent");
                        parent.setAttribute("aria-expanded", "true");
                    }
                }
            }
        });
    });
})();
$(document).ready(function () {
    $("#dataTable").DataTable({
        pageLength: 10,
        ordering: true,
        searching: true,
        responsive: true,
    });
});


    $(document).ready(function () {
        $(".make_id").on("change", function () {
            var makerId = $(this).val();
            console.log("Make ID:", makerId); // Debugging

            if (makerId) {
                $(".model_id").html('<option value="">Loading...</option>'); // Show loading

                $.ajax({
                    url: "/make/by/model/" + makerId, // Make sure this route exists in web.php
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log("Received Models:", data); // Debugging

                        $(".model_id").html(
                            '<option value="">Select Model</option>'
                        ); // Reset dropdown

                        $.each(data, function (index, model) {
                            $(".model_id").append(
                                `<option value="${model.id}">${model.name}</option>`
                            );
                        });
                    },
                    error: function (xhr, status, error) {
                        $(".model_id").html(
                            '<option value="">No data found!</option>'
                        );
                    },
                });
            } else {
                $(".model_id").html(
                    '<option value="">Select Maker First</option>'
                ); // Default state
            }
        });
    });