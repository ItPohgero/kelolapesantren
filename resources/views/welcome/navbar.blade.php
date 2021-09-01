<nav class="sticky top-0 flex items-center bg-gray-800 px-3 py-1 md:py-3 flex-wrap text-xs md:text-sm">
  <a href="/" class="p-1 mr-4 inline-flex items-center">
    <img src="{{ asset('img/logo.svg') }}" class="h-6 mr-3">
    <span class="text-white font-bold uppercase tracking-wide"
      >{{ env('APP_NAME') }}</span
    >
  </a>
  <button
    class="text-white inline-flex p-1 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler"
    data-target="#navigation"
  >
  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" />
  </svg>
  </button>
  <div
    class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
    id="navigation"
  >
    <div
      class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto"
    >
      <a
        href="/"
        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
      >
        <span>Home</span>
      </a>
      <a
        href="#"
        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
      >
        <span>Blog</span>
      </a>
      <a
        href="#"
        class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white"
      >
        <span>Contact</span>
      </a>
    </div>
  </div>
</nav>