<div class="sidebar py-3" id="sidebar">

    <ul class="list-unstyled">
        <li class="sidebar-list-item"><a class="sidebar-link text-muted active" href="{{ route('dashboard')}}"
                role="button">
                <svg class="svg-icon svg-icon-md me-3">

                </svg><span class="sidebar-link-title">Dashboard </span></a>

        </li>
        <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="{{ route('category.list')}}"
                role="button">
                <svg class="svg-icon svg-icon-md me-3">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#reading-1"> </use>
                </svg><span class="sidebar-link-title">Category </span></a>

        </li>

        <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="{{ route('menu.list')}}" role="button">
                <svg class="svg-icon svg-icon-md me-3">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#sorting-1"> </use>
                </svg><span class="sidebar-link-title">Menu</span></a>

        </li>
        <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="{{ route('customer.list')}}"
                role="button">
                <svg class="svg-icon svg-icon-md me-3">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#pie-chart-1"> </use>
                </svg><span class="sidebar-link-title">Customer</span></a>

        </li>
        <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="{{route('order.list')}}" role="button">
                <svg class="svg-icon svg-icon-md me-3">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#file-storage-1"> </use>
                </svg><span class="sidebar-link-title">Orders</span></a>
         </li>
     
         <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="{{route('report.list')}}" role="button">
                <svg class="svg-icon svg-icon-md me-3">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#file-storage-1"> </use>
                </svg><span class="sidebar-link-title">Report</span></a>
         </li>


        <li class="sidebar-list-item">
            <a class="sidebar-link text-muted " href="{{route('sign.out')}}" role="button">
                <svg class="svg-icon svg-icon-md me-3">
                    <use xlink:href="icons/orion-svg-sprite.71e9f5f2.svg#man-1"> </use>
                </svg><span class="sidebar-link-title">Logout</span></a>

        </li>

    </ul>

</div>
