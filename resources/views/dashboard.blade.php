<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->is_writer || Auth::user()->is_admin)
                        {{-- Say Goodmorning/Good afternoon/etc depending on current time.  --}}
                        <h2
                            class="mt-5 mb-1 text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-tl from-red-500 to-red-800">
                            Welcome back, {{ Auth::user()->name }}!</h2>
                    @else
                        <script>
                            window.location = "{{ route('journal.index') }}";
                        </script>
                    @endif
                    <div class="mb-10">
                        <a target="_blank" class="weatherwidget-io" href="https://forecast7.com/en/52d514d96/purmerend/"
                            data-label_1="PURMEREND" data-label_2="WEATHER" data-font="Open Sans"
                            data-days="3">PURMEREND
                            WEATHER</a>
                    </div>


                    <rssapp-wall id="vDaOY1CorAHgziXF"></rssapp-wall>
                    <script src="https://widget.rss.app/v1/wall.js" type="text/javascript" async></script>
                    <SCRIPT>
                        ! function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = 'https://weatherwidget.io/js/widget.min.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, 'script', 'weatherwidget-io-js');
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
