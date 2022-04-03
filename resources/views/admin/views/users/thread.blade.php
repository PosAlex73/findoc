@extends('layouts.admin')
@section('content')
    <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @include('admin.components.buttons.back_button', ['route' => 'users.index'])
                @include('admin.components.buttons.submit')
            </div>
        </div>
        @include('admin.flash.errors')
        @includeWhen(!empty(session('status')), 'admin.flash.flashs', ['message' => session('status')])

        <div class="card">
            <div class="card-body">
                @include('admin.views.users.components.user_tabs')
                <section style="background-color: #eee;">
                    <div class="container py-5">

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">

                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center p-3"
                                         style="border-top: 4px solid #ffa900;">
                                        <h5 class="mb-0">{{ __('vars.chat_messages') }}</h5>
                                        <div class="d-flex flex-row align-items-center">
                                            <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                                            <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                                            <i class="fas fa-times text-muted fa-xs"></i>
                                        </div>
                                    </div>
                                    <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
                                        @forelse($messages as $message)
                                            @if($message->owner === \App\Enums\User\MessageOwner::ADMIN)
                                                @include('admin.views.users.components.admin_message', ['message' => $message])
                                            @else
                                                @include('admin.views.users.components.user_message', ['message' => $message])
                                            @endif
                                        @empty
                                            <p>{{ __('vars.you_have_no_messages') }}</p>
                                        @endforelse
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                        <div class="input-group mb-0">
                                            <form action="{{ route('thread.new_message', ['thread' => $thread]) }}" method="post">
                                                @csrf
                                                <input type="text" class="form-control" placeholder="Type message"
                                                       aria-label="Recipient's username" name="message" aria-describedby="button-addon2" />
                                                @include('admin.components.buttons.submit')
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </form>
@endsection
