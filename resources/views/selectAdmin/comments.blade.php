@extends('admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/admin/comments.css') }}">
@endsection

@section('content')
    <table class="com">
        <tr>
            <th class="subject"><h1>件名</h1></th>
            <th ><h1>內容</h1></th>
        </tr>
        
    @foreach($comments as $data)
        <tr>
            <td class="subject"><h1>{{ $data->title }}</h1></td>
            <td class="content"><h3>{{ $data->Comment }}</h3></td>
            <td>
                <form method="POST" action="{{ route('DeleteComments', $data->id) }}">
                    @csrf
                    <button type="submit" name="Delete">刪除</button>
                </form>
            </td>
        </tr>
    @endforeach
        
    </table>
        
@endsection