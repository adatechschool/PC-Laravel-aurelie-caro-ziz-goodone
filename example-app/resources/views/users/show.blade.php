<x-app-layout>
  {{$user->name}}: 
  {{$user->email}}:
  {{$user->biography}}:
  <img src="{{ $user->img_profile }}">
</x-app-layout>