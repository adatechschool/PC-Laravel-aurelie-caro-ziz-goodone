<x-guest-layout>
  {{$user->name}}: 
  {{$user->email}}:
  {{$user->biography}}:
  <img src="{{ $user->img_url }}">
</x-guest-layout>