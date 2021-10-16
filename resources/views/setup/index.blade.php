@extends('setup.layout')

@section('content')
    <dl class="mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">
        @foreach ($requirements as $requirement => $properties)
            <div class="relative">
                <dt>
                    @if ($properties['result'])
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    @else
                        <svg class="absolute h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    @endif
                    <p class="ml-9 text-lg leading-6 font-medium text-gray-900">
                        {{ $requirement }}
                    </p>
                </dt>
                <dd class="mt-2 ml-9 text-base text-gray-500">
                    {{ $properties['description'] }}
                </dd>
            </div>
        @endforeach
    </dl>
@endsection