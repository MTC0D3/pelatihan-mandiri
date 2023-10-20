@extends('layouts.backend.app', ['title' => 'User'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-input-search placeholder="Search user.." :url="route('admin.user.index')" />
        </div>
        <div class="col-12">
            <x-card title="DAFTAR USER">
                <x-table>
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">NO</th>
                            <th>NIK</th>
                            <th>NAMA DAN GELAR</th>
                            <th>NOMOR HP</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($users as $i => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $i }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    <div class="row justify-content-between">
                                        <x-button-modal :id="$user->id" />
                                        <x-modal :id="$user->id" :url="route('admin.user.update', $user->id)" title="{{ $user->name }}"
                                            titleBtn="Update Role">
                                            <x-select title="Role" name="roles[]">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" @selected($user->roles()->find($role->id))>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                        </x-modal>
                                        <x-button-delete :id="$user->id" :url="route('admin.user.destroy', $user->id)" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
