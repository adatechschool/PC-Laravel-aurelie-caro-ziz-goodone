<x-app-layout>
  {{$user->name}}: 
  {{$user->email}}:
  {{$user->biography}}:
  <img src="{{ $user->img_profil }}">
</x-app-layout>