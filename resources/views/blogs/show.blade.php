<x-layout>
    
    <!-- singloe blog section -->
    <x-single-blog :blog="$blog"/>

    <!-- add comment -->
        <div class="container">
            <div class="col-8 mx-auto">
            @auth
                <x-comment-form :blog="$blog"/>
            @else
                <p class="text-center">Please <a href="/login">login</a> to participate in comment.</p>
            @endauth
            </div>
        </div>

    <x-comments :comments="$blog->comments()->latest()->paginate(2)" />

    <!-- blogs you may like  -->
    <x-blogs_you_may_like :blogs="$randomBlogs" />
    <!-- subscribe new blogs -->
    <x-subscribe/>
</x-layout>