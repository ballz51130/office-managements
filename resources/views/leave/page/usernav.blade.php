
<ul class="tab">
    @foreach (leave_status_nav_user($items ?? '') as $tab)
    <li class="tab-item{{ isset($tab->isActive) ? ' active' : '' }}">
        <a href="{{ $tab->url }}" class="tab-link">
            <span class="tab-text">{{$tab->name}}</span>
            @isset($tab->count)
            <span class="tab-count">({{ number_format($tab->count) }})</span>
            @endisset
        </a>
    </li>
    @endforeach
</ul>
