<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('member.berita.tag.create.post')}}" method="POST" enctype="multipart/form-data">@csrf

                              <div class="form-group">
                                <label for="name">Display name</label>
                                <input id="name" name="name" type="text">
                              </div>
                              <div class="form-group">
                                <label for="location">Location</label>
                                <input id="location" name="location" type="text">
                              </div>
                              <input type="hidden" name="aboutme" id="aboutme">
                              <div class="form-group">
                                <label>About me</label>
                                <div id="editor"></div>
                              </div>
                              {{-- <button type="submit">Submit Form</button>
                              <button type="button" id="resetForm">Reset to Initial Data</button> --}}
                              <button type="button" onclick="test()">Test</button>
                        
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            const initialData = {
                name: 'Wall-E',
                location: 'Earth',
                // `about` is a Delta object
                // Learn more at: https://quilljs.com/docs/delta
                about: [
                    {
                    insert:
                        'A robot who has developed sentience, and is the only robot of his kind shown to be still functioning on Earth.\n',
                    },
                ],
            };

            const quill = new Quill('#editor', {
                modules: {
                    toolbar: [
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ],
                },
                theme: 'snow',
            });

            const resetForm = () => {
                document.querySelector('[name="name"]').value = initialData.name;
                document.querySelector('[name="location"]').value = initialData.location;
                quill.setContents(initialData.about);
            };

            resetForm();
            function test(){
                console.log(JSON.stringify(quill.getContents().ops));
                document.getElementById('#aboutme').value = quill.getContents();

            }

            const form = document.querySelector('form');
            form.addEventListener('formdata', (event) => {
            // Append Quill content before submitting
            event.formData.append('about', JSON.stringify(quill.getContents().ops));
            document.getElementById('#aboutme').value = JSON.stringify(quill.getContents().ops);
            });

            document.querySelector('#resetForm').addEventListener('click', () => {
            resetForm();
            });
        </script>
    </x-slot>
</x-app-layout>
