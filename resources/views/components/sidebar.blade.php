<div class="bd-sidebar">

    <div class="sidebar-container">

        <div class="sidebar-header">
            <div class="media media-user">
                @if (Auth::user()->image)
                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                    style="width:40px; height:40px; left:10px;  border-radius:50%">
            @else
                <div class="avatar"></div>
            @endif

                <div class="media-body">
                    <h2 class="fs-16 fw-500 ml-4" style="font-size: 1rem">{{ Auth::user()->name }}</h2>
                    {{-- <div class="mt-1 text-muted">หมวดหมู่ : นักวิชาการ</div> --}}
                </div>
            </div>
        </div>

        <ul class="sidebar-menu">

            @foreach ($navigations as $nav)

                @if (!empty($nav['sub']))
                    <li
                        class="sidebar-menu-item sidebar-submenu-container{{ isset($nav['isExactActive']) ? ' sidebar-submenu--active sidebar-submenu--disabled' : '' }}">
                        <div class="sidebar-menu-title-container">

                            <div class="sidebar-menu-title">
                                @isset($nav['icon'])
                                    <span class="sidebar-menu-item-icon">{!! $nav['icon'] !!}</span>
                                @endisset

                                <span class="sidebar-menu-item-text">{{ $nav['name'] }}</span>
                            </div>

                            <div class="sidebar-menu-item-collapse">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path
                                        d="M8 6.81l3.97 3.97a.75.75 0 0 0 1.06-1.06l-4.5-4.5a.75.75 0 0 0-1.06 0l-4.5 4.5a.75.75 0 0 0 1.06 1.06L8 6.81z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <ul class="sidebar-submenu">
                            @foreach ($nav['sub'] as $item)

                                @if (!empty($item['header']))

                                @else
                                    <li class="sidebar-submenu-item{{ isset($item['isActive']) ? ' active' : '' }}">
                                        <a href="{{ $item['path'] }}" class="sidebar-submenu-item-link">{{ $item['name'] }}</a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="sidebar-menu-item{{ isset($nav['isActive']) ? ' active' : '' }}">
                        <a href="{{ $nav['path'] }}" class="sidebar-menu-link">

                            @isset($nav['icon'])
                                <span class="sidebar-menu-item-icon">{!! $nav['icon'] !!}</span>
                            @endisset

                            <span class="sidebar-menu-item-text">{{ $nav['name'] }}</span>

                        </a>
                    </li>

                @endif

            @endforeach

        </ul>
    </div>
</div>
