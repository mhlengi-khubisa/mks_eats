@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] bg-slate-100 px-4 py-12">
    <div class="mx-auto max-w-md rounded-3xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/70">
        <div class="mb-8 text-center">
            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl font-bold text-emerald-700">ME</div>
            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-emerald-700">Mks Eats</p>
            <h1 class="mt-3 text-3xl font-bold text-slate-900">Admin login</h1>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200" placeholder="admin@townshipmarket.test">
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password</label>
                <input id="password" type="password" name="password" required class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200" placeholder="Enter your password">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="inline-flex items-center gap-2 text-slate-600">
                    <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    Remember me
                </label>
                <a href="{{ url('/') }}" class="font-medium text-emerald-700 hover:underline">Back to shop</a>
            </div>

            <button type="submit" class="w-full rounded-xl bg-emerald-700 px-4 py-3 text-base font-semibold text-white shadow-lg shadow-emerald-200 transition hover:bg-emerald-800">
                Sign in to admin
            </button>
        </form>

        <div class="mt-6 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600">
            Demo admin account: <span class="font-semibold">admin@townshipmarket.test</span> / <span class="font-semibold">Password123!</span>
        </div>
    </div>
</div>
@endsection
