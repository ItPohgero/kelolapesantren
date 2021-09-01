<x-santri-layout>
    <div class="w-full">
        <!-- Tabs -->
        <ul id="tabs" class="inline-flex w-full justify-center px-1 pt-2 bg-gray-50">
            <li class="px-2 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-yellow-300 rounded-t opacity-50"><a id="default-tab" href="#first">Tabungan</a></li>
            <li class="px-2 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Toko</a></li>
            <li class="px-2 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Tunggakan</a></li>
            <li class="px-2 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#fourth">Lunas</a></li>
        </ul>

        <!-- Tab Contents -->
        <div id="tab-contents">
            <div id="first" class="p-4">
                <div class="text-center capitalize font-bold mb-3 bg-gray-200 py-2 rounded text-white bg-gradient-to-r from-yellow-200 to-blue-400">
                    History Tabungan
                </div>
                @include('santri.report.tabungan')
            </div>
            <div id="second" class="hidden p-4">
                <div class="text-center capitalize font-bold mb-3 bg-gray-200 py-2 rounded text-white bg-gradient-to-r from-yellow-400 to-blue-200">
                    History Toko
                </div>
                @include('santri.report.pembelian')
            </div>
            <div id="third" class="hidden p-4">
                <div class="text-center capitalize font-bold mb-3 bg-gray-200 py-2 rounded text-white bg-gradient-to-r from-pink-200 to-yellow-400">
                    History Tunggakan
                </div>
            </div>
            <div id="fourth" class="hidden p-4">
                <div class="text-center capitalize font-bold mb-3 bg-gray-200 py-2 rounded text-white bg-gradient-to-r from-pink-400 to-yellow-200">
                    History Lunas
                </div>
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
