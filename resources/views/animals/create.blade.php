@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New animal</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('animals.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file"
                                           class="form-control @error('name') is-invalid @enderror" name="photo"
                                           value="{{ old('photo') }}" required autocomplete="photo" autofocus>

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="species_id" class="col-md-4 col-form-label text-md-right">Species</label>

                                <div class="col-md-6">
                                    <select id="species_id" class="form-control @error('species_id') is-invalid @enderror"
                                            name="species_id" required autocomplete="species_id" autofocus>
                                        @foreach ($species as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                        @error('species_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                                <div class="col-md-6">
                                    <input id="age" step="0.01" type="number"
                                           class="form-control @error('age')  is-invalid @enderror" name="age"
                                           value="{{ old('age') }}" min="0" required autocomplete="age" autofocus>

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="gender_id" class="col-md-4 col-form-label text-md-right">Gender</label>

                                <div class="col-md-6">
                                    <select id="gender_id" class="form-control @error('gender_id') is-invalid @enderror"
                                            name="gender_id" required autocomplete="gender_id" autofocus>
                                        @foreach ($genders as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>

                                <div class="col-md-6">
                                    <input id="location" type="text"
                                           class="form-control @error('location') is-invalid @enderror" name="location"
                                           value="{{ old('location') }}" required autocomplete="location" autofocus>

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="expires_in" class="col-md-4 col-form-label text-md-right">Expire date</label>

                                <div class="col-md-6">
                                    <input id="expires_in" type="date"
                                           class="form-control @error('expires_in') is-invalid @enderror" name="expires_in"
                                           value="{{ old('expires_in') }}" aut  ocomplete="expires_in" autofocus>

                                    @error('expires_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status_id" class="col-md-4 col-form-label text-md-right">Status</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_id" id="lost" value="1" checked>
                                        <label class="form-check-label" for="lost">
                                            Lost
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_id" id="found" value="2">
                                        <label class="form-check-label" for="found">
                                            Found
                                        </label>
                                    </div>
                                    <div class="form-check disabled">

                                    </div>
                                    @error('status_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create new animal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
