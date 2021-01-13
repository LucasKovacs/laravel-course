<x-master>
    @section('main-content')
        <h1>main content</h1>
    @endsection

    @section('sidebar')
        <h2>sidebar</h2>
        <x-home-search></x-home-search>
        <x-categories :users="$users"></x-categories>
        <x-side-widget></x-side-widget>
    @endsection
</x-master>