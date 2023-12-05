@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('container')
<div class="card">
  <div class="card-body">
    <h2 class="text-secondary">Bachgroup CMS</h2>
    <p class="text-secondary">Content Management System</p>
    <h4>
      Selamat Datang, {{auth()->user()->name}} di CMS BACH Group
    </h4>
  </div>
</div>
@endsection