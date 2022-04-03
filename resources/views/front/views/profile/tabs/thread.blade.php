<section style="background-color: #eee;">
    <div class="container py-5">

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center p-3"
                         style="border-top: 4px solid #ffa900;">
                        <h5 class="mb-0">Chat messages</h5>
                        <div class="d-flex flex-row align-items-center">
                            <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                            <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                            <i class="fas fa-times text-muted fa-xs"></i>
                        </div>
                    </div>
                    <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px; overflow-x: auto">
                        @foreach($messages as $message)
                            @if($message->owner === \App\Enums\User\MessageOwner::ADMIN)
                                @include('front.views.profile.chat.admin', ['message' => $message])
                            @elseif($message->owner === \App\Enums\User\MessageOwner::USER)
                                @include('front.views.profile.chat.user', ['message' => $message])
                            @endif
                        @endforeach
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                        <div class="input-group mb-0">
                            <form action="{{ route('front.thread.new_message', ['thread' => $thread]) }}" method="post">
                                @csrf
                                <input type="text"
                                       class="form-control"
                                       placeholder="Type message"
                                       name="message"
                                       aria-label="Recipient's username"
                                       aria-describedby="button-addon2"
                                />
                                @include('front.buttons.submit')
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
