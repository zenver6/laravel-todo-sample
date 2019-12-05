@extends('layouts.admin')

@section('content')
<user-list :users="{{ $users }}"></user-list>
@endsection