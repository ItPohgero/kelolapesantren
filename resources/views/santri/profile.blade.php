<x-santri-layout>
    <div class="w-full">
        <!-- Tabs -->
        <ul id="tabs" class="inline-flex w-full justify-center px-1 pt-2 bg-gray-50">
            <li class="px-2 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-yellow-300 rounded-t opacity-50"><a id="default-tab" href="#first">Profile</a></li>
            <li class="px-2 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Settings</a></li>
        </ul>

        <!-- Tab Contents -->
        <div id="tab-contents">
            <div id="first" class="p-4">
                <div class="text-center capitalize font-bold mb-3 h-32">
                    <div class=" flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>{{ santri()->nama }}</div>
                </div>
                @include('santri.profile.profile')
            </div>
            <div id="second" class="hidden p-4">
                @include('santri.profile.settings')
            </div>
        </div>
    </div>
    <script>
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                    tabTogglers[i].parentElement.classList.remove("border-yellow-300", "border-b", "-mb-px", "opacity-100");
                    tabContents.children[i].classList.remove("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        continue;
                    }
                    tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("border-yellow-300", "border-b-4", "-mb-px", "opacity-100");
            });
        });

        document.getElementById("default-tab").click();
    </script>
</x-santri-layout>
