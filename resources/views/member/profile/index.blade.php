@extends('layouts.backend.app', ['title' => 'Profile'])

@section('content')
    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="border-0 profile-user-img img-fluid img-circle" src="{{ $user->avatar }}"
                            alt="User profile picture">
                    </div>
                    <h3 class="text-center profile-username">{{ $user->name }}</h3>
                    <p class="text-center text-muted">{{ $user->about }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="card">
                <div class="p-2 card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <form class="form-horizontal" action="{{ route('member.profile.update', $user->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <x-upload-file title="Avatar" name="avatar" :value="$user->avatar" />
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" name="nik" class="form-control" value="{{ $user->nik }}"
                                        disabled>
                                </div>
                                <x-input title="Full Name" type="text" name="name" :value="$user->name" placeholder="" />
                                <x-input title="NIP" type="text" name="nip" :value="$user->nip"
                                    placeholder="Enter Your NIP" />
                                <x-input title="Nama Instansi" type="text" name="agency" placeholder="Enter Your Agency"
                                    :value="$user->agency" />
                                <x-input title="Jabatan" type="text" name="position" placeholder="Enter Your Position"
                                    :value="$user->position" />
                                <x-textarea title="Alamat Instansi" name="agency_address"
                                    placeholder="Enter Your Agency Address" value="">
                                    {{ $user->agency_address }}</x-textarea>
                                <x-input title="Tempat Lahir" type="text" name="birthplace"
                                    placeholder="Enter Your Birth of Place" :value="$user->birthplace" />
                                <x-input title="Tanggal Lahir" type="date" name="birthdate" placeholder=""
                                    :value="$user->birthdate" />
                                <x-input title="Nomor HP" type="string" name="phone" placeholder="" :value="$user->phone" />
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                        disabled>
                                </div>
                                <x-textarea title="Alamat" name="address" placeholder="Enter Your Address" value="">
                                    {{ $user->address }}</x-textarea>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">
                                        <i class="mr-1 fas fa-check"></i> Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="password">
                            <form class="form-horizontal" action="{{ route('member.profile.password', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <x-input title="Current Password" type="password" name="current_password" value=""
                                    placeholder="" />
                                <x-input title="New Password" type="password" name="password" value=""
                                    placeholder="" />
                                <x-input title="Password Confirmation" type="password" name="password_confirmation"
                                    value="" placeholder="" />
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success">
                                        <i class="mr-1 fas fa-check"></i> Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
