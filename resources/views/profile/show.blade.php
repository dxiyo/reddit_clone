{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')

@section('nav')
    @include('navigation-menu', ['inSub' => false])
@endsection

@section('header')
<div class="bg-white">
    <div class="mx-auto w-9/12">
        <div class="flex justify-between py-2">
            <a href="#" class="hover:text-blue-600">OVERVIEW</a>
            <a href="#" class="hover:text-blue-600">POSTS</a>
            <a href="#" class="hover:text-blue-600">COMMENTS</a>
            <a href="#" class="hover:text-blue-600">SAVED</a>
            <a href="#" class="hover:text-blue-600">HIDDEN</a>
            <a href="#" class="hover:text-blue-600">UPVOTED</a>
            <a href="#" class="hover:text-blue-600">DOWNVOTED</a>
            <a href="#" class="hover:text-blue-600">AWARDS RECEIVED</a>
            <a href="#" class="hover:text-blue-600">AWARDS GIVEN</a>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
    <div class="border rounded">
        <div class="h-24 bg-blue-400 border-t rounded p-2">
            <img src="{{$user->avatar}}" class="w-24 rounded-lg border-4 border-white transform translate-y-8" alt="">
        </div>
        <div class="bg-white p-3 pt-3">
            <div class="text-sm mt-7">/u/{{$user->name}}</div>
            <div class="flex justify-between">
                <div class="">
                    <div class="font-bold">Karma</div>
                    <i class="far fa-sun text-blue-400"></i> <span class="text-sm text-gray-500">{{$user->karma()}}</span>
                </div>
                <div class="">
                    <div class="font-bold">Cake day</div>
                    <svg class="w-4 mr-2 inline" viewBox="0 5 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><g><path d="M37.5,22.5V20h-35v15c0,1.4,1.1,2.5,2.5,2.5h30c1.4,0,2.5-1.1,2.5-2.5v0H6.2C5.6,35,5,34.5,5,33.8l0,0c0-0.7,0.6-1.2,1.2-1.2h31.3V30H6.2C5.6,30,5,29.5,5,28.8v0c0-0.7,0.6-1.2,1.2-1.2h31.3V25H6.2C5.6,25,5,24.5,5,23.8v0c0-0.7,0.6-1.2,1.2-1.2H37.5z"></path><path d="M22.5,6c0,1.4-1.1,2.5-2.5,2.5S17.5,7.4,17.5,6S20,0,20,0S22.5,4.6,22.5,6z"></path><path d="M20,15L20,15c-0.7,0-1.3-0.6-1.3-1.2v-2.5c0-0.7,0.6-1.2,1.2-1.2h0c0.7,0,1.2,0.6,1.2,1.2v2.5C21.2,14.5,20.7,15,20,15z"></path><path d="M22.8,11.3v2.3c0,1.4-1,2.7-2.5,2.9c-1.6,0.2-3-1.1-3-2.7v-5c0,0,0-0.1,0-0.1l-0.8-0.4c-0.9-0.4-2-0.3-2.7,0.4L2.5,18.5h35L22.8,11.3z"></path></g></g></svg>
                    </i> <span class="text-sm text-gray-500">{{$user->created}}</span>
                </div>
            </div>
            <a href="/submit" class="bg-blue-500 hover:bg-blue-400 text-white w-full p-2 mt-4 block rounded-3xl text-center font-bold">New Post</a>
        </div>
    </div>
@endsection

@section('content')
    @include('posts.pinned', ['pinned' => $user->allPostsWithUpvotes()])
    @include('posts.index', ['posts' => $user->allPostsWithUpvotes()])
@endsection