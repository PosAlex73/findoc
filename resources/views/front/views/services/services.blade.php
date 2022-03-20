@extends('layouts.front')
@section('content')
    <main>
        <div class="container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('vars.title') }}</th>
                    <th scope="col">{{ __('vars.price') }}</th>
                    <th scope="col">{{ __('vars.sign') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <th scope="row">{{ $service->id }}</th>
                        <td><a href="{{ route('front.services.details', ['service' => $service]) }}">{{ $service->title }}</a></td>
                        <td>{{ $service->price }}</td>
                        <td><a href="">{{ __('vars.appointment') }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
