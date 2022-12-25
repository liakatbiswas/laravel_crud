<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student List') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr class="bg-purple-300">
                                <th>Name</th>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student )
                            <tr class="border-b">
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->mother_name }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->dob }}</td>
                                <td class="flex items-center">
                                    <a class="ml-2 text-white text-xs bg-red-500 rounded px-4 py-1.5"
                                        href="{{ route('student-edit', $student->id) }}">Edit</a>

                                    <form action="{{ route('student-delete',$student->id) }}" method="POST">
                                        @csrf
                                        <button class="ml-2 text-white text-xs bg-red-500 rounded px-4 py-1.5">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
