@extends('_layouts.public')
@section('page-content')
    <div class="container p-6 border mx-auto my-12">
        <div class="text-2xl font-bold">
            {{ $type->name }}
        </div>
        <div class="prose mt-3">
            {{ $type->description ?? 'No description provided.' }}
        </div>
        <hr class="my-4">
        <div class="overflow-x-auto">
            <table class="table table-zebra table-compact w-full">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Years and Numbers</th>
                        <th>Legislation type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($type->primaryLegislation as $legislation)
                        <tr>
                            <td>
                                <a href="#" class="text-primary hover:underline">{{ $legislation->title }}</a>
                            </td>
                            <td>
                                <a href="#" class="text-primary hover:underline">{{ $legislation->act_year }} {{ $legislation->act_number }}</a>
                            </td>
                            <td>
                                {{ $legislation->type->name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
