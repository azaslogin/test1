<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
    @include('components.nav')
    @include('components.header')
    @include('components.index')
    @include('components.footer')
</html>