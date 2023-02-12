<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uNote</title>
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

    </style>
</head>

<body class="bg-[#111827] scroll-smooth">
    <x-app-layout>
        <form action="{{route('note-update', $note->id)}}" method="post">
            @csrf
            @method('PATCH');
            <div class="flex justify-between  items-center p-12 flex-wrap ">
                <div class="flex">
                    <div>
                        <label for="" class="text-white"> Title: </label>
                        <div>
                            <input type="text" value="{{$note->title}}" placeholder="title" name="title"
                                class="rounded-md border-2 border-gray-700 focus:border-purple-700 focus-visible:border-purple-700 bg-zinc-900 w-72 text-white">
                                @error('title')
                                <div class="mb-4">
                                    <p class="border-b-2 border-b-red-500/50 text-red-600"> {{$message}} </p>
                                </div>
                                @enderror
                        </div>
                    </div>
                    <div class="ml-16">
                        <label for="" class="text-white"> Category: </label>
                        <div>
                            <select name="category_id" id=""
                                class="hover:cursor-pointer mb-7 bg-transparent border-transparent border-b-2  border-b-gray-700 hover:border-b-purple-700 text-white py-2 px-28">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" class="bg-zinc-900 "> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div class="mb-4">
                            <p class="border-b-2 border-b-red-500/50 text-red-600"> {{$message}} </p>
                        </div>
                        @enderror
                    </div>
                </div>

                <div>
                    <a href="{{route('note-index')}}" class="self-end">
                        <button type="button"
                            class="py-1 mr-16 hover:bg-green-600 hover:border-green-600 text-gray-500/60 text-[18px] font-semibold hover:text-white transition-all flex self-end px-12 rounded-md border-2 border-gray-700 ">
                            <i class="text-current">
                                <?xml version="1.0" encoding="utf-8"?><svg width="20" height="20" version="1.1"
                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 122.88 112.07" style="enable-background:new 0 0 122.88 112.07"
                                    xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill-rule: evenodd;
                                            clip-rule: evenodd;
                                        }

                                    </style>
                                    <g>
                                        <path class="st0"
                                            d="M61.44,0L0,60.18l14.99,7.87L61.04,19.7l46.85,48.36l14.99-7.87L61.44,0L61.44,0z M18.26,69.63L18.26,69.63 L61.5,26.38l43.11,43.25h0v0v42.43H73.12V82.09H49.49v29.97H18.26V69.63L18.26,69.63L18.26,69.63z" />
                                    </g>
                                </svg> </i>
                            Home
                        </button>
                    </a>
                </div>
            </div>

            <div class="w-full mx-auto h-[140%] rounded-lg border border-gray-700 p-8 lg:py-12 lg:px-14 text-gray-300 m-5"
                style="max-width: 800px" x-data="app()" x-init="addItem()">
                <div class="mb-10">
                    <h1 class="text-2xl font-bold"><i
                            class="mdi mdi-star text-yellow-300 text-3xl leading-none align-bottom"></i> Write your note
                    </h1>
                    @error('content')
                    <div class="mb-4">
                        <p class="border-b-2 border-b-red-500/50 text-red-600"> {{$message}} </p>
                    </div>
                    @enderror
                </div>

                <div class="flex justify-center flex-col items-center ">
                    <input type="text" name="content" value="{{$note->content}}"
                        class="w-full h-full bg-transparent border-transparent ">
                    <button type="submit"
                        class="py-3 px-10 border border-green-500 hover:bg-green-600 transition-all rounded leading-none focus:outline-none text-sm">
                        Save <i class="mdi mdi-plus"></i> </button>
                </div>
            </div>
        </form>


        <script>
            function nextStep() {

            }

        </script>

    </x-app-layout>
</body>

</html>
