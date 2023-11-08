@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add Story

                    <a href="{{ route('stories.index')}}" class="float-end">Back</a>
                </div>

                <div class="card-body">
                <!-- @if ($errors->all())
                    <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                           <li>
                            {{ $error }}
                        </li>
                        @endforeach
                     </ul>
                 </div>
                @endif -->

    <form method="post" action="{{ route('stories.store') }}">
        @csrf
        @include('stories.from')
       
    <button type="submit" class="btn btn-primary">Add</button>
</form>
               


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
