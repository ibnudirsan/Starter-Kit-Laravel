@extends('errors::minimal')

@section('title', __('Forbidden | RumahDev'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
