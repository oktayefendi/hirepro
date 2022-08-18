<x-app-layout>

<div class="container mt-5">
    @include('messenger.partials.flash')

    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
</div>

</x-app-layout>
