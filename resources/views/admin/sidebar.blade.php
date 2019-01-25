<section class="sidebar">

    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>

        </li>

        <li>
            <a href="{{route('category.index')}}">
                <i class="fa fa-list"></i>
                <span>All Category</span>
            </a>
        </li>

        <li>
            <a href="{{route('content.index')}}">
                <i class="fa fa-html5"></i>
                <span>All Content</span>
            </a>
        </li>
        <li class="treeview {{ (Request::segment(2) == 'upload-logo' || Request::segment(2) == 'portfolio-image') ? 'active' : ''  }}">
            <a href="#">
                <i class="fa fa-file-image-o"></i>
                <span>All Images</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                @foreach(\App\Models\Category::imageCategory() as $category)
                    <li><a href="{{ url('admin-section/portfolio-image/'.$category->category) }}"><i class="fa fa-image"></i>{{ $category->name }}</a></li>
                @endforeach
                    <li><a href="{{ url('admin-section/upload-logo') }}"><i class="fa fa-image"></i>Site Logo</a></li>
            </ul>
        </li>
    </ul>
</section>