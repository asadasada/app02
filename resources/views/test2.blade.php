<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<body>
    @isset($th_texts)
    @foreach($th_texts as $var)
    <div>{{ $var->text }}</div>
    @endforeach
{{  $th_texts->links() }}
    @endisset
    </body>
</html>
