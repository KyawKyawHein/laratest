@props(['blog'])
<x-card-wrapper>
    <div>
        <form method="post" action="/blogs/{{$blog->slug}}/comments">
            @csrf
            <div class="mb-3">
                <div class="form-floating">
                    <textarea class="form-control" name="body" style="height:100px" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Comments</label>
                </div>
                <x-error name="body"/>
            </div>
            <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">Submit</button></div>
        </form>
    </div>
</x-card-wrapper> 