<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#table-bar" aria-expanded="false">
                <span class="sr-only">Chức năng</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-md hidden-lg" href="#">Chức năng</a>
        </div>

        <div class="collapse navbar-collapse" id="table-bar">
            <ul class="nav navbar-nav">
                <li><a href="{{route($route)}}">Trở về</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search" action="{{route($route)}}" method="get">
                <div class="form-group">
                    <input type="text" name="key" class="form-control" placeholder="Tìm kiếm">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right btn-crud">
                @if(isset($create))
                <li><a href="{{ route($create) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a></li>
                @endif
                <li><button href="#" class="btn btn-danger btn-sm btn-massdel">Xóa</button></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>