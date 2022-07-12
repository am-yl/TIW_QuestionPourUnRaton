<x-guest-layout>
	<div class="h-screen flex flex-col items-center justify-center m-auto sm:px-6 lg:px-8">
		<div class="max-w-md">
			<img class="logo" src="{{asset('/img/raccoon.png')}}" alt="logo">
			<h1 class="mt-6 text-center text-3xl font-extrabold">QUESTIONS POUR UN RATON</h1>
		</div>
		<div class="login pt-8">
			@if (Route::has('login'))
			<div>
				@auth
				<a class="btnWelcome" href="{{ url('/dashboard') }}">Dashboard</a>
				@else
				<a class="btnWelcome mr-1" href="{{ route('login') }}">Se connecter</a>

				@if (Route::has('register'))
				<a class="btnWelcome" href="{{ route('register') }}">S'enregistrer</a>
				@endif
				@endauth
			</div>
			@endif
		</div>
	</div>
</x-guest-layout>
