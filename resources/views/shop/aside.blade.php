<aside
    class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed"
>
    <!-- Start of Sidebar Overlay -->
    <div class="sidebar-overlay"></div>
    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

    <!-- Start of Sidebar Content -->
    <div class="sidebar-content scrollable">
        <!-- Start of Sticky Sidebar -->
        <div class="sticky-sidebar">
{{--            <div class="filter-actions">--}}
{{--                <label>Filter :</label>--}}
{{--                <a href="#" class="btn btn-dark btn-link filter-clean"--}}
{{--                >Clean All</a--}}
{{--                >--}}
{{--            </div>--}}
            <!-- Start of Collapsible widget -->
            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <label>All Categories</label>
                </h3>
                <ul class="widget-body filter-items search-ul">
                    @if(count($categories) > 0)
                        @foreach($categories as $cat)
                            <li>
                                <a
                                    href="{{ route('shopFullwidthBanner', ['category' => ($cat['Category'])]) }}"
                                    class="{{ $selectedCategory == $cat['Category'] ? 'text-primary font-weight-bold' : '' }}">
                                    >
                                    {{ $cat['Category'] }}
                                </a>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
            <!-- End of Collapsible Widget -->
{{--            @include('shop.filter')--}}
        </div>
        <!-- End of Sidebar Content -->
    </div>
    <!-- End of Sidebar Content -->
</aside>
