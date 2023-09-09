<div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title}}</h3>
          <div>
            <div>{{ $blog->author->name }}</div>
            <div class="badge bg-primary">{{ $blog->category->name}}</div>
            <div>{{ $blog->created_at->diffForHumans()}}</div>
            <div>
              <form method="post" action="/blogs/{{$blog->slug}}/subscription">
                @csrf
                @if(auth()->user()->isSubscribed($blog))
                  <button class="btn btn-danger">Unsubscribe</button>
                @else
                  <button class="btn btn-primary">Subscribe</button>
                @endif
              </form>
            </div>
          </div>
          <p class="lh-md">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>