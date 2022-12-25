<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Registration') }}
        </h2>
    </x-slot>



    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('student-update',$student->id) }}" method="POST">
                        @csrf

                        <label class="block font-bold text-xs uppercase" for="name"> Name </label>
                        <input type="text" name="name" id="name" class="border px-3 py-2 mb-3 rounded-md w-full"
                            placeholder="Name" value="{{ $student->name }}">


                        <label class="block font-bold text-xs uppercase" for="father_name"> Father Name </label>
                        <input type="text" name="father_name" id="father_name"
                            class="border px-3 py-2 mb-3 rounded-md w-full" placeholder="Father Name"
                            value="{{ $student->father_name }}">

                        <label class="block font-bold text-xs uppercase" for="mother_name"> Mother Name </label>
                        <input type="text" name="mother_name" id="mother_name"
                            class="border px-3 py-2 mb-3 rounded-md w-full" placeholder="Mother Name"
                            value="{{ $student->mother_name}}">


                        <label class="block font-bold text-xs uppercase" for="phone"> Phone </label>
                        <input type="text" name="phone" id="phone" class="border px-3 py-2 mb-3 rounded-md w-full"
                            placeholder="Phone" value="{{ $student->phone }}">


                        <label class="block font-bold text-xs uppercase" for="father_name"> Date of Birth </label>
                        <input type="date" name="dob" id="dob" class="border px-3 py-2 mb-3 rounded-md w-full"
                            placeholder="Date of Birth" value="{{ $student->dob }}">

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
