<div>
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title">
                <i class="fas fa-comment-alt"></i> Chat
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="msger-chat">

            @foreach ($messages as $msg)

                @if ($msg->from->id == Auth()->user()->id)

                    <div class="msg right-msg">
                        <div class="msg-img"
                            style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)">
                        </div>

                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-name">{{ $msg->from->name }}</div>
                                <div class="msg-info-time">{{ \Carbon\Carbon::parse($msg->created_at)->diffForHumans()  }}</div>
                            </div>

                            <div class="msg-text">
                                {{ $msg->message }}
                            </div>
                        </div>
                    </div>

                @else


                    <div class="msg left-msg">
                        <div class="msg-img"
                            style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)">
                        </div>

                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-name">{{ $msg->from->name }}</div>
                                <div class="msg-info-time">{{ \Carbon\Carbon::parse($msg->created_at)->diffForHumans()  }}</div>
                            </div>

                            <div class="msg-text">
                                {{ $msg->message }}
                            </div>
                        </div>
                    </div>

                @endif

            @endforeach




        </main>

        <div class="msger-inputarea">
            <input type="text" wire:model="text" class="msger-input" placeholder="Enter your message...">
            <button  wire:click="increment"  class="msger-send-btn">Send</button>
        </div>
    </section>


    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('8d4603372fd78ded0879', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>


</div>
