@extends('auth.master')
@section('main')
    <main>
        @if (session('msg'))
        <div class="aler alert-success" role="alert">
            {{ session('msg') }}
        </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                            <form action="{{ URL::route('post.login') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="large mb-1" for="inputEmailAddress">Nama</label>
                                    <input class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Masukkan nama user" value="{{ old('name') }}" name="name"/>
                                    @if ($errors->has('name'))
                                        <span class="error">
                                    {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="large mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4" id="inputPassword" type="password" placeholder="Masukkan password" value="{{ old('password') }}" name="password"/>
                                    @if ($errors->has('password'))
                                        <span class="error">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
