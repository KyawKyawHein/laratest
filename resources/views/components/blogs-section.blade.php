@props(["blogs"])
<section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">Blogs</h1>
      <x-category-dropdown/>
      <form action="" class="my-3">
        <div class="input-group mb-3">
          @if(request("category"))
          <input type="hidden" value="{{request('category')}}" name="category">
          @endif
          @if(request("author"))
            <input type="hidden" value="{{request('author')}}" name="author">
          @endif
          <input
            type="text"
            value="{{request('search')}}"
            name="search"
            autocomplete="false"
            class="form-control"
            placeholder="Search Blogs..."
          />
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
            Search
          </button>
        </div>
      </form>
      <div class="row">
        @forelse($blogs as $blog)
          <div class="col-md-4 mb-4">
            <x-blog-card :blog="$blog" />
          </div>
        @empty
          <h1>Not Found</h1>
        @endforelse
      </div>
      {{$blogs->links()}}
    </section>