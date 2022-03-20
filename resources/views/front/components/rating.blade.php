{{ $rating }}
<span class="rating">
    <i class="icon_star @if($rating > 1) voted @endif"></i>
    <i class="icon_star @if($rating > 2) voted @endif"></i>
    <i class="icon_star @if($rating > 3) voted @endif"></i>
    <i class="icon_star @if($rating > 4) voted @endif"></i>
    <i class="icon_star @if($rating > 5) voted @endif"></i>
    @if(!empty($count))
    <small>({{ $count }})</small>
    @endif
</span>
