function data() {
    function getThemeFromLocalStorage() {
        // if user already changed the theme, use it
        if (window.localStorage.getItem("dark")) {
            return JSON.parse(window.localStorage.getItem("dark"));
        }

        // else return their preferences
        return (
            !!window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        );
    }

    function setThemeToLocalStorage(value) {
        window.localStorage.setItem("dark", value);
    }

    return {
        dark: getThemeFromLocalStorage(),
        toggleTheme() {
            this.dark = !this.dark;
            setThemeToLocalStorage(this.dark);
        },
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen;
        },
        closeSideMenu() {
            this.isSideMenuOpen = false;
        },
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
            this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
        },
        closeNotificationsMenu() {
            this.isNotificationsMenuOpen = false;
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen;
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false;
        },
        isPagesMenuOpen: false,
        togglePagesMenu() {
            this.isPagesMenuOpen = !this.isPagesMenuOpen;
        },
        // Modal
        isModalOpen: false,
        orderBtn: null,
        tailor_id: null,
        openModal(eve) {
            console.log(eve.target);
            this.orderBtn = eve.target;
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
            this.flag = true;
            let buttons = document.querySelectorAll(".assign-tailor");
            // reseting all buttons state
            for (const btn of buttons) {
                btn.lastElementChild.textContent = "Assign";
                btn.classList.replace("bg-gray-300", "bg-purple-700");
            }
        },

        flag: true,
        async assignOrder(element) {
            if (this.flag) {
                this.flag = false;

                let data = new FormData(); // creating form data to send to server
                data.append(
                    "order_id",
                    this.orderBtn.getAttribute("data-order-id")
                );
                data.append(
                    "tailor_id",
                    element.parentElement.getAttribute("data-tailor-id")
                );
                element.firstElementChild.classList.remove("hidden");
                element.lastElementChild.textContent = "Assigning...";

                // Assigning tailor to corresponding order
                let request = await fetch("/admin/assignOrder", {
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    method: "post",
                    body: data,
                });

                let response = await request.json();
                console.log(response);
                switch (response.status) {
                    case "done":
                        element.lastElementChild.textContent = "Assigned";
                        element.firstElementChild.classList.add("hidden");
                        element.classList.replace(
                            "bg-purple-700",
                            "bg-gray-300"
                        );
                        this.orderBtn.classList.replace(
                            "bg-purple-600",
                            "bg-gray-300"
                        );
                        this.orderBtn.textContent = "Assigend";
                        this.orderBtn.style.pointerEvents = "none";
                        this.orderBtn = null;
                        break;
                }
            }
        },
    };
}
