<div
    data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="exampleModalCenter"
    tabindex="-1"
    aria-labelledby="exampleModalCenterTitle"
    aria-modal="true"
    role="dialog">

    <div
        data-te-modal-dialog-ref
        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
        <div
            class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 ">
                <!--Modal title-->
                <h5
                    class="text-xl font-medium leading-normal text-neutral-800 "
                    id="exampleModalScrollableLabel">
                    Create a new category
                </h5>
                <!--Close button-->
                <button
                    type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-modal-dismiss
                    aria-label="Close">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-6 w-6">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!--Modal body-->
            <div class="relative p-4">
                <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="post"
                      id="category-create-form">
                    @csrf
                    <div class="mb-4">
                        <label class="label" for="title">Title</label>
                        <input
                            class="input"
                            type="text" id="title" name="title">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                        <textarea
                            rows="5"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                            id="description" name="description" placeholder="john@example.com"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Photo</label>
                        <input
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-cyan-500"
                            type="file" id="photo" name="photo">
                    </div>
                    <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end p-4">
                        <button
                            type="button"
                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                            data-te-modal-dismiss
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Close
                        </button>
                        <button
                            onclick="submitForm()"
                            type="button"
                            class="btn-primary"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <!--Modal footer-->

    </div>
</div>


<script>
    function submitForm() {
        let form = document.getElementById('category-create-form');

        form.submit();
    }
</script>
