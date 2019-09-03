@extends('layouts.appX')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content h-100 w-100">
        <div class="m-b-md h-100">
            @isset($thread)
            {{ $thread->title }}
            @endisset
            @isset($texts)
            <ol id="texts">
                @foreach($texts as $text)
                <div>名前：{{ $text->name }} メール:{{ $text->mail }} ID:{{ $text->ip." 投稿日:".$text->created_at->format("Y/m/d").'('.['日', '月', '火', '水', '木', '金', '土'][$text->created_at->dayOfWeek].')'.$text->created_at->format('H:i:s')}}</div>
                <li class="h-25 above">{{ $text->text }}</li>
                @endforeach
            </ol>
            @endisset
            <form action= "{{ route('thread',$thread->id) }}" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                <div id="txtarea1">
                    <div>投稿</div>
                    <div id="top_form1">
                        <textarea id="txt1" name="name" cols="15" rows="1" placeholder="name"></textarea>
                        <textarea id="txt2" name="mail" cols="15" rows="1" placeholder="mail"></textarea>
                    </div>
                    <div id="btm_form1">
                        <textarea name="text" cols="50" rows="5" placeholder="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
                <div>
                                <button type="button" id="texts_koushin">更新</button>
                                </div>
                                <br>
                                <div>
                <a href="{{ route('main') }}">戻る</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection