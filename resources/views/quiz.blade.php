
@can('create_question',$user??"" )
    <a href="{{url('/create')}}">Make New Question</a>
@endcan


<form method="post" action ="{{route('post.quiz')}}">
    @csrf
    @foreach($questions as $question)
    <h3 id="question-{{$i}}">Question {{$i++}}: {{$question->text}}</h3>
{{--        {{$answers=$questions->answers}}--}}
        @foreach($question->answers as $answer)
    <div>
        <input type="radio" name="question-{{$i}}-answers" id="question-1-answers-{{$answer->id}}" value="{{$answer->id}}" />
        <label for="question-{{$question->id}}-answers-{{$answer->id}}">{{$answer->text}}</label>
    </div>

            @endforeach
    @endforeach
    <button type="submit">Submit</button>
<!-- if logic is right-->

</form>
