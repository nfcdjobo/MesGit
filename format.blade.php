@php
    $banner = App\Aide::getBannieres();
@endphp

@extends('layouts.auth-blog.main')
@section('content')
    <x-guest-layout>
        {{-- <x-auth-card> --}}
            <!-- Logo -->
            <div class="auth-brand text-center text-lg-start">
                <div class="auth-logo">
                    <a href="{{ route('accueil') }}" class="logo logo-dark text-center">
                        <span class="logo-lg">
                            @if ($banner != null)
                                <img src="{{ asset($banner->logo2) }}" alt="" height="22">
                            @else
                                <img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="" height="22">
                            @endif
                        </span>
                    </a>

                    <a href="{{ route('accueil') }}" class="logo logo-light text-center">
                        <span class="logo-lg">
                            @if ($banner != null)
                                <img src="{{ asset($banner->logo2) }}" alt="" height="22">
                            @else
                                <img src="{{ asset('public/assets/images/logo-light.png') }}" alt="" height="22">
                            @endif
                            <img src="{{ asset('public/assets/images/logo-light.png') }}" alt="" height="22">
                        </span>
                    </a>
                </div>
            </div>

            <!-- title-->
            <h4 class="mt-0">S'inscrire</h4>
            <p class="text-muted mb-4">N'avez-vous pas de compte ? Créez votre propre compte, cela prend moins d'une minute</p>

            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="mb-2">
                    <x-input-label for="name" class="form-label" :value="__('Nom et prénom(s)')" />
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-2">
                    <x-input-label for="email" class="form-label" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-2">
                    <x-input-label for="avatar" class="form-label" :value="__('avatar')" />
                    <x-text-input id="avatar" class="form-control" type="file" name="avatar" :value="old('avatar')" accept="image/png, image/jpeg, image/jpg, image/svg, image/gif"/>
                    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-2">
                    <x-input-label for="password" class="form-label" :value="__('Mot de passe')" />
                    <div class="input-group">
                        <span class="input-group-text" data-password="false"><span class="password-eye"></span></span>
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-2">
                    <x-input-label for="password_confirmation" class="form-label" :value="__('Répéter le mot de passe')" />
                    <div class="input-group">
                        <span class="input-group-text" data-password="false"><span class="password-eye"></span></span>
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" autocomplete="password-confirmation" required />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Déjà enregistré, me connecter ?') }}
                    </a>

                    <x-primary-button class="btn btn-primary">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        {{-- </x-auth-card> --}}
    </x-guest-layout>
    <script>
        document.title='Inscription | Barriservices Blog';
    </script>
@endsection
