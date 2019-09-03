@extends('layouts.appX')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content h-100 w-100">
        <div class="m-b-md h-100">
            <div>
            スレッド一覧
            <div>
                <button type="button" id="koushin">更新</button>
         </div>
            </div>
            @isset($threads)
            <ol id="threads">
                @foreach($threads as $thread)
                <div id="thread_title_box">
                <a href="{{ route('thread',$thread->id) }}" title="すれっど"><li id="thread_title">{{ $thread->title.'('.count($thread->texts()->get()).')'}}</li></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                @endforeach
            </ol>
            @endisset
            <div id ="sample" class="dwn">
                <!-- ここには別の"threads"が入る -->
                @if($pages != null)
                @foreach($pages as $page)
                <div class = "th_title">
                {{ $page->title }}
                </div>
                <ol id="texts">
                    @foreach($page->texts()->take(5)->get() as $text)
                    <div>名前：{{ $text->name }} メール:{{ $text->mail }} ID:{{ $text->ip." 投稿日:".$text->created_at->format("Y/m/d").'('.['日', '月', '火', '水', '木', '金', '土'][$text->created_at->dayOfWeek].')'.$text->created_at->format('H:i:s')}}</div>
                    <li class="h-25 above">{{ $text->text }}</li>
                    @endforeach
                    </ol>
                    @endforeach
                 <div id = "links" class="fixed-bottom">
                {{ $pages->links() }}
                </div>
                @endif
            </div>
            <div class="h-50 foot">
                <form action= "{{ route('main') }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <div id="txtarea1">
                        <div>スレッド作成</div>
                        <div id="top_form1">
                            <textarea id="txt1" name="name" cols="15" rows="1" placeholder="name"></textarea>
                            <textarea id="txt2" name="mail" cols="15" rows="1" placeholder="mail"></textarea>
                        </div>
                        <div id="btm_form1">
                            <textarea name="title" cols="50" rows="1" placeholder="タイトル"></textarea>
                            <br>
                            <textarea name="text" cols="50" rows="5" placeholder="text"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">送信</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection