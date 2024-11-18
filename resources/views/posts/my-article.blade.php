<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Article
        </h2>
    </x-slot>

    {{-- container --}}
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        {{-- form --}}
        <form action="/posts" method="POST">
            @csrf
            {{-- post title --}}
            <div class="mb-5">
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    New Title
                </label>
                <input name="title" required placeholder="Your new title here"
                    type="text" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            {{-- post content --}}
            <div class="mb-5">
                <textarea name="content">
                    Welcome to TinyMCE!
                </textarea>
            </div>

            {{-- submit button --}}
            <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Save Article
            </button>
        </form>
    </main>

    @push("after-scripts")
        <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
        <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
        </script>
    @endpush
</x-app-layout>
