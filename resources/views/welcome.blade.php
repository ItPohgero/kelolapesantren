<x-guest-layout>
   @include('welcome.navbar')
    <div class="text-sm">
        <div class="w-full">
            <!-- Tabs -->
            <ul id="tabs" class="fixed bottom-0 inline-flex w-full justify-center px-1 pt-2 bg-gray-50 text-sm space-x-3">
                <li class="px-2 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-yellow-300 rounded-t opacity-50"><a id="default-tab" href="#first">Home Page</a></li>
                <li class="px-2 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Dokumentasi</a></li>
                <li class="px-2 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">About</a></li>
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="pb-32">
                @include('welcome.home-page')
                </div>
                <div id="second" class="hidden pb-32">
                    @include('welcome.dokumentasi')
                </div>
                <div id="third" class="hidden pb-32">
                    @include('welcome.about')
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
    <script src="{{ asset('attr/js/jquery.min.js') }}"></script>
    <script>
    $(document).ready(function() {
    $(".nav-toggler").each(function(_, navToggler) {
        var target = $(navToggler).data("target");
        $(navToggler).on("click", function() {
        $(target).animate({
            height: "toggle"
        });
        });
    });
    });

    </script>
</x-guest-layout>
