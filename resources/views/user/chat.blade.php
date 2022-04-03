@extends('user.layouts.main')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-0">
                <!-- .chat-row -->
                <div class="chat-main-box">
                    <!-- .chat-left-panel -->
                    <div class="chat-left-aside">
                        <div class="open-panel"><i class="ti-angle-right"></i></div>
                        <div class="chat-left-inner">
                            <div class="form-material">
                                <input class="form-control p-20" type="text" placeholder="Search Contact">
                            </div>
                            <ul class="chatonline style-none ">
                                @foreach($chats as $chat)
                                    @if($chat->to_user != Auth::user()->id)
                                        <?php
                                        $user = $chat->toUser;
                                        ?>
                                    @else
                                        <?php
                                        $user = $chat->fromUser;
                                        ?>
                                    @endif
                                    <li>
                                        <a href="{{ route('inbox', $chat->id) }}" class="{{  $chat->id == $chat_id?'active':""  }}"><img src="{{ asset('images/'. $user->image) }}"
                                                                          alt="user-img" class="img-circle">
                                            <span>{{ $user->first_name . ' ' . $user->last_name }}</span></a>
                                    </li>
                                @endforeach
                                <li class="p-20"></li>
                            </ul>
                        </div>
                    </div>
                    <!-- .chat-left-panel -->
                    <!-- .chat-right-panel -->
                    <div class="chat-right-aside">
                        <div class="chat-main-header">
                            <div class="p-20 b-b">
                                <h3 class="box-title">Chat Message</h3>
                            </div>
                        </div>
                        <div class="chat-rbox" id="messages">
                            <ul class="chat-list p-20">
                            @foreach($messages as $message)
                                <!--chat Row -->
                                    <li>
                                        <div class="chat-img"><img
                                                src="{{ asset('images/'.$message->user->image) }}"
                                                alt="{{ $message->user->first_name . ' ' . $message->user->last_name }}"/>
                                        </div>
                                        <div class="chat-content">
                                            <h5>{{ $message->user->id == Auth::user()->id? 'Me':$message->user->first_name . ' ' . $message->user->last_name }}</h5>
                                            <div>{{ $message->message }}</div>
                                        </div>
                                        <div
                                            class="chat-time">{{ \Carbon\Carbon::parse($message->created_at)->setTimezone(config('app.localTimezone'))->format('d M h:i a') }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body b-t">
                            <div class="row">
                                <div class="col-8">
                                    <textarea placeholder="Type your message here" id="message"
                                              class="form-control b-0"></textarea>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" id="send" class="btn btn-info btn-circle btn-lg"><i
                                            class="fa fa-paper-plane-o"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .chat-right-panel -->
                </div>
                <!-- /.chat-row -->
            </div>
        </div>
    </div>
    @csrf
    <!-- ============================================================== -->
    <!-- End PAge Content -->
@endsection
@section('script')
    <script>
        var message = $('#message');
        var token = $('input[name="_token"]').val();
        var url = "{{ route('send') }}";
        var chat_id = {{ $chat_id}};
        var chatonline = $('.chatonline');
        var chat = $('ul.chat-list');
        $('#send').click(function () {
            if (message.val() == '') {
                alert('Please Type a message here');
                return;
            }
            $.ajax({
                url: '/inbox/send',
                type: "post",
                dataType: 'json',
                cache: false,
                data: {
                    '_token': token,
                    'message': message.val(),
                    'chat_id': chat_id
                },
                success: function (response) {

                    if (parseInt(response.status) === 200) {
                        message.val('');

                        $('ul.chat-list').append('<li>' +
                            '                                        <div class="chat-img"><img' +
                            '                                                src="' + response.user_image + ' "' +
                            '                                                alt="' + response.user_name + '"/>' +
                            '                                        </div>' +
                            '                                        <div class="chat-content">' +
                            '                                            <h5>' + response.user_name + '</h5>' +
                            '                                            <div>' + response.message + '</div>' +
                            '                                        </div>' +
                            '                                        <div' +
                            '                                            class="chat-time">'+ response.time +'</div>' +
                            '                                    </li>');
                    } else {
                        alert('something is wrong');
                    }
                    scrollBtm()
                }
            });
        })

        setInterval(function () {
                $.ajax({
                    url: '/inbox/face',
                    type: "post",
                    dataType: 'json',
                    cache: false,
                    data: {
                        '_token': token,
                        'message': message.val(),
                        'chat_id': chat_id
                    },
                    success: function (response) {

                        if (parseInt(response.status) === 200) {
                            chat.html('');
                            response.messages.forEach(function (message) {

                                chat.append('<li>' +
                                    '                                        <div class="chat-img"><img' +
                                    '                                                src="' + message.image + ' "' +
                                    '                                                alt="' + message.name + '"/>' +
                                    '                                        </div>' +
                                    '                                        <div class="chat-content">' +
                                    '                                            <h5>' + message.name + '</h5>' +
                                    '                                            <div>' + message.message + '</div>' +
                                    '                                        </div>' +
                                    '                                        <div' +
                                    '                                            class="chat-time">'+ message.time +'</div>' +
                                    '                                    </li>');
                            });
                            chatonline.html('')
                            response.chats.forEach(function (chat) {
                                var active = '';
                                if(chat.chat_id == chat_id){
                                    active = 'active';
                                }
                                chatonline.append('<li>' +
                                    '<a href="/inbox/'+ chat.chat_id +'" class="'+ active +'"><img src="'+ chat.image +'"'+
                                'alt="user-img" class="img-circle">'+
                                  '  <span>'+ chat.name +'</span></a>'+
                                '</li>');
                            });

                        } else {
                            alert('something is wrong');
                        }
                        scrollBtm()
                    }

                })
            },
            5000
        )
        scrollBtm()
        function scrollBtm() {
            var objDiv = document.getElementById("messages");
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    </script>
@endsection
