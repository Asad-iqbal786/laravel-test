@extends('layouts.admin_app')

@section('main-content')


<div class="container-xxl flex-grow-1 container-p-y">
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
          <h5 class="card-header">All Sellser</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>img</th>
                  <th>Name</th>
                  <th>email</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($getSellser as $index => $user)
                <tr>
                    <td>{{$index + 1 }}</td>
                    <td>
                      <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                        
                        <li
                          data-bs-toggle="tooltip"
                          data-popup="tooltip-custom"
                          data-bs-placement="top"
                          class="avatar avatar-xs pull-up"
                          title="Christina Parker">
                          <img src="{{asset('admin/assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle" />
                        </li>
                      </ul>
                    </td>
                    <td> {{ $user['name']}} </td>
                    <td>
                        {{ $user['email']}}
                    </td>
                  </tr>
                @empty
                    <p>User not found</p>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
    </div>   
</div>
@endsection





@push('scripts')

@endpush
