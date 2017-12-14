<h3>Hello <span data-bind='text: uname'></span>, want to make a comment on this recipe?</h3><br>
    <div class="commentbox">
        <div class="col span_4_of_4">
            <textarea data-bind="textInput: com" type="text" name="comment" rows = "5"  placeholder="Write your comment here."></textarea>
        </div>
            
        <div class="section group">
            <div class="col span_1_of_4">
                <button data-bind="click: submitComment" type="submit" name="submit" value="Comment">Comment</button>
            </div>
        </div>
    </div>
