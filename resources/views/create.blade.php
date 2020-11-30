<form method="post" action ="{{route('post.create')}}">
    @csrf
    @method('put')
    <div class="container">
        <label for="question"><b>Question:</b></label>
        <input type="text" placeholder="Enter your question" name="question" required>
    <br/>
        <label for="answer-1"><b>Answer 1</b></label>
        <input type="text" placeholder="Enter your first answer" name="answer-1" required>
        <br/>

        <label for="answer-2"><b>Answer 2</b></label>
        <input type="text" placeholder="Enter your second answer" name="answer-2" required>
        <br/>

        <label for="answer-3"><b>Answer 3</b></label>
        <input type="text" placeholder="Enter your third answer" name="answer-3" required>
        <br/>

        <label for="answer-4"><b>Answer 4</b></label>
        <input type="text" placeholder="Enter your fourth answer" name="answer-4" required>

        <br/>
        <!--- radiobutton correct answer-->
        <p>correct answer: </p>
        <input type="radio" id="answer-1-rad" name="correct" value="0">1
        <input type="radio" id="answer-2-rad" name="correct" value="1">2
        <input type="radio" id="answer-3-rad" name="correct" value="2">3
        <input type="radio" id="answer-4-rad" name="correct" value="3">4


        <button type="submit">Submit</button>
    </div>

</form>
